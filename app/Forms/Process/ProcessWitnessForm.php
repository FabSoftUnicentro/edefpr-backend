<?php

namespace App\Forms\Process;

use App\Forms\Field;
use App\Models\Witness;
use Kris\LaravelFormBuilder\Form;

class ProcessWitnessForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('witness_id', 'entity', [
                'label' => 'Testemunha',
                'class' => Witness::class,
                'property' => 'name',
                'empty_value' => 'Selecione uma testemunha',
                'empty_data' => null
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Salvar'
            ]);
    }
}
