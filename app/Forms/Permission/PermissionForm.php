<?php

namespace App\Forms\Permission;

use App\Forms\Field;
use Kris\LaravelFormBuilder\Form;

class PermissionForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', Field::TEXT, [
                'label' => 'Nome',
                'rules' => 'required|string'
            ])
            ->add('description', Field::TEXT, [
                'label' => 'Descrição',
                'rules' => 'required|unique:users'
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Salvar'
            ]);
    }
}
