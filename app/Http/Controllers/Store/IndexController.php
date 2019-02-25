<?php

namespace App\Http\Controllers\Store;

use App\Categories;
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
}
