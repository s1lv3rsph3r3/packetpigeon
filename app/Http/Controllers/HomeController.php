<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
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
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request)
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

    // GET - /new-domain
//    public function showNewDomainForm(Request $request){
//        // this should return the new domain form
//
//        // always redirect to home page with updated table
//        return redirect()->route('home');
//    }

    // GET - /new-channel
//    public function showNewChannelForm(Request $request){
//        // this should return the new channel form
//
//        // always redirect to home page with updated table
//        return redirect()->route('home');
//    }

    // POST - /new-domain
    public function addNewDomain(Request $request){
        // this should add a new domain to the list of active domains in the account

        // always redirect to home page with updated table
        //return redirect()->route('home');

        return 'adding new domain';
    }

    // POST - /new-channel
    public function addNewChannel(Request $request){
        // this should add a new channel to the list of channels in a given domain

        // always redirect to home page with updated table
        //return redirect()->route('home');

        return 'adding new channel';
    }

    // POST - /enable-channel
    public function enableChannel(Request $request){
        // this should enable a given channel

        // always redirect to home page with updated table
        return redirect()->route('home');
    }

    // POST - /disable-channel
    public function disableChannel(Request $request){
        // this should disable a given channel

        // always redirect to home page with updated table
        return redirect()->route('home');
    }

    // POST - /delete-channel
    public function deleteChannel(Request $request){
        // this should delete a given channel

        // always redirect to home page with updated table
        return redirect()->route('home');
    }

    // POST - /delete-domain
    public function deleteDomain(Request $request){
        // this should delete a domain and all associated channels with it

        // always redirect to home page with updated table
        return redirect()->route('home');
    }
}
