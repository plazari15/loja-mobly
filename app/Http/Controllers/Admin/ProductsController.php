<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Forms\ProductsForm;
use App\Product;
use Collective\Html\FormBuilder;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class ProductsController extends Controller
{
    use FormBuilderTrait;

    public function index(){

        $products = Product::all();

        \Log::info(__METHOD__, [$products]);

        return view('Products.index', compact('products'));
    }

    public function edit(\Kris\LaravelFormBuilder\FormBuilder $formBuilder, $id){

        $product = Product::find($id);

        $form = $formBuilder->create(ProductsForm::class, [
            'method' => 'POST',
            'url' => route('produtos.update', $product->id),
            'model' => $product
        ])->add('Atualizar Produto', Field::BUTTON_SUBMIT, [
            'class' => 'btn btn-success'
        ]);

        \Log::info(__METHOD__, [$product]);

        return view('Products.form', compact('form'));
    }

    public function create(\Kris\LaravelFormBuilder\FormBuilder $formBuilder){
        Log::info('Olá');
        $form = $formBuilder->create(ProductsForm::class, [
            'method' => 'POST',
            'url' => route('produtos.post')
        ])->add('Criar Produto', Field::BUTTON_SUBMIT, [
            'class' => 'btn btn-success'
        ]);

        return view('Products.form', compact('form'));
    }

    public function store(Request $request, $id = null){
        $form = $this->form(ProductsForm::class);

        if (!$form->isValid()) {
            return redirect()->back()
                ->withErrors($form->getErrors())
                ->withInput($request->all());
        }

        \DB::beginTransaction();
        try{
            $product = false;

            if($id){
                $product = Product::findOrFail($id);
            }

            \Log::info(__METHOD__." Inicia a gravação de um produto", [$request->all()]);
            if($product){
                $product->update($request->all());
            }else{
                $product = Product::create($request->all());
            }

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

            $featuresToSave = [];
            foreach ($request->features as $item) {
                $featuresToSave[] = $item;
            }

            $product->features()->sync($featuresToSave);

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
            return Redirect::back()
                ->with('error', 'Erro ao criar produto.')
                ->withInput($request->all());
        }
    }
}
