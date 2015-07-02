<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;

class WelcomeController extends Controller {

	private $categories;
    private $products;
	public function __construct(Category $category, Product $product)
	{
		$this->middleware('guest');
        $this->categories = $category;
        $this->products = $product;

	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}
    public function exemplo(){
        $categories = $this->categories->all();
        return view('exemplo',compact('categories'));
    }


    public function exemplo2(){
        return "oiee mundo";
    }


}
