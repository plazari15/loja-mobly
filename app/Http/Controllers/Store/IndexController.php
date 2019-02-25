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
}
