<?php
/*
* Simple Login jose villasmil
*/
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Check;

class CheckController extends Controller
{

	function getChecks()
	{
			$checks = Check::orderBy('created_at', 'desc')->get();
			
			$data = array(
				"checks" => $checks,
			);
			
			$view = view('panel/tables/checks')->with($data);
	}
	
	
}
