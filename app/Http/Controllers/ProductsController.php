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

        return view('products.index',compact('products'));

    }

    // AQUI E A PARTE DA VISÃO QUANDO A PESSOA ENTRA NO LINK SERÁ ENVIADO PARA PAGINA DE CRIAÇÃO
    public function create(){
        return view('products.create');

    }


    //AQUI VAMOS SALVAR OS PRODUTOS CADASTRADOS PELO CLIENTE :d -->
    public function store(){


    }



}
