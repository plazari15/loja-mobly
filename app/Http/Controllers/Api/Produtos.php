<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

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
}
