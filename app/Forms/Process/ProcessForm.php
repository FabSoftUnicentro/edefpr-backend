<?php

namespace App\Forms\Process;

use App\Forms\Field;
use App\Models\Assisted;
use App\Models\CounterPart;
use Kris\LaravelFormBuilder\Form;

class ProcessForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', Field::TEXT, [
                'label' => 'Título',
                'rules' => 'required|string'
            ])
            ->add('description', Field::TEXTAREA, [
                'label' => 'Descrição',
                'rules' => 'required|string'
            ])
            ->add('assisted_id', 'entity', [
                'label' => 'Assistido',
                'class' => Assisted::class,
                'property' => 'name',
                'empty_value' => 'Selecione um assistido',
                'empty_data' => null
            ])
            ->add('counter_part_id', 'entity', [
                'label' => 'Parte contária',
                'class' => CounterPart::class,
                'property' => 'name',
                'empty_value' => 'Selecione uma parte contrária',
                'empty_data' => null
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Salvar'
            ]);
    }
}
