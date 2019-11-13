<?php

namespace App\Http\Controllers\Contact;

use App\Forms\Contact\ContactForm;
use App\Http\Controllers\Controller;

class ContactCreate extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $form = $this->formBuilder->create(ContactForm::class, [
            'url' => route('contacts.store'),
            'method' => 'POST'
        ]);

        return view('contacts.create', [
            'form' => $form
        ]);
    }
}