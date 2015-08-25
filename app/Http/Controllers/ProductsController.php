<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller {
    private $productyModel;
    private $category;
    private $tag;

    public function __construct(Product $productyModel){

        $this->productyModel = $productyModel;
    }
    public function index(){
        $products = $this->productyModel->paginate(10);

        return view('products.index',compact('products'));

    }

    public function create(Category $category,Tag $tag){
        $categories = $category->lists('name','id');
        $tags = $tag->lists('name','id');
        return view('products.create', compact('categories','tags'));

    }




    // AQUI E A PARTE DA VISÃO QUANDO A PESSOA ENTRA NO LINK SERÁ ENVIADO PARA PAGINA DE CRIAÇÃO



    public function edit($id, Category $category, Tag $tag){
        $categories = $category->lists('name','id');
        $tags = $tag->lists('name','id');
        $product = $this->productyModel->find($id);
        return view('products.edit',(compact('product','categories','tags')));
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
        $product = $this->productyModel->find($id);
        if($product)
        {
            if($product->images)
            {
                foreach($product->images as $image){
                    if(file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension))
                    {
                        Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
                    }
                    $image->delete();
                }
            }
            $product->delete();
            return redirect()->route('products')->with('product_destroy', 'Product deleted!');
        }
        return redirect()->route('products')->with('product_exist', 'Product not exist!');

    }

    public function images($id){
        $product = $this->productyModel->find($id);
        return view('products.images',compact('product'));

    }

    public function createImage($id){
        $product = $this->productyModel->find($id);
        return view('products.create_image',compact('product'));

    }

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage){

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = $productImage::create(['product_id'=>$id,'extension' =>$extension]);
        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));
        return redirect()->route('products.images',['id'=>$id]);
    }

    public function destroyImage(ProductImage $productImage, $id){
        $image = $productImage->find($id);
        if(file_exists(public_path().'/uploads'.$image->id.'.'.$image->extension)){
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);

        }

        $product = $image->product;
        $image->delete();
        return redirect()->route('products.images',['id'=>$product->id]);
    }

    /* init tag creation */


}
