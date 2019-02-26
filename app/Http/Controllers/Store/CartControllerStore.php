<?php

namespace App\Http\Controllers\Store;

use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartControllerStore extends Controller
{
    public function index(){
        $categoriesRoot = Categories::whereNull('parent_id')->get();
        return view('cart', compact('categoriesRoot'));
    }
}
