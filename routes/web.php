<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Welcome Page
Route::get('/', 'WelcomeController@show')->name('welcome');

// Working sample
Route::get('/working-sample', 'WorkingSampleController@show')->name('working-sample');

//Auth::routes();

// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('form.login');
// Route::post('/login', 'Auth\LoginController@login')->name('request.login');
// Route::post('/logout', 'Auth\LoginController@logout')->name('request.logout');
// Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('form.register');
// Route::post('/register', 'Auth\RegisterController@register')->name('request.register');

// Home page is displayed
// Route::get('/home', 'HomeController@index')->name('home');

// Forms to be filled for requests
// Route::get('/new-domain', 'HomeController@showNewDomainForm')->name('form.new-domain');
// Route::get('/new-channel', 'HomeController@showNewChannelForm')->name('form.new-channel');

// Actions to be taken from the forms
// Route::post('/new-domain', 'HomeController@addNewDomain')->name('request.new-domain');
// Route::post('/new-channel', 'HomeController@addNewChannel')->name('request.new-channel');

// Actions to be taken as part of channel control
// Route::post('/enable-channel', 'HomeController@enableChannel')->name('request.enable-channel');
// Route::post('/disable-channel', 'HomeController@disableChannel')->name('request.disable-channel');
// Route::post('/delete-channel', 'HomeController@deleteChannel')->name('request.delete-channel');
// Route::post('/delete-domain', 'HomeController@deleteDomain')->name('request.delete-domain');

// Beta testing only - will be removed in future release
Route::get('/beta-user', function () {
    $user = User::where('email', 'test@test.com')->count();
    if ($user === 0)
    {
        User::create([
            'name' => 'Test',
            'email' => 'test@test.com',
            'password' => bcrypt('password')
        ]);
        return 'User successfully created.';
    }
    return 'Beta user account already exists.';
});
