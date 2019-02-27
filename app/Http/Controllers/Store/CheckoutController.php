<?php

namespace App\Http\Controllers\Store;

use App\Categories;
use App\Forms\LoginClientForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\Field;

class CheckoutController extends Controller
{
    public function index(\Kris\LaravelFormBuilder\FormBuilder $formBuilder){
        $categoriesRoot = Categories::whereNull('parent_id')->get();

        $formLogin = $formBuilder->create(LoginClientForm::class, [
            'method' => 'POST',
            'url' => route('client.login')
        ])->add('ACESSAR', Field::BUTTON_SUBMIT, [
            'class' => 'btn btn-success'
        ]);

        $formRegistro = $formBuilder->create(LoginClientForm::class, [
            'method' => 'POST',
            'url' => route('client.register')
        ])->add('cpfcnpj', Field::TEXT, [
            'rules' => 'required|min:5',
            'label' => 'CPF/CNPJ'
        ])->add('CADASTRAR', Field::BUTTON_SUBMIT, [
            'class' => 'btn btn-success'
        ]);



        return view('checkout', compact('categoriesRoot', 'formLogin', 'formRegistro'));
    }

    public function register(Request $request){

    }
}
