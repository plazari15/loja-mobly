<?php

namespace App\Forms;

use App\Categories;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class ProductsForm extends Form
{

    private $cats = [];

    public function buildForm()
    {
        $this->add('name', Field::TEXT, [
            'rules' => 'required|min:5',
            'label' => 'Nome'
        ])->add('qtd', Field::NUMBER, [
            'rules' => 'required',
            'label' => 'Quantidade Disponível'
        ])
            ->add('minimum', Field::NUMBER, [
                'rules' => 'required',
                'label' => 'Estoque Minimo'
            ])
            ->add('normal_price', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Preço'
            ])
            ->add('updated_price', Field::TEXT, [
                'label' => 'Preço especial'
            ])
            ->add('category', Field::CHOICE, [
                'rules' => 'required',
                'label' => 'Categoria (Você pode selecionar mais de 1)',
                'choices' => $this->getCategories(),
                'expanded' => false,
                'multiple' => true
            ])
            ->add('description', Field::TEXT, [
                'rules' => 'required|min:15',
                'label' => 'Descrição curta'
            ])
            ->add('images', Field::FILE, [
                'rules' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'label' => 'Fotos',
            ])
            ->add('big_description', Field::TEXTAREA, [
                'rules' => 'required|min:50',
                'label' => 'Descrição Longa'
            ])
            ->add('SKU', Field::TEXT, [
                'rules' => 'required',
                'label' => 'SKU do Produto'
            ])
            ->add('height', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Altura do item'
            ])
            ->add('width', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Largura do Item'
            ])
            ->add('weight', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Peso do Item'
            ])
            ->add('length', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Comprimento do Item'
            ])
            ->add('Cadastrar Produto', Field::BUTTON_SUBMIT, [
                'class' => 'btn btn-success'
            ]);
    }


    private function getCategories(){
        $categories = \App\Categories::get()->toTree();

        $traverse = function ($categories, $prefix = '-') use (&$traverse) {
            foreach ($categories as $category) {
                $this->cats[$category->id] = $prefix.' '.$category->name;

                $traverse($category->children, $prefix.'-');
            }

            return $this->cats;
        };

        return $traverse($categories);
    }
}
