<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Domain;
use App\Channel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

        $domainList = [];
        $list = Domain::where('userId', Auth::user()->id)->get();

        foreach($list as $domain){
            $domainList[$domain->domain] = DB::table('channels')
                ->where('userId', Auth::user()->id)
                ->where('domainId', $domain->id)
            ->get()
            ->pluck('channel')
            ->toArray();
        }

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

        // Validation
        // -> request should have a 'domain-name' field
        // -> domain is required
        // -> domain should be unique
        $validator = Validator::make($request->all(), [
           'domain' => 'required|unique:domains'
        ]);

        if($validator->fails()){
            return redirect()->route('home')
                ->withErrors(['error' => 'A problem occurred whilst attempting to create your domain.']);
        }

        // need to create a unique key pair for new domain

        // insert the domain into the DB
        $domain = Domain::create([
            'domain' => $request->input('domain'),
            'userId' => Auth::user()->id
        ]);

        /* Each new domain will come with a DEFAULT channel */
        // create the new channel
        $channel = Channel::create([
            'userId' => Auth::user()->id,
            'domainId' => $domain->id,
            'channel' => 'DEFAULT'
        ]);

        // API request to the node server to initiate contact
        // send request to add this to the server
        $client = new Client();
        try{
            $response = $client->request(
                'POST',
                'https://packetpigeon.com:8080/default/create-new-domain',
                [
                    'json' => [
                        'username' => config('app.engine_access_key'),
                        'password' => config('app.engine_access_secret'),
                        'userId' => (Auth::user())->id,
                        'email' => Auth::user()->email,
                        'domain' => $domain->domain,
                        'channel' => $channel->channel,
                    ]
                ]
            );

        } catch (RequestException $exception) {
            if($exception->hasResponse()) {
                // Server exception is thrown under particular instances
                // Consider how this will impact the service
                // track errors from the API server
                // dd(json_decode((string)$exception->getResponse()->getBody()));
            }

            // Delete the domain and default channel if the API call fails
            $domain->delete();
            $channel->delete();

            // return with errors back to register page
            return redirect()->route('home')
                ->withErrors(['error' => 'A problem occurred whilst attempting to create your domain.']);
        }

        // Parse the response object, e.g. read the headers, body, etc.
        // $headers = $response->getHeaders();
        // $body = $response->getBody();

        // return to home with success
        return redirect()->route('home');
    }

    // POST - /new-channel
    public function addNewChannel(Request $request){
        // this should add a new channel to the list of channels in a given domain
        $validator = Validator::make($request->all(), [
           'domain' => 'required|exists:domains',
           'channel' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->route('home')->withErrors(['error' => 'A problem occurred whilst attempting to create your channel.']);
        }

        $domain = Domain::where('domain', $request->input('domain'))->first();

        // check uniqueness on the channel name
        $list = Channel::where('userId', (Auth::user())->id)
                        ->where('domainId', $domain->id)
                        ->where('channel', $request->input('channel'))
                        ->get();

        if($list->count() !== 0){
            return redirect()->route('home')->withErrors(['error' => 'A problem occurred whilst attempting to create your channel.']);
        }

        // create the new channel
        $channel = Channel::create([
           'userId' => Auth::user()->id,
           'domainId' => $domain->id,
           'channel' => $request->input('channel')
        ]);

        // send request to add this to the server
        $client = new Client();
        $response = $client->request(
            'POST',
            'https://packetpigeon.com:8080/default/create-new-channel',
            [
                'json' => [
                    'username' => 'admin',
                    'password' => 'password',
                    'userId' => (Auth::user())->id,
                    'email' => (Auth::user())->email,
                    'domain' => $domain->domain,
                    'channel' => $channel->channel,
                ]
            ]
        );
        // Parse the response object, e.g. read the headers, body, etc.
        // $headers = $response->getHeaders();
        // $body = $response->getBody();

        // return to home with success
        return redirect()->route('home');
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
