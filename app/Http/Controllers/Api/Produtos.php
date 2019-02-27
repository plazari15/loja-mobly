<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductsResource;
use App\Product;
use App\Http\Controllers\Controller;
use Facades\App\Helpers\Cart;
use Illuminate\Support\Facades\Redirect; //LIVE FACADE

class Produtos extends Controller
{
    public function listProducts($category = null){
        if($category){
            $products = Product::whereHas('categories', function ($query) use ($category){
                $query->where('categories_id', $category);
            })->paginate();
        }else{
            $products = Product::with('images')->paginate();
        }

        $prodArray = [];
        foreach ($products as $key => $product){
            $prodArray[$key] = $product;
            foreach ($product->images as $image){
                if(!$image->url){
                    $prodArray[$key]['cover'] = 'https://dummyimage.com/600x400/000/fff&text=IMAGEM+AQUI';
                }else{
                    $prodArray[$key]['cover'] = url('app/public/'.$image->url);
                }
            }
        }

        return \Response::json($products, 200);
    }

    public function getProductImage($id){
        $produto = Product::find($id);
        $produtoImg = '';

        if($produto){
            foreach ($produto->images as $img){
                $produtoImg = url('app/public/'.$img->url);
                continue;
            }
        }

        return \Response::json(['img' => $produtoImg], 200);
    }

    public function show($id){
        return new ProductsResource(Product::find($id));
    }

    public function addToCart($id){
        $Product = Product::find($id);

        Cart::addProduct([
            'id' => $Product->id,
            'name' => $Product->name,
            'price' => $Product->normal_price,
            'qtd' => $Product->qtd,
        ]);

        return Redirect::to(route('carrinho'));
    }
}
