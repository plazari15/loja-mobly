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
            'label' => 'Quantidade Disponível'
        ])
            ->add('minimum', Field::NUMBER, [
                'label' => 'Estoque Minimo'
            ])
            ->add('normal_price', Field::TEXT, [
                'label' => 'Preço'
            ])
            ->add('updated_price', Field::TEXT, [
                'label' => 'Preço especial'
            ])
            ->add('category', Field::CHOICE, [
                'label' => 'Categoria (Você pode selecionar mais de 1)',
                'choices' => $this->getCategories(),
                'expanded' => false,
                'multiple' => true
            ])
            ->add('description', Field::TEXT, [
                'label' => 'Descrição curta'
            ])
            ->add('images', Field::FILE, [
                'label' => 'Fotos',
            ])
            ->add('big_description', Field::TEXTAREA, [
                'label' => 'Descrição Longa'
            ])
            ->add('SKU', Field::TEXT, [
                'label' => 'SKU do Produto'
            ])
            ->add('height', Field::TEXT, [
                'label' => 'Altura do item'
            ])
            ->add('width', Field::TEXT, [
                'label' => 'Largura do Item'
            ])
            ->add('weight', Field::TEXT, [
                'label' => 'Peso do Item'
            ])
            ->add('length', Field::TEXT, [
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
