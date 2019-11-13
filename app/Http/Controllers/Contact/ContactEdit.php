<?php

namespace App\Http\Controllers\Contact;

use App\Forms\Contact\ContactForm;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactEdit extends Controller
{
    /**
     * @param Contact $contact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Contact $contact)
    {
        $form = $this->formBuilder->create(ContactForm::class, [
            'url' => route('contacts.update', $contact->id),
            'method' => 'PUT',
            'model' => $contact
        ]);

        return view('contacts.edit', [
            'form' => $form
        ]);
    }
}
