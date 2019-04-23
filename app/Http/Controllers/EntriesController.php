<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ClassesRepository\Connection;
use Session;
use App\Entries;
use DB;

use Illuminate\Http\Request;

class EntriesController extends Controller
{
    public function form()
    {
        $connect = new Connection();
        $user = $connect->checkConnection();

        if(Session::has('user'))
        {
            return view('insert',['user'=>$user]);
        }
        else
        {
            return redirect('/');
        }

    }

    public function fetch(Request $request)
    {
        if(Session::has('user'))
        {
            $userman = Session::get('user');
            $fetched = $request->req;
            $clean = json_decode($fetched);
            foreach($clean as $result)
            {
                $entry = new Entries();
                $entry->username = $userman;
                $entry->value1 = $result->var1;
                $entry->value2 = $result->var2;
                $entry->value3 = $result->var3;
                $entry->save();

                $entry = null;
            }

            echo '<span style="color:green">Data has been successfully saved!!</span>';
        }
    }

    public function viewEntries($id)
    {
        if(Session::has('user') && preg_match('/[0-9]/',$id))
        {
                (int)$id = $id;
                if($id <= 1)
                {
                    $skip = 0;
                }
                else
                {
                    $skip = $id*10 - 10;
                }

                $username = Session::get('user');
                $connect = new Connection();
                $user = $connect->checkConnection();
                $count = DB::table('entries')->where('username',$username)->orderBy('id','desc')->count();
                if($count > 0)
                {
                    $results = DB::table('entries')->where('username',$username)->orderBy('id','desc')->skip($skip)->take(10)->get();
                    $response = "<table class='table'>";
                    foreach($results as $result)
                    {
                        $response .= "<tr><td>".$result->value1."</td><td>".$result->value2."</td><td>".$result->value3."</td></tr>";
                    }
                    $response .= "<table>";

                    $pages = $count/10;
                    if(!is_int($pages))
                    {
                        $pages = floor($pages) + 1;
                    }

                    $page = "<ul class='pagination'>";
                    for($i=1; $i<=$pages; $i++)
                    {
                        if($id == $i)
                        {
                            $page .= "<li class='active'><a href='/manage/".$i."'>".$i."</a></li>";
                        }
                        else
                        {
                            $page .= "<li><a href='/manage/".$i."'>".$i."</a></li>";
                        }
                    }
                    $page .= "</ul>";

                    return view('manage',['user'=>$user,'response'=>$response,'pages'=>$page]);
                }
                else
                {
                    return view('manage',['user'=>$user,'response'=>"No Data available!",'pages'=>" "]);
                }

        }
        else
        {
            return redirect('/');
        }
    }
}
