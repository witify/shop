<?php

namespace App\Http\Controllers\Front;

use App\Mail\Contact;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Contact\ContactRequest;

class ContactController extends FrontController 
{
    /**
     * Send the contact message to 
     *
     * @param ContactRequest $request
     * @return void
     */
    public function contact(ContactRequest $request)
    {
        Mail::to('info@witify.io')->send(new Contact('Nouveau message', $request->all()));
        flash('Message envoyé avec succès', 'success');
        return $this->json()->success();
    }
}
