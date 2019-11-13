<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Resources\Contact as ContactResource;
use App\Models\Contact;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Support\Facades\Auth;

class ContactDestroy extends Controller
{
    /**
     * @param Contact $contact
     * @return ContactResouce
     */
    public function __invoke(Contact $contact)
    {
        $contact->delete();
        
        LogActivityUtil::register(Auth::user(), "Contato $contact->name apagado");

        return new ContactResource($contact);
    }
}