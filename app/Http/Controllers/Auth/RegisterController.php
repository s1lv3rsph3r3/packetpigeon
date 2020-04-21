<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request){

        $this->validator($request->all())->validate();

        // Trigger a successful registered event
        // event(new Registered($user = $this->create($request->all())));

        // Create the user
        $user = $this->create($request->all());

        // API request to the node server to initiate contact
        // send request to add this to the server
        $client = new Client();
        try{
            $response = $client->request(
                'POST',
                'https://packetpigeon.com:8080/default/register-new-user',
                [
                    'json' => [
                        'username' => config('app.engine_access_key'),
                        'password' => config('app.engine_access_secret'),
                        'userId' => $user->id,
                    ]
                ]
            );

            // Login the user if the request was successful
            $this->guard()->login($user);

        } catch (RequestException $exception) {
            if($exception->hasResponse()) {
                // Server exception is thrown under particular instances
                // Consider how this will impact the service
                // track errors from the API server
                // dd(json_decode((string)$exception->getResponse()->getBody()));
            }

            // Delete the user if the API call fails
            $user->delete();

            // return with errors back to register page
            return redirect()->route('form.register')
                ->withErrors(['error' => 'A problem occurred whilst attempting to create your account. Please try back soon.']);
        }

        // return redirect to home
        return redirect()->route('home');
    }
    /**
     * Show the application registration form.
     *
     * @return Factory|View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
