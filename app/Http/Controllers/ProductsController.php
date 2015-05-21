<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller {
    private $productyModel;

    public function __construct(Product $productyModel){

        $this->productyModel = $productyModel;
    }
    public function index(){
        $products = $this->productyModel->all();

        return view('categories.index',compact('categories'));

    }


}
