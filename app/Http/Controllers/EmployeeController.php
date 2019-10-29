<?php
/*
* Simple Login jose villasmil
*/
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Employee;

class EmployeeController extends Controller
{

	function index(){
		
		$view = view('employees');
			
			return response()->json([
					'state' => 'success',
					'html' => $view->render(),
				]);
	}
	
	
	function getEmployees()
	{
			$employees = Employee::orderBy('name')
						->whereCompanyId(1)
						->paginate(15);
						
			$links = $employees->links();
			
			$links = str_replace("<a", "<a class='ajax' ", $links);
			
		
			
			$data = array(
				"employees" => $employees,
				"links" => $links,
			);
			
			$view = view('tables/employees')->with($data);
			
			return response()->json([
					'state' => 'success',
					'html' => $view->render(),
					'target' => '#employees-table',
				]);
	}
	
	function getEmployeeDetail($id)
	{
			$employee = Employee::find($id);
			
			$data = array(
				"employee" => $employee
			);
			
			$view = view('employee-detail')->with($data);
			
			return response()->json([
					'state' => 'success',
					'html' => $view->render(),
				]);
	}
	
	
}
