<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StoreController extends Controller {

    public function index(){
        return view('store.index');

    }

}