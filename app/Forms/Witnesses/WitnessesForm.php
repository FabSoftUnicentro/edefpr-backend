<?php

namespace App\Forms\Witnesses;

use App\Forms\Field;
use App\Models\Assisted;
use App\Models\Process;
use App\Utils\Brazil;
use Kris\LaravelFormBuilder\Form;

class WitnessesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', Field::TEXT, [
                'label' => 'Nome',
                'rules' => 'required|string'
            ])
            ->add('cpf', Field::TEXT, [
                'label' => 'CPF',
                'rules' => 'unique:witnesses'
            ])
            ->add('rg', Field::TEXT, [
                'label' => 'Documento de Identidade',
                'rules' => 'string'
            ])
            ->add('rg_issuer', Field::TEXT, [
                'label' => 'Emissor do Documento de Identidade',
                'rules' => 'string'
            ])
            ->add('postcode', Field::TEXT, [
                'label' => 'CEP',
                'rules' => 'required|string'
            ])
            ->add('street', Field::TEXT, [
                'label' => 'Rua',
                'rules' => 'required|string'
            ])
            ->add('number', Field::TEXT, [
                'label' => 'Número',
                'rules' => 'required|string'
            ])
            ->add('neighborhood', Field::TEXT, [
                'label' => 'Bairro',
                'rules' => 'required|string'
            ])
            ->add('complement', Field::TEXT, [
                'label' => 'Complemento',
                'rules' => 'string'
            ])
            ->add('uf', Field::SELECT, [
                'label' => 'UF',
                'choices' => Brazil::states(),
                'empty_value' => 'Selecione um estado',
                'empty_data' => null
            ])
            ->add('city', Field::SELECT, [
                'label' => 'Cidade',
                'rules' => 'required|string',
                'choices' => $this->uf->getValue() ? Brazil::cities($this->uf->getValue()) : [],
                'empty_value' => 'Selecione uma cidade',
                'empty_data' => null
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Salvar'
            ]);
    }
}
