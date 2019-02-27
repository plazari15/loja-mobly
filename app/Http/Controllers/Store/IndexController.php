<?php

namespace App\Http\Controllers\Store;

use App\Categories;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(){
        $categoriesRoot = Categories::whereNull('parent_id')->get();
        return view('index', compact('categoriesRoot'));
    }

    public function category($cat){
        $categoriesRoot = Categories::whereNull('parent_id')->get();

        $categoriesSelected = Categories::whereSlug($cat)->first();

        return view('index-category', compact('categoriesRoot', 'categoriesSelected'));
    }


    public function produto($id){
        $categoriesRoot = Categories::whereNull('parent_id')->get();

        return view('product', compact('categoriesRoot', 'id'));
    }

    public function search(Request $request){
        $categoriesRoot = Categories::whereNull('parent_id')->get();


        if($request->input('query')){
            $product = \App\Product::searchByQuery(['fuzzy' => ['name' => $request->input('query')]]);

            if($product){
                    $id = $product[0]->id;


                return view('product', compact('categoriesRoot', 'id'));
            }
        }
    }
}
