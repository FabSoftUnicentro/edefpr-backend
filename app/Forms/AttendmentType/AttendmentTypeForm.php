<?php

namespace App\Forms\AttendmentType;

use App\Forms\Field;
use Kris\LaravelFormBuilder\Form;

class AttendmentTypeForm extends Form
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
                'rules' => 'required'
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Salvar'
            ]);
    }
}
