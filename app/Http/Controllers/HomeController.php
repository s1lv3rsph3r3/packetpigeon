<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // this should return the list of domains
        $domainList = [
            "example1.com" => [
                "DEFAULT",
                "Channel1",
                "Channel2"
            ],
            "example2.com" => [
                "DEFAULT",
                "Channel1",
                "Channel2"
            ]
        ];

        //$domainList = [];
        return view('home')->with([
            'domainList' => $domainList
        ]);
    }
}
