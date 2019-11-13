<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Resources\Contact as ContactResource;
use App\Models\Contact;

class ContactList extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke()
    {
        $contact = Contact::paginate($this->itemsPerPage);

        return ContactResource::collection($contact);
    }
}
