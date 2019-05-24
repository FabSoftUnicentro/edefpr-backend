<?php

namespace App\Forms\FamilyMember;

use App\Forms\Field;
use Kris\LaravelFormBuilder\Form;

class FamilyMemberForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', Field::TEXT, [
                'label' => 'Nome',
                'rules' => 'required|string'
            ])
            ->add('work', Field::TEXT, [
                'label' => 'Trabalho',
                'rules' => 'required|string'
            ])
            ->add('birth_date', Field::DATE, [
                'label' => 'Data de Nascimento',
                'rules' => 'required'
            ])
            ->add('income', Field::TEXT, [
                'label' => 'Renda',
                'rules' => 'required',
                'attr' => [
                    'class' => 'money form-control'
                ]
            ])
            ->add('legal_situation', Field::SELECT, [
                'label' => 'Situação Legal',
                'choices' => [
                    'general' => 'Geral',
                    'elderly' => 'Pessoa Idosa',
                    'child' => 'Criança/Adolescente',
                    'disabled-person' => 'Pessoa com necessidades especiais',
                    'ex-prisoner' => 'Egresso Sistema Prisional'
                ],
                'empty_value' => 'Selecione a situação legal da pessoa',
                'rules' => 'required'
            ])
            ->add('kinship', Field::SELECT, [
                'label' => 'Grau de Parentesco',
                'choices' => [
                    'mother' => 'Mãe',
                    'father' => 'Pai',
                    'son' => 'Filho',
                    'daughter' => 'Filha',
                    'sister' => 'Irmã',
                    'brother' => 'Irmão',
                    'grandmother' => 'Avó',
                    'grandfather' => 'Avô',
                    'grandson' => 'Neto',
                    'granddaughter' => 'Neta',
                    'uncle' => 'Tio',
                    'aunt' => 'Tia',
                    'nephew' => 'Sobrinho',
                    'niece' => 'Sobrinha',
                    'cousin' => 'Primo/Prima',
                    'wife' => 'Esposa',
                    'husband' => 'Esposo',
                    'stepfather' => 'Padastro',
                    'stepmother' => 'Madastra',
                    'stepbrother' => 'Meio-irmão',
                    'stepsister' => 'Meio-Irmã'
                ],
                'empty_value' => 'Selecione um grau de parentesco',
                'rules' => 'required'
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Salvar'
            ]);
    }
}
