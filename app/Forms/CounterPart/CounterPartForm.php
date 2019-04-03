<?php

namespace App\Forms\CounterPart;

use App\Forms\Field;
use App\Utils\Brazil;
use App\Utils\Document;
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
                'rules' => 'required'
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
                'rules' => 'required'
            ])
            ->add('profession', Field::TEXT, [
                'label' => 'Profissão',
                'rules' => 'string'
            ])
            ->add('note', Field::TEXTAREA, [
                'label' => 'Dados do trabalho',
                'rules' => 'string'
            ])
            ->add('document_type', Field::SELECT, [
                'label' => 'Tipo de documento',
                'choices' => Document::getDocumentTypes(),
                'rules' => 'required'
            ])
            ->add('document_number', Field::TEXT, [
                'label' => 'Número documento',
                'rules' => 'required'
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
