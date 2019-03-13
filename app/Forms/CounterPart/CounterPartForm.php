<?php

namespace App\Forms\CounterPart;

use App\Forms\Field;
use Kris\LaravelFormBuilder\Form;

class CounterPartForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', Field::TEXT, [
                'label' => 'Nome',
                'rules' => 'required|string'
            ])
            ->add('rg', Field::TEXT, [
                'label' => 'RG',
                'rules' => 'required|numeric'
            ])
            ->add('rg_issuer', Field::TEXT, [
                'label' => 'Órgão Emissor',
                'rules' => 'required'
            ])
            ->add('phone_number', Field::TEXT, [
                'label' => 'Número de telefone',
                'rules' => 'required'
            ])
            ->add('remuneration', Field::TEXT, [
                'label' => 'Remuneração',
                'rules' => 'required|numeric'
            ])
            ->add('profession', Field::TEXT, [
                'label' => 'Profissão',
                'rules' => 'string'
            ])
            ->add('note', Field::TEXTAREA, [
                'label' => 'Dados do trabalho',
                'rules' => 'string'
            ])
            ->add('cpf', Field::TEXT, [
                'label' => 'CPF',
                'rules' => 'required|numeric'
            ])
            ->add('postcode', Field::TEXT, [
                'label' => 'CEP',
                'rules' => 'required|string'
            ])
            ->add('street', Field::TEXT, [
                'label' => 'Rua',
                'rules' => 'required|string'
            ])
            ->add('neighborhood', Field::TEXT, [
                'label' => 'Bairro',
                'rules' => 'required|string'
            ])
            ->add('number', Field::TEXT, [
                'label' => 'Número',
                'rules' => 'required|string'
            ])
            ->add('complement', Field::TEXT, [
                'label' => 'Complemento',
                'rules' => 'string'
            ])
            ->add('uf', Field::TEXT, [
                'label' => 'UF',
                'rules' => 'required|string'
            ])
            ->add('city', Field::TEXT, [
                'label' => 'Cidade',
                'rules' => 'required|string'
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Salvar'
            ]);
    }
}
