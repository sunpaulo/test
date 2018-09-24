<?php

namespace App\Http\Controllers;

use Auth;

class PersonalController extends Controller
{
    public function personalArea()
    {
        return view(Auth::user()->getRole() . '.home');
    }
}