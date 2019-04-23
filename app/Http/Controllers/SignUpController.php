<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\ClassesRepository\Connection;
use App\Http\Controllers\Controller;

class SignUpController extends Controller
{
    public function signUpUser(Request $request)
    {
        if(Session::has('user'))
        {
            return redirect('/');
        }

        $signup = new Connection();

        $signup->username = $request->username;
        $signup->password = $request->password;
        $signup->password2 = $request->password2;
        $signup->mail = $request->mail;

        $state = $signup -> addUsr();
        if($state[0] == true)
        {
            return redirect('/');
        }
        else
        {
            $connect = new Connection();
            $user = $connect->checkConnection();
            return view('signup',['message'=>$state[1],'user'=>$user]);
        }

    }
        public function getForm()
        {
            if(Session::has('user'))
            {
                return redirect('/');
            }
            else
            {
                $connect = new Connection();
                $user = $connect->checkConnection();
                return view('signup',['message' => "", "user" => $user]) ;
            }
        }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

    public function loginForm()
    {
        if(Session::has('user'))
        {
            return redirect('/');
        }
        else
        {
            $connect = new Connection();
            $user = $connect->checkConnection();
            return view('login',['message' => "", "user" => $user]) ;
        }
    }

    public function login(Request $request)
    {
        $login = new Connection();
        $login->username = $request->username;
        $login->password = $request->password;
        $validation = $login->LogUser();
        if($validation === true)
        {
            return redirect('/');
        }
        else
        {
            $login = null;
            $login = new Connection();
            $user = $login -> checkConnection();
            $message = "<span style='color:red;'>Please insert valid credentials!</span>";

            return view('login',['message'=>$message,'user'=>$user]);

        }
    }

}
