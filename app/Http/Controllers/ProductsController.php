<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller {
    private $productyModel;
    private $category;

    public function __construct(Product $productyModel){

        $this->productyModel = $productyModel;
    }
    public function index(){
        $products = $this->productyModel->paginate(10);

        return view('products.index',compact('products'));

    }

    public function create(Category $category){
        $categories = $category->lists('name','id');
        return view('products.create', compact('categories'));

    }

    // AQUI E A PARTE DA VISÃO QUANDO A PESSOA ENTRA NO LINK SERÁ ENVIADO PARA PAGINA DE CRIAÇÃO



    public function edit($id, Category $category){
        $categories = $category->lists('name','id');
        $product = $this->productyModel->find($id);
        return view('products.edit',(compact('product','categories')));
    }

    public function update(Requests\ProductRequest $request, $id){
        $this->productyModel->find($id)->update($request->all());
        return redirect()->route('products');

    }

    //AQUI VAMOS SALVAR OS PRODUTOS CADASTRADOS PELO CLIENTE :d -->
    public function store(Requests\ProductRequest $request){
        $input = $request->all();
        $product = $this->productyModel->fill($input);
        $product->save();
        return redirect()->route('products');

    }

    public function destroy($id){
        $this->productyModel->find($id)->delete();
        return redirect()->route('products');

    }



}
