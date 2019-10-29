<?php
/*
* Simple Login jose villasmil
*/
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Check;
use App\Models\Company;

class IndexController extends Controller
{

	public function index()
	{
			#The first view in the application 
			#After login.
			
			$company = Company::find(1);
			
			
			$data = array(
				"company" => $company,
			);
			
			$view = view('index')->with($data);
			return $view;
	}
	
	
	
	
}
