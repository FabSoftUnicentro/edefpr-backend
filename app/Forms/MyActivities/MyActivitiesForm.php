<?php

namespace App\Forms\MyActivities;

use App\Forms\Field;
use Kris\LaravelFormBuilder\Form;

class MyActivitiesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('activity', Field::TEXT, [
                'label' => 'Atividade',
                'rules' => 'string|required'
            ])
            ->add('date', Field::DATE, [
                'label' => 'Data',
                'value' => date('Y-m-d'),
                'rules' => 'required'
            ])
            ->add('hour', Field::TIME, [
                'label' => 'Horario',
                'value' => date('H:i:s'),
                'rules' => 'required'
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Registrar'
            ]);
    }
}
