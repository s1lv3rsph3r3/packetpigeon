<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkingSampleController extends Controller
{
    public function show(Request $request)
    {
        return view('pages.working-sample');
    }
}
