<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactShow extends Controller
{
    /**
     * @param Contact $contact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Contact $contact)
    {
        return view('contacts.show', [
            'contact' => $contact
        ]);
    }
}
