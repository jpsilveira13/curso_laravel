<?php



//*********** AQUI FICA AS ROTAS DAS CATEGORIAS ***********/

        //Aqui ao entrar no site ele é direcionado a essa página

Route::get('categories',['as'=>'categories', 'uses' => 'CategoriesController@index']);
            //Routa da criação categorias
Route::get('categories/create',['as'=>'categories.create','uses'=>'CategoriesController@create']);

                    // Aqui quando o cara clicar no botão submit ele é enviado a esse controlador //
Route::post('categories',['as'=>'categories.store','uses'=> 'CategoriesController@store']);

                //                  Delete categories                             //
Route::get('categories/{id}/destroy',['as'=>'categories.destroy','uses'=>'CategoriesController@destroy']);
                //                  Page edit categories                         //
Route::get('categories/{id}/edit',['as'=>'categories.edit','uses'=>'CategoriesController@edit']);
                //                  Delete categories                            //
Route::put('categories/{id}/update',['as'=>'categories.update','uses'=>'CategoriesController@update']);

                //               FIM DAS ROTAS DAS CATEGORIAS                    //

                //               AQUI COMEÇA AS ROTAS DOS PRODUTOS               //
Route::get('products',['as'=>'products', 'uses' => 'ProductsController@index']);
Route::get('products/create',['as'=>'products.create','uses'=>'ProductsController@create']);
Route::post('products',['as'=>'products.store','uses'=> 'ProductsController@store']);
Route::get('products/{id}/destroy',['as'=>'products.destroy','uses'=>'ProductsController@destroy']);
Route::get('products/{id}/edit',['as'=>'products.edit','uses'=>'ProductsController@edit']);
Route::put('products/{id}/update',['as'=>'products.update','uses'=>'ProductsController@update']);




//*********** FIM DAS ROTAS  DOS PRODUTOS  ***********/



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
