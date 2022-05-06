<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use http\Client\Curl\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {

        if(Auth::attempt(['user_name'=> $request->user_name,'password'=>$request->password]))
        {
            return redirect('/users');

        }
        else{
            return redirect()->back()->withErrors("Nhap lai di");
        }


    /*     $users = DB::table('users')->where('userName', $loginRequest->userName)->where('password', $loginRequest->password)
         ->get()->all();
         if(count($users) > 0){
             return redirect('admin');
         }else{
             return redirect('login');
         }*/
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
