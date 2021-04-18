<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login(){
        if(Auth::user()){
            return redirect()->route('chats.index');
        } else {
            return view('login.form');
        }
    }

    public function postLogin(Request $request){
        if (Auth::attempt($request->except('_token'))) {
            return redirect()->route('chats.index');
        } else{
            return view('login.form');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
