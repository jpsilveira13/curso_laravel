<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller {

    private $tagmodel;

    public function __construct(Tag $tagmodel){

        $this->tagmodel = $tagmodel;

    }

    public function index(){
        $tags = $this->tagmodel->paginate(10);
        return view('tags.index',compact('tags'));

    }

    public function create(){
        return view('tags.create');
    }

    public function edit($id){
        $tag = $this->tagmodel->find($id);
        return view('tags.edit',(compact('tag')));

    }

    public function update(Requests\TagRequest $request, $id){
        $this->tagmodel->find($id)->update($request->all());
        return redirect()->route('tags');

    }

    public function store(Requests\TagRequest $request){
        $input = $request->all();
        $tag = $this->tagmodel->fill($input);
        $tag->save();
        return redirect()->route('tags');
    }

    public function destroy($id){
        $this->tagmodel->find($id)->delete();
        return redirect()->route('tags');

    }

}
