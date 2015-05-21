<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoriesController extends Controller {
    private $categoryModel;

    public function __construct(Category $categoryModel){

        $this->categoryModel = $categoryModel;
    }
    public function index(){
        $categories = $this->categoryModel->all();

        return view('categories.index',compact('categories'));

    }

}
