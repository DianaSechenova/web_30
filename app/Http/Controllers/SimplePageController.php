<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class SimplePageController extends Controller
{
    public function  about(){
        return view('about');
    }

    public function  contacts(){
//        $contacts = Contact::all();
        return view('contacts', ['contacts'=>Contact::all()]);
    }

    public function  services(){
        return view('services');
    }
}
