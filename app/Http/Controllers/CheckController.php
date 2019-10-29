<?php
/*
* Simple Login jose villasmil
*/
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Check;
use App\Models\History;
use DateTime;

class CheckController extends Controller
{

	function getChecks($employeeId)
	{
			$checks = Check::orderBy('created_at', 'desc')
						->whereEmployeeId($employeeId)
						->paginate(15);
			$links = $checks->links();
			
			$links = str_replace("<a", "<a class='ajax' ", $links);
			
			$data = array(
				"employeeId", $employeeId,
				"checks" => $checks,
				"links" => $links,
			);
			
			$view = view('tables/checks')->with($data);
			
			
			return response()->json([
					'state' => 'success',
					'html' => $view->render(),
					'target' => '#checks-table',
				]);
	}
	
	function getHistory(Request $Request, $employeeId)
	{
			$query = History::orderBy('created_at', 'desc')
						->whereEmployeeId($employeeId);
						
			#if dates are set
			if(!empty($Request->get('from')))
			{
				
				$dateFrom = DateTime::createFromFormat('d/m/Y', $Request->get('from'));
				
				if(!empty($dateFrom))
					$query = $query->where('day', '>=', $dateFrom->format('Y-m-d'));
			}
			
			if(!empty($Request->get('to')))
			{
				$dateTo = DateTime::createFromFormat('d/m/Y', $Request->get('to'));
				
				if(!empty($dateTo))
					$query = $query->where('day', '<=', $dateTo->format('Y-m-d'));
			}
				$checks = $query->paginate(15);
			
			$links = $checks->links();
			
			$links = str_replace("<a", "<a class='ajax' ", $links);
			
			$data = array(
				"employeeId", $employeeId,
				"checks" => $checks,
				"links" => $links,
			);
			
			$view = view('tables/history')->with($data);
			
			
			return response()->json([
					'state' => 'success',
					'html' => $view->render(),
					'target' => '#checks-table',
				]);
	}
	
	function getChecksMonthGraph()
	{
			$array = array();
			
			for($d=1; $d<=31; $d++)
			{
				$day = str_pad($d, 2, '0', STR_PAD_LEFT); 
				$checks = Check::whereYear('created_at', date('Y') )
							->whereMonth('created_at', date('m'))
							->whereDay('created_at', $day)
							->count();
							
				array_push($array, array(
					 (int)$day, $checks,
				));
			}
			
			$json = json_encode($array);
			
			$data = array(
				"json" => $json,
			);
			
			$view = view('reports/graph-checks')->with($data);
			
			
			return response()->json([
					'state' => 'success',
					'html' => $view->render(),
					'target' => '#checks-month-graphs',
				]);
	}
	
	
}
