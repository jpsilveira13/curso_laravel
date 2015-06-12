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

//Correção do código

/*********** AQUI FICA AS ROTAS DAS CATEGORIAS ***********/

//Aqui ao entrar no site ele é direcionado a essa página

Route::get('categories',['as'=>'categories', 'uses' => 'CategoriesController@index']);

Route::get('categories/create',['as'=>'categories.create','uses'=>'CategoriesController@create']);

Route::get('categories/{id}/destroy',['as'=>'categories.destroy','uses'=>'CategoriesController@destroy']);
Route::get('categories/{id}/edit',['as'=>'categories.edit','uses'=>'CategoriesController@edit']);
Route::put('categories/{id}/update',['as'=>'categories.update','uses'=>'CategoriesController@update']);



// Aqui quando o cara clicar no botão submit ele é enviado a esse controlador
Route::post('categories',['as'=>'categories.store','uses'=> 'CategoriesController@store']);



/*********** FIM DAS ROTAS DAS CATEGORIAS ***********/


/*********** AQUI COMEÇA AS ROTAS DOS PRODUTOS ***********/


Route::get('products','ProductsController@index');
Route::post('products','ProductsController@store');




/*********** FIM DAS ROTAS  DOS PRODUTOS  ***********/


Route::post('categories/{id}/edit', function() {
    return 'update';
});


Route::post('products/{id}/edit', function() {
    return 'update';
});
Route::get('products/create', function() {
    return 'create';
});



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
