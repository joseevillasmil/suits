<?php
/*
* Simple Login jose villasmil
*/
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Check;
use App\Models\History;
use App\Models\Company;
use App\Models\Place;

class PlaceController extends Controller
{
	function index()
	{
			$places = Place::orderBy('name')->get();
		
			
			$data = array(
				"places" => $places,
			);
			
			$view = view('places')->with($data);
			
			
			return response()->json([
					'state' => 'success',
					'html' => $view->render(),
				]);
	}
	
	
	
		public function getQr($id)
	{
			
			$place = Place::find($id);
			$public_path = asset($place->qr);
			
			#returning img.
			$img = "<img class='img-responsive img-thumbnail center-block' src='$public_path' >";
			
			if(empty($place->qr))
				$img = "<i>Sin código generado</i>";
			
			return response()->json([
					'state' => 'success',
					'html' => $img,
					'target' => '#qr-code-'.$place->id,
					'alert' => array (
								      'type' => 'success', 
									  'message' => 'Nuevo código disponible'
								),
				]);
	}
	
	
	

	
	public function postEditPlace(Request $Request, $id)
	{
			
			$place = Place::find($id);
			$place->latitude = $Request->get('latitude');
			$place->longitude = $Request->get('longitude');
			$place->save();
			
			$data = array(
				"place" => $place
			);
			
			$view = view('forms/edit-place')->with($data);
			
			return response()->json([
					'state' => 'success',
					'html' => $view->render(),
					'target' => '#form-place-'.$place->id,
					'alert' => array (
								      'type' => 'success', 
									  'message' => 'Ubicación editada con éxito'
								),
				]);
	}
	
	public function postNewPlace(Request $Request)
	{
			
			$place = new Place();
			$place->name = $Request->get('name');
			$place->latitude = $Request->get('latitude');
			$place->longitude = $Request->get('longitude');
			$place->description = "";
			$place->company_id = 1;
			$place->token = uniqid();
			$place->save();
			
			
			$this->QrRenew($place->id);
			
			return redirect()->route('places');
	}
	
	
	function getCoord(Request $Request, $id)
	{
		
		$key = "AIzaSyCwuaR6YziMREjY3AxQoLRVlQ4PgxhhlnI";
		$address = str_replace(" ", "+", $Request->address);
		$url = 	"https://maps.google.com/maps/api/geocode/json?address=".$address."&key=".$key;
		
		$response = json_decode(file_get_contents($url));
		
		if(empty($response) or !isset($response->results[0]))
		{
			return response()->json([
					'state' => 'fail',
					'alert' => array (
								      'type' => 'danger', 
									  'message' => 'Ubicación no valida'
								),
				]);
		}
		
		
		#En caso de ser OK todo
		#Retornamos el formulario.

			$data = array(
				"latitude" => $response->results[0]->geometry->location->lat,
				"longitude" => $response->results[0]->geometry->location->lng,
				"place_id" => $id,
			);
			
			$view = view('forms/coords')->with($data);
			
			
		return response()->json([
					'state' => 'fail',
					'html' => $view->render(),
					'target' => '#place-coord-'.$id,
					'alert' => array (
								      'type' => 'success', 
									  'message' => 'Coordenadas localizadas exitosamente'
								),
					'noClose' => true,
				]);
	}
	
	private function QrRenew($place_id)
	{
			$id = uniqid();
			$token = md5($id);
			$url = "https://api.josevillasmil.site/post/check/".$token;
			$filename = "storage/qr/$token.png";
			$private_path = public_path($filename);
			$public_path = asset($filename);
			
			#Create the code image.
			exec("qrencode -s 10 -o $private_path $url");
			
			#if all is ok.
			if(file_exists($private_path))
			{
				$place = Place::find($place_id);
				if(file_exists(public_path($place->qr)) and !empty($place->qr))
				{
					#delete the lastone
					unlink(public_path($place->qr));
				}
				
				#save the new token and file.
				$place->token = $token;
				$place->qr = $filename;
				$place->save();
			}
			
			#returning img.
			$img = "<img class='img-responsive img-thumbnail center-block' src='$public_path' >";
			
			return response()->json([
					'state' => 'success',
					'html' => $img,
					'target' => '#qr-code-'.$place->id,
					'alert' => array (
								      'type' => 'success', 
									  'message' => 'Nuevo código disponible'
								),
				]);
	}
}
