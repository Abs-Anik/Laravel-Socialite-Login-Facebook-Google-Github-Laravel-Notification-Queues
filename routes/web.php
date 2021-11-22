<?php

use App\Http\Controllers\SocialiteController;
use App\Models\User;
use App\Notifications\ExampleNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;

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

Route::get('/layout', function () {
    return view('customAuth.master');
});

Route::get('/send-notification', function () {
    //single user
    // $users = User::find(1);
    // $user->notify(new ExampleNotification());
    //OR
    // Notification::send($user, new ExampleNotification());
    // return redirect()->back();

    //Multiple Users

    $users = User::all();
    foreach($users as $user){
        // $user->notify(new ExampleNotification());
        //OR
        Notification::send($user, new ExampleNotification('Anik','Web Developer'));
    }
    return redirect()->back();
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/facebook', [SocialiteController::class, 'facebookRedirect']);
Route::get('/facebook/callback', [SocialiteController::class, 'loginWithFacebook']);

Route::get('/google', [SocialiteController::class, 'googleRedirect']);
Route::get('/google/callback', [SocialiteController::class, 'loginWithGoogle']);

Route::get('/github', [SocialiteController::class, 'githubRedirect']);
Route::get('/github/callback', [SocialiteController::class, 'loginWithGithub']);
