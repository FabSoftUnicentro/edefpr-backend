<?php

namespace App\Forms\Contact;

use App\Forms\Field;
use App\Models\Assisted;
use Kris\LaravelFormBuilder\Form;

class ContactForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('assisted_id', 'entity', [
                'label' => 'Assistido',
                'class' => Assisted::class,
                'property' => 'name',
                'rules' => 'required',
                'empty_value' => 'Selecione um assistido',
                'empty_data' => null
            ])
            ->add('name', Field::TEXT, [
                'label' => 'Nome',
                'rules' => 'required|string'
            ])
            ->add('phone', Field::TEXT, [
                'label' => 'Telefone',
                'rules' => 'required|string'
            ])
            ->add('email', Field::EMAIL, [
                'label' => 'Email',
                'rules' => 'required|email|unique:contacts'
            ])
            ->add('uf', Field::TEXT, [
                'label' => 'UF',
                'rules' => 'required|string'
            ])
            ->add('city', Field::TEXT, [
                'label' => 'Cidade',
                'rules' => 'required|string'
            ])
            ->add('number', Field::TEXT, [
                'label' => 'Número',
                'rules' => 'required|string'
            ])
            ->add('street', Field::TEXT, [
                'label' => 'Rua',
                'rules' => 'required|string'
            ])
            ->add('postcode', Field::TEXT, [
                'label' => 'CEP',
                'rules' => 'required|string'
            ])
            ->add('complement', Field::TEXT, [
                'label' => 'Complemento',
                'rules' => 'string'
            ])
            ->add('neighborhood', Field::TEXT, [
                'label' => 'Bairro',
                'rules' => 'required|string'
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Salvar'
            ]);
    }
}