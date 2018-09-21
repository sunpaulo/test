<?php

namespace App\Http\Controllers;

class PersonalController extends Controller
{
    public function sellerArea()
    {
        return view('seller.home');
    }
}