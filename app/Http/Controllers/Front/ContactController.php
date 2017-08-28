<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('front.contact.index');
    }

    public function send(ContactRequest $request)
    {
        \Mail::to('maxiyanez84@gmail.com')->queue(new ContactMail($request->all()));
        return ['success' => true];
    }
}
