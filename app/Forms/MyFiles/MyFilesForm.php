<?php

namespace App\Forms\MyFiles;

use App\Forms\Field;
use Kris\LaravelFormBuilder\Form;

class MyFilesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('files', Field::FILE, [
                'label' => 'Arquivos',
                'attr' => ['multiple' => true],
                'rules' => 'required'

            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Enviar'
            ]);
    }
}
