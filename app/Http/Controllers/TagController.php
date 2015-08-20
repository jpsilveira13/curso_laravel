<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Tag;
use Illuminate\Http\Request;

class TagController extends Controller {
    private $tagModel;

    public function __construct(Tag $tagModel){

        $this->tagModel = $tagModel;
    }
    public function store(Requests\TagRequest $request){

        $input = $request->all();
        $tag = $this->tagModel->fill($input);
        $tag->save();
        return redirect()->route('products');
    }


}
