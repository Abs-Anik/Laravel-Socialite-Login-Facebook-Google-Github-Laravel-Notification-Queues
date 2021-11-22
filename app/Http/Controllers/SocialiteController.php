<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialiteController extends Controller
{
    public function facebookRedirect(){
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        // $user = Socialite::driver('facebook')->stateless()->user();
        // $findUser = User::where('facebook_id', $user->id)->first();
        // return $findUser;
        // if($findUser){
        //     Auth::login($findUser);
        //     return redirect('/home');
        // }else{
        //     $new_user = new User();
        //     $new_user->name = $user->name;
        //     $new_user->email = $user->email;
        //     $new_user->facebook_id = $user->id;
        //     $new_user->password = bcrypt('123456');
        //     $new_user->save();
        //     Auth::login($new_user);
        //     return redirect('/home');
        // }

        try{
            $user = Socialite::driver('facebook')->user();
            $saveUser = User::updateOrCreate(
                [
                'facebook_id' => $user->getId(),
                ],
                [
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]);
            Auth::loginUsingId($saveUser->id);
            return redirect()->route('home');
            dd($user);
        }catch(\Throwable $th){
            throw $th;
        }


    }

    public function googleRedirect(){
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {
        try{
            $user = Socialite::driver('google')->user();
            $saveUser = User::updateOrCreate(
                [
                'google_id' => $user->getId(),
                ],
                [
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]);
            Auth::loginUsingId($saveUser->id);
            return redirect()->route('home');
            dd($user);
        }catch(\Throwable $th){
            throw $th;
        }
    }

    public function githubRedirect(){
        return Socialite::driver('github')->redirect();
    }

    public function loginWithGithub()
    {
        try{
            $user = Socialite::driver('github')->user();
            $saveUser = User::updateOrCreate(
                [
                'github_id' => $user->getId(),
                ],
                [
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]);
            Auth::loginUsingId($saveUser->id);
            return redirect()->route('home');
            dd($user);
        }catch(\Throwable $th){
            throw $th;
        }
    }
}
