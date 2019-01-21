<?php

namespace App\Forms\Attendment;

use App\Forms\Field;
use Kris\LaravelFormBuilder\Form;
use App\Models\Assisted;
use App\Models\AttendmentType;

class AttendmentForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('assisted_id', 'entity', [
                'label' => 'Assistido',
                'class' => Assisted::class,
                'property' => 'name'
            ])
            ->add('type_id', 'entity', [
                'label' => 'Tipo do Atendimento',
                'class' => AttendmentType::class,
                'property' => 'name'
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
