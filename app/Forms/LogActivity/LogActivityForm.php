<?php

namespace App\Forms\LogActivity;

use App\Forms\Field;
use App\Models\User;
use Kris\LaravelFormBuilder\Form;

class LogActivityForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('user_id', 'entity', [
                'label' => 'Nome',
                'class' => User::class,
                'property' => 'name',
                'empty_value' => 'Selecione um usuário'
            ])
            ->add('dateInitial', Field::DATE, [
                'label' => 'A partir de'
            ])
            ->add('dateFinal', Field::DATE, [
                'label' => 'Até'
            ])
            ->add('hourInitial', Field::TIME, [
                'label' => 'Horario inicial'
            ])
            ->add('hourFinal', Field::TIME, [
                'label' => 'Horario final'
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Filtrar'
            ]);
    }
}
