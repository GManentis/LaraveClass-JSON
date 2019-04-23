<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassesRepository\Connection;
use Session;

class IndexController extends Controller
{
    public function index()
    {
        $connection = new Connection();
        $user = $connection->checkConnection();

        return view('index',['user'=> $user]);

    }
}
