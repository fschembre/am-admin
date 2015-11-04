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
        $results = DB::table('employee')
                        ->join('contact', 'employee.ContactID', '=', 'contact.ContactID')
                        ->paginate(10);

        //$results = DB::select(' SELECT FirstName, LastName FROM employee e INNER JOIN contact c ON e.ContactID = c.ContactID', array());
        //$results->paginate(10);
       foreach ($results as $row) {
           $ret[] = $row;
       }
        //var_dump($ret);
        //exit();
/*        SELECT FirstName, LastName FROM employee e
INNER JOIN contact c ON e.ContactID = c.ContactID
*/

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
        return View('pages.test', ['employee' => $results, 'base_url' =>  url() ]);
    }
}
