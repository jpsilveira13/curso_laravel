<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;

use Illuminate\Http\Request;

class StoreController extends Controller {

    public function index(){

        $pFeatured = Product::featured()->get();
        $categories = Category::all();
        return view('store.index',compact('categories','pFeatured'));

    }

}
