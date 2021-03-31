<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function show(Request $request)
    {
        return view('pages.welcome');
    }
}
