<?php
/*
* Simple Login jose villasmil
*/
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Check;

class IndexController extends Controller
{

	public function index()
	{
			#The first view in the application 
			#After login.
			
			$checks = Check::orderBy('created_at', 'desc')->get();
			
			$data = array(
				"checks" => $checks,
			);
			
			$view = view('panel/index')->with($data);
			return $view;
	}
	
	
}
