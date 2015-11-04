<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Response;

class AjaxController extends Controller
{

    /**
     * @param $id
     */
    public function getEmployee($id)
    {
        $results = DB::select('SELECT * FROM employee e INNER JOIN contact c ON e.ContactID = c.ContactID WHERE  EmployeeID = ?', array($id));

        $results = (array)$results[0];
        $results = array_map('utf8_encode', $results);
        echo json_encode($results);

/*
        echo '<tr><td><strong>ID</strong></td><td>'.$results->EmployeeID.'</td></tr>';
        echo '<tr><td><strong>Title Of Courtesy</strong></td><td>'.$results->TitleOfCourtesy.'</td></tr>';
        echo '<tr><td><strong>FirstName</strong></td><td>'.$results->FirstName.'</td></tr>';
        echo '<tr><td><strong>LastName</strong></td><td>'.$results->LastName.'</td></tr>';
        echo '<tr><td><strong>Title</strong></td><td>'.$results->Title.'</td></tr>';
        echo '<tr><td><strong>BirthDate</strong></td><td>'.$results->BirthDate.'</td></tr>';
        echo '<tr><td><strong>HireDate</strong></td><td>'.$results->HireDate.'</td></tr>';
        echo '<tr><td><strong>Address</strong></td><td>'.$results->Address.'</td></tr>';
        echo '<tr><td><strong>City</strong></td><td>'.$results->City.'</td></tr>';
        echo '<tr><td><strong>Region</strong></td><td>'.$results->Region.'</td></tr>';
        echo '<tr><td><strong>PostalCode</strong></td><td>'.$results->PostalCode.'</td></tr>';
        echo '<tr><td><strong>Country</strong></td><td>'.$results->Country.'</td></tr>';
        echo '<tr><td><strong>HomePhone</strong></td><td>'.$results->HomePhone.'</td></tr>';
        echo '<tr><td><strong>Extension</strong></td><td>'.$results->Extension.'</td></tr>';
        echo '<tr><td><strong>Notes</strong></td><td>'.$results->Notes.'</td></tr>';
        echo '<tr><td><strong>ReportsTo</strong></td><td>'.$results->ReportsTo.'</td></tr>';
        echo '<tr><td><strong>PhotoPath</strong></td><td>'.$results->PhotoPath.'</td></tr>';
        echo '<tr><td><strong>Salary</strong></td><td>'.$results->Salary.'</td></tr>';
*/
    }


    /**
     * @param $id
     */
    public function getOutcome($id)
    {
        $results = DB::select('SELECT * FROM outcome WHERE id = ?', array($id));

        $results = (array)$results[0];
        $results = array_map('utf8_encode', $results);
        echo json_encode($results);
    }
}
