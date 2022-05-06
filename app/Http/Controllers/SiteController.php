<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Schema;

class SiteController extends Controller
{

    public function contact(){
        return view('contact');
    }
    public function home(){
        return view('index');
    }
    public function regular(){
        return view('regular');
    }
    public function blog(){
        return view('blog');
    }

    public function login(){
    return $this->data;
    }
    public function ds(){
        return view('danhsachuser');
    }
public  function  register(){
//       $datainsert =[
//
//           'user_firstname'=>$this->data["user_firstname"],
//           'user_lastname'=>$this->data["user_lastname"],
//           'user_name'=>$this->data["user_name"],
//           'user_email'=>$this->data["user_email"],
//           'user_password'=>$this->data["user_password"],
//       ];
//   $user = User::create($datainsert);
//    return $user;
    //controller register bắt dữ liệu từ route rồi trả về dữ liệu


/*    $username = $request->input('username');
    $firstname = $request->input('firstname');
    $lastname = $request->input('lastname');
    $email = $request->input('email');
    $password = $request->input('password');
    $data = array(
        'username'=>$username,
        'firstname'=>$firstname,
        'lastname'=>$lastname,
        'email'=>$email,
        'password'=>$password,
    )*/
   return $this->data;

}

}
