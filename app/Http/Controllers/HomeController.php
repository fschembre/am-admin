<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Validator, Input, Redirect;
use DB;

class HomeController extends Controller
{

    public function index() {

        return View('pages.home');//, ['user' => User::findOrFail($id)]);
    }

    public function employees() {
        //$results = DB::select('select * from Employees', array());
        $results = DB::table('Employees')->paginate(10);
      //  $results = $results->simplePaginate(15);
        //$users = DB::table('users')->simplePaginate(15);
        return View('pages.employees', ['employees' => $results, 'base_url' =>  url() ]);
    }


    public function users() {
        $results = DB::table('users')->paginate(10);
        //  $results = $results->simplePaginate(15);
        //$users = DB::table('users')->simplePaginate(15);
        return View('pages.users', ['users' => $results, 'base_url' =>  url() ]);
    }

    public function test() {
        $results = DB::select('select * from Employees', array());
        return View('pages.test', ['employees' => $results, 'base_url' =>  url() ]);
    }
}
