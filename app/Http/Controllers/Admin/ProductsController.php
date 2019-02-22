<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Forms\ProductsForm;
use App\Product;
use Collective\Html\FormBuilder;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    public function index(){
        return view('Products.index');
    }

    public function create(\Kris\LaravelFormBuilder\FormBuilder $formBuilder){
        $form = $formBuilder->create(ProductsForm::class, [
            'method' => 'POST',
            'url' => route('produtos.post')
        ]);

        return view('Products.form', compact('form'));
    }

    public function store(Request $request){
//        \DB::beginTransaction();
        //try{
            $product = Product::create($request->all());
            $categories = [];
            foreach ($request->category as $item) {
                $catAncestors = Categories::ancestorsOf($item);
                $categories[] = $item;

                foreach ($catAncestors as $catAncestor){
                    $categories[] = $catAncestor->id;
                }
            }
            dd($product->categories()->sync($categories));
//            \DB::commit();
//        }catch (\Exception $e){
//            \DB::rollback();
//            \Log::error(__METHOD__.' ERRO AO CRIAR PRODUTO', [$e->getMessage()]);
//            return Redirect::back()->with('error', 'Erro ao criar produto.'); //withInputs
//        }
    }
}
