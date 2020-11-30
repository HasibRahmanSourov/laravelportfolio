<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactPageController extends Controller
{
    public function store(){
        $contact_form_data = request()->all();
        Mail::to('rhasib36@gmail.com')->send(new ContactFormMail($contact_form_data));
        return redirect()->route('home','/#contact')->with('success','Your Message has been Submited Successfully');
    }
}
