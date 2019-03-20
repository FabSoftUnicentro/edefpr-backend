<?php

namespace App\Forms\Attendment;

use App\Forms\Field;
use App\Models\Assisted;
use App\Models\AttendmentType;
use Kris\LaravelFormBuilder\Form;

class AttendmentForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('assisted_id', 'entity', [
                'label' => 'Assistido',
                'class' => Assisted::class,
                'property' => 'name',
                'rules' => 'required',
                'empty_value' => 'Selecione um assistido',
                'empty_data' => null
            ])
            ->add('type_id', 'entity', [
                'label' => 'Tipo do Atendimento',
                'class' => AttendmentType::class,
                'property' => 'name',
                'rules' => 'required',
                'empty_value' => 'Selecione um assistido',
                'empty_data' => null
            ])
            ->add('description', Field::TEXTAREA, [
                'label' => 'Descrição',
                'rules' => 'required'
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Salvar'
            ]);
    }
}
