<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Http\Request;

class ContactUpdate extends Controller
{
    /**
     * @param Request $request
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, Contact $contact)
    {
        $contact->update($request->all());

        try {
            $contact->save();
            LogActivityUtil::register($request->user(), "Dados do contato $contact->name atualizados");

            return redirect()
                ->route('contacts.show', $contact->id)
                ->with('alert-success', 'Contato atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização do contato!');
        }
    }
}
