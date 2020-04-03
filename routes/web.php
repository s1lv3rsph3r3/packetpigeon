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

// No auth
Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('form.login');
Route::post('/login', 'Auth\LoginController@login')->name('request.login');
Route::post('/logout', 'Auth\LoginController@logout')->name('request.logout');

// Home page is displayed
Route::get('/home', 'HomeController@index')->name('home');


// Not used yet
Route::get('/home', 'HomeController@index')->name('home');


// Beta testing only - will be removed in future release
Route::get('/beta-user', function(){
    $user = User::where('email', 'neshanthan.a@gmail.com')->count();
    if($user === 0){
        User::create([
           'name' => 'Neshanthan',
           'email' => 'neshanthan.a@gmail.com',
            'password' => bcrypt('password')
        ]);

        return 'User successfully created.';
    }
    return 'Beta user account already exists.';
});
