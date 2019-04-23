<?php

namespace app\ClassesRepository;
use Session;
use DB;

class Connection
{
    public $username;
    public $password;
    public $password2;
    public $mail;

    /*public function __construct($x,$y,$w,$z)
    {
            $this->username = $x;
            $this->password = $y;
            $this->password2 = $w;
            $this->mail = $z;
    }*/


    public function checkConnection()
    {
        if(Session::has('user'))
        {
           $temp = Session::get('user');
           $x = "<li><a href=''><span>Welcome, ".$temp."</span></a></li><li><a href='/logout'><span class='glyphicon glyphicon-log-out'></span>Log Out</a></li>";
        }
        else
        {
            $x = "<li><a href='/signup'><span class='glyphicon glyphicon-user'></span>Sign Up</a></li><li><a href='/login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
        }

        return $x;
    }

    public function addUsr()
    {
        $status = 1;
        $error = '';

        if($this->username === NULL && $this->password === NULL && $this->password2 === NULL && $this->mail === NULL)
        {
            $status = 0;
            $error .= "<span style='color:red;'><b>Not all fields are filled!</b></span><br>".$this->username." ".$this->password." ".$this->password2." ".$this->mail;
        }
        else
        {
            if (!preg_match('/[A-Za-z0-9]/', $this->username))
            {
                $status = 0;
                $error .= "<span style='color:red;'><b>Username has illegal chars!</b></span><br>";
            }

            if (!preg_match('/[A-Za-z0-9]/', $this->password))
            {
                $status = 0;
                $error .= "<span style='color:red;'><b>Password has illegal chars!</b></span><br>";
            }

            if($this->password != $this->password2)
            {
                $status = 0;
                $error .= "<span style='color:red;'><b>Repeat password does not match!</b></span><br>";
            }

            if(!filter_var($this->mail,FILTER_VALIDATE_EMAIL))
            {
                $status = 0;
                $error .= "<span style='color:red;'><b>Email is not valid!</b></span><br>";
            }

            $count = DB::table('user')->where('username',$this->username)->orWhere('mail',$this->mail)->count();

             if($count != 0)
             {
                $status = 0;
                $error .= "<span style='color:red;'><b>Account with username and/or email already exists!</b></span><br>";

            }
        }



        if($status == 1)
        {
            $hash = password_hash($this->password,PASSWORD_DEFAULT);
            DB::table('user')->insert(['username'=>$this->username,'password'=>$hash,'mail'=>$this->mail]);
            Session::put('user',$this->username);
            $response = true;
            $msg = "success";
        }
        else
        {
            $response = false;
            $msg = $error;
        }

        return array($response,$msg);
    }

    public function LogUser()
    {
        $count = DB::table('user')->where('username',$this->username)->count();
        if($count == 1)
        {
            $result = DB::table('user')->where('username',$this->username)->get();
            foreach($result as $res)
            {
                $hashed = $res->password;
            }
            if(password_verify($this->password,$hashed))
            {
                Session::put('user',$this->username);
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}


?>
