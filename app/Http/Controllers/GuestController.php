<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

// imports

class GuestController extends Controller
{
    public function I_login(){
        return view('guest.login');
    }
    public function login(){
        request()->validate([
            'email' => 'required|email|exists:users,Email_User',
            'password' => 'required',
        ],[
            'email.required' => "Désole l'adresse mail est obligatoire",
            'email.email' => "Désole le format de l'adresse mail est invalide.",
            'email.exists' => "Désole, adresse électronique ou mot de passe non valide.",
            'password.required' => "Désole le mot de passe est obligatoire",
        ]);
        if(Auth::attempt(['Email_User' => request('email'), 'password' => request('password')])){
            switch ( Auth::user()->Type_User ){
                case -99:
                    return redirect('/admin');
                case 1:
                    return redirect('/client/maison');
                default: abort(404);
            }
        }
        else{
            return Auth::user();}
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
