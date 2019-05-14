<?php

namespace App\Forms\Assisted;

use App\Forms\Field;
use Kris\LaravelFormBuilder\Form;

class AssistedFamilyIncomeForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('social_programs', Field::TEXT, [
                'label' => 'Bolsa-Família + BPC + Estágio',
                'attr' => [
                    'class' => 'money form-control'
                ]
            ])
            ->add('social_security_contribution', Field::TEXT, [
                'label' => 'Contruição Previdenciária',
                'attr' => [
                    'class' => 'money form-control'
                ]
            ])
            ->add('income_tax', Field::TEXT, [
                'label' => 'Imposto de Renda',
                'attr' => [
                    'class' => 'money form-control'
                ]
            ])
            ->add('alimony', Field::TEXT, [
                'label' => 'Pensão Alimentícia',
                'attr' => [
                    'class' => 'money form-control'
                ]
            ])
            ->add('extraordinary_expenses', Field::TEXT, [
                'label' => 'Gastos Extraordinários',
                'attr' => [
                    'class' => 'money form-control'
                ]
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Salvar'
            ]);
    }
}
