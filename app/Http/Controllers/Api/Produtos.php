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
                $query->where('category_id', $category);
            })->paginate();
        }else{
            $products = Product::with('images')
            ->paginate();
        }

        return \Response::json($products, 200);
    }
}
