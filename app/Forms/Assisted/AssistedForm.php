<?php

namespace App\Forms\Assisted;

use App\Forms\Field;
use Kris\LaravelFormBuilder\Form;

class AssistedForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', Field::TEXT, [
                'label' => 'Nome',
                'rules' => 'required|string'
            ])
            ->add('social_name', Field::TEXT, [
                'label' => 'Nome Social',
                'rules' => 'string'
            ])
            ->add('email', Field::EMAIL, [
                'label' => 'Email',
                'rules' => 'required|email|unique:assisteds'
            ])
            ->add('cpf', Field::TEXT, [
                'label' => 'CPF',
                'rules' => 'required|unique:assisteds'
            ])
            ->add('naturalness', Field::TEXT, [
                'label' => 'Naturalidade',
                'rules' => 'string'
            ])
            ->add('profession', Field::TEXT, [
                'label' => 'Profissão',
                'rules' => 'required|string'
            ])
            ->add('birth_date', Field::DATE, [
                'label' => 'Data de Nascimento',
                'rules' => 'required'
            ])
            ->add('rg', Field::TEXT, [
                'label' => 'Documento de Identidade',
                'rules' => 'required|string'
            ])
            ->add('rg_issuer', Field::TEXT, [
                'label' => 'Emissor do Documento de Identidade',
                'rules' => 'required|string'
            ])
            ->add('gender', Field::SELECT, [
                'label' => 'Gênero',
                'choices' => [
                    'male' => 'Masculino',
                    'female' => 'Feminino',
                    'others' => 'Outro',
                    'undefined' => 'Indefinido'
                ],
                'empty_value' => 'Selecione um gênero',
                'rules' => 'required'
            ])
                ->add('schooling', Field::SELECT, [
                'label' => 'Escolaridade',
                'choices' => [
                    'not_literate' => 'Não alfabetizado',
                    'incomplete_primary_education' => 'Ensino fundamental incompleto',
                    'complete_primary_education' => 'Ensino fundamental incompleto',
                    'in_primary_school' => 'Cursando ensino fundamental',
                    'complete_high_school' => 'Ensino médio completo',
                    'incomplete_high_school' => 'Ensino médio incompleto',
                    'in_high_school' => 'Cursando ensino médio',
                    'incomplete_technical_education' => 'Ensino técnico imcompleto',
                    'complete_technical_education' => 'Ensino técnico completo',
                    'in_technical_education' => 'Cursando ensino técnico',
                    'complete_higher_education' => 'Ensino superior completo',
                    'incomplete_higher_education' => 'Ensino superior incompleto',
                    'in_higher_education' => 'Cursando ensino superior',
                    'others' => 'Outros'
                ],
                'empty_value' => 'Selecione uma escolaridade',
                'rules' => 'required'
            ])
            ->add('marital_status', Field::SELECT, [
                'label' => 'Estado Civil',
                'rules' => 'required|string',
                'choices' => [
                    'single' => 'Solteiro',
                    'married' => 'Casado',
                    'divorced' => 'Divorciado',
                    'separated' => 'Separado',
                    'widow' => 'Viúvo',
                    'stable_union' => 'União estável',
                    'others' => 'Outros'
                ],
                'empty_value' => 'Selecione um estado civil',
            ])
            ->add('note', Field::TEXTAREA, [
                'label' => 'Observações',
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
            ->add('city', Field::TEXT, [
                'label' => 'Cidade',
                'rules' => 'required|string'
            ])
            ->add('uf', Field::TEXT, [
                'label' => 'UF',
                'rules' => 'required|string'
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Salvar'
            ]);
    }
}
