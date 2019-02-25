<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Forms\CategoryForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Kris\LaravelFormBuilder\Field;

class CategoryController extends Controller
{
    public function index(){

        $categories = Categories::showAsTree();


        return view('Categories.index', compact('categories'));
    }

    public function create(\Kris\LaravelFormBuilder\FormBuilder $formBuilder){
        $form = $formBuilder->create(CategoryForm::class, [
            'method' => 'POST',
            'url' => route('categories.post')
        ])->add('Criar Categoria', Field::BUTTON_SUBMIT, [
            'class' => 'btn btn-success'
        ]);

        return view('Categories.form', compact('form'));
    }

    public function edit(\Kris\LaravelFormBuilder\FormBuilder $formBuilder, $id){
        $category = Categories::find($id);

        if(!$category){
            return redirect(route('Categories.list'))->with('errors', 'Categoria não encontrada');
        }

        $form = $formBuilder->create(CategoryForm::class, [
            'method' => 'POST',
            'url' => route('categories.update', $category->id),
            'model' => $category
        ])->add('Editar Categoria', Field::BUTTON_SUBMIT, [
            'class' => 'btn btn-success'
        ]);

        return view('Categories.form', compact('form'));
    }

    public function update(Request $request, $id){

        $category = Categories::find($id);

        $category->update($request->all());

        Categories::fixTree();

        if($category){
            return Redirect::to(route('categories.list'))->with('success', 'Categoria Editada com sucesso');
        }

        return Redirect::to(route('categories.list'))->with('error', 'Erro ao editar Categoria');

    }

    public function store(Request $request){

        if($request->parent_id){
            \Log::info($request->parent_id);
            $parentCategory = Categories::find($request->parent_id);
            if($parentCategory){
                $category = $parentCategory->children()->create($request->all());
            }

            Categories::fixTree();
        }else{
            $category = Categories::create($request->all());
        }

        if($category){
            return Redirect::to(route('categories.list'))->with('success', 'Categoria cadastrada com sucesso');;
        }

    }

}
