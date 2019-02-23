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
use Illuminate\Support\Facades\Storage;

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
        \DB::beginTransaction();
        try{
            \Log::info(__METHOD__." Inicia a gravação de um produto", [$request->all()]);
            $product = Product::create($request->all());
            $categories = [];
            \Log::info(__METHOD__." Obtendo todas as categorias e seus filhos");
            foreach ($request->category as $item) {
                $catAncestors = Categories::ancestorsOf($item);
                $categories[] = $item;

                foreach ($catAncestors as $catAncestor){
                    $categories[] = $catAncestor->id;
                }
            }
            \Log::info(__METHOD__." Sync de categorias");
            $categoriesSync = $product->categories()->sync($categories);

            if($categoriesSync){
                \Log::info(__METHOD__." Categorias Salvas");
            }

            \Log::info(__METHOD__." Gravando Imagem");
            $file = $request->file('images');

            $storage = Storage::disk('public')->put('/photos', $file);

            $image = $product->images()->create([
                'alt' => $product->name,
                'url' => $storage,
                'principal' => true
            ]);

            if($image){
                \Log::info(__METHOD__." Image Salva");
            }

            \DB::commit();

            return Redirect::to(route('produtos.list'))->with('success', 'Produto criado com Sucesso.');
        }catch (\Exception $e){
            \DB::rollback();
            \Log::error(__METHOD__.' ERRO AO CRIAR PRODUTO', [$e->getMessage()]);
            return Redirect::back()->with('error', 'Erro ao criar produto.'); //withInputs
        }
    }
}
