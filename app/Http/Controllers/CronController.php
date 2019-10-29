<?php
/*
* Simple Login jose villasmil
*/
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Check;
use Mail;

class CronController extends Controller
{

	function sendChecks()
	{
			$checks = Check::whereEmail(0)->get();
			foreach($checks as $check)
			{
				$email = "joseevillasmil@hotmail.es";
				$date = $check->created_at->format('d/m/Y');
				$time = $check->created_at->format('H:i');
				
				$data = array(
					"date" => $date,
					"time" => $time,
				);
				
				Mail::send('email/check', $data, function ($message) use($email){
					$message->from('jose.villasmil@doctum.cl');
					$message->subject('Notificacion de asistencia');
					$message->to($email);
				});
				
				$check->email  = 1;
				$check->save();
			}
		
	}

	
	
}
