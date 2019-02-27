<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class LoginClientForm extends Form
{
    public function buildForm()
    {
        $this->add('email', Field::EMAIL, [
            'rules' => 'required|min:5',
            'label' => 'Email'
        ])->add('password', Field::PASSWORD, [
            'rules' => 'required|min:5',
            'label' => 'Senha'
        ]);
    }
}
