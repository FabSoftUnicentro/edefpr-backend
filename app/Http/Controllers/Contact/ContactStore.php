<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Http\Request;

class ContactStore extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $contact = new Contact($request->all());

        try {
            $contact->save();
            LogActivityUtil::register($request->user(), "Contato $contact->name registrado(a)");

            return redirect()
                ->route('contacts.index')
                ->with('alert-success', 'Contato cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha no cadastro do contato!' . $e->getMessage());
        }
    }
}
