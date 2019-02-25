<?php

namespace App\Forms;

use App\Categories;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class CategoryForm extends Form
{

    private $cats = [];

    public function buildForm()
    {
        $this->add('name', Field::TEXT, [
            'rules' => 'required|min:5',
            'label' => 'Nome'
        ])->add('description', Field::TEXT, [
            'rules' => 'required',
            'label' => 'Descrição'
        ])
            ->add('parent_id', Field::CHOICE, [
                'label' => 'Categoria Pai',
                'empty_value' => 'Selecione uma categoria pai',
                'choices' => Categories::showAsTree(),
                'expanded' => false,
                'multiple' => false
            ]);

    }

}
