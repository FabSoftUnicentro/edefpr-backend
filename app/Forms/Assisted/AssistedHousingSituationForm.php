<?php

namespace App\Forms\Assisted;

use App\Forms\Field;
use Kris\LaravelFormBuilder\Form;

class AssistedHousingSituationForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('residence_kind', Field::SELECT, [
                'label' => 'Tipo de Residência',
                'choices' => [
                    'house' => 'Casa',
                    'apartment' => 'Apartamento',
                    'homeless' => 'Pessoa em situação de rua',
                    'provisional_housing' => 'Moradia provisória',
                    'collective_housing' => 'Moradia coletiva',
                    'institutional_hosting' => 'Acolhimento Institucional',
                    'others' => 'Outros'
                ],
                'empty_value' => 'Selecione uma opção',
                'rules' => 'required'
            ])
            ->add('residence_situation', Field::SELECT, [
                'label' => 'Situação da Residência',
                'choices' => [
                    'owned' => 'Próprio',
                    'rented' => 'Alugado',
                    'ceded' => 'Cedido',
                    'funded' => 'Financiado',
                    'occupied' => 'Ocupado',
                    'pawned' => 'Penhorado',
                    'public' => 'Público',
                    'private' => 'Privado',
                    'parastatal' => 'Paraestatal',
                    'others' => 'Outros'
                ],
                'empty_value' => 'Selecione uma opção',
                'rules' => 'required'
            ])
            ->add('rental_value', Field::TEXT, [
                'label' => 'Valor do Aluguel',
                'attr' => [
                    'class' => 'money form-control'
                ]
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Salvar'
            ]);
    }
}
