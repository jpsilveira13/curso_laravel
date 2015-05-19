<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::any('/exemplo2',function(){


});

Route::match(['get','post'],'/exemplo2',function(){

    return "oi";
});

*/
/*

Route::get('produtos-legais',['as' => 'produtos',function(){
    return 'Produtos';

}]);
redirect()->route('produtos');

echo route('produtos');die;


Route::get('user/{id?}',function($id = null){
    if($id)
    return "Ola " . $id;
    return "Nao possui id";

})->where('id','[0-9]+');

*/

//
Route::get('category/{category}',function(\CodeCommerce\Category $category){

    return $category->name;
});

// AREA DA CRIAÇÃO DOS PREFIX ADM
Route::group(['prefix' => 'admin'],function(){
    Route::get('categories', 'AdminCategoriesController@index');
    Route::get('products', 'AdminProductsController@index');



});
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('/exemplo', 'WelcomeController@exemplo');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
