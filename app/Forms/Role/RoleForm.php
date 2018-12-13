<?php

namespace App\Forms\Role;

use App\Forms\Field;
use Kris\LaravelFormBuilder\Form;

class RoleForm extends Form
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
                'rules' => 'required|string'
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Salvar'
            ]);
    }
}
