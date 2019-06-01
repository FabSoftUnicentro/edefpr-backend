<?php

namespace App\Forms\AssistedAsset;

use App\Forms\Field;
use Kris\LaravelFormBuilder\Form;

class AssistedAssetForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', Field::SELECT, [
                'label' => 'Nome',
                'choices' => [
                    'house' => 'Casa',
                    'apartment' => 'Apartamento',
                    'vacant_ground' => 'Terreno vago',
                    'farmstead' => 'Chácara',
                    'car' => 'Carro',
                    'motorcycle' => 'Moto',
                    'others' => 'Outros'
                ],
                'empty_value' => 'Selecione um bem',
                'rules' => 'required'
            ])
            ->add('price', Field::TEXT, [
                'label' => 'Preço',
                'attr' => [
                    'class' => 'money form-control'
                ],
                'rules' => 'required'
            ])
            ->add('status', Field::SELECT, [
                'label' => 'Condição',
                'choices' => [
                    'paid' => 'Pago',
                    'unpaid' => 'Não pago'
                ],
                'empty_value' => 'Selecione uma condição',
                'rules' => 'required'
            ])
            ->add('installment_price', Field::TEXT, [
                'label' => 'Preço da Prestação',
                'attr' => [
                    'class' => 'money form-control'
                ],
                'rules' => 'required'
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Salvar'
            ]);
    }
}
