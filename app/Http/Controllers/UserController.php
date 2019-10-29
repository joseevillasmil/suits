<?php
/*
* Simple Login jose villasmil
*/
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;
use App\User;
use session;

use chillerlan\QRCode\QROptions;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCodeExamples\MyCustomOutput;

class UserController extends Controller
{
	function getQr()
	{
			
	}

	function postLogin(Request $Request){
		
		$email = $Request->email;
		$password = $Request->password;
		
		if (Auth::attempt(['email' => $email, 'password' => $password,  'deleted_at' => null]))
			{
				session([ "email" => $email ]);
				$view = view('success');
				
				
				#when it is all ok.
				return response()->json([
					'state' => 'success',
					'html' => $view->render(),
					'location' => route('index'),
					'alert' => array (
								      'type' => 'success', 
									  'message' => 'Inicio de sesión exitoso'
								),
				]);
				
			}
			
		#In case of failure
		return response()->json([
					'state' => 'fail',
					'alert' => array (
								      'type' => 'danger', 
									  'message' => 'Usuario y/o contraseña invalido(s)'
								),
					
				]);
		
		
	}
	
	
	function postSignIn(Request $request){
		
		#Lets validate the passwords
		$error="";
		if($request->password != $request->password2)
		{
			$error = "Las claves no coinciden";
		}
		
		
		$verificar = User::whereEmail($request->email)->count();
		
		if($verificar>0)
		{
			$error = "Este correo ya se encuentra registrado";
		}
		
		#if something is wrong.
		if(!empty($error))
		{
			#In case of failure
			return response()->json([
						'state' => 'fail',
						'alert' => array (
										  'type' => 'danger', 
										  'message' => $error
									),
						
					]);
		}
		
		#Well if everything is going well lets register.
		
		$user = new User();
		$user->name = $request->name;
		$user->lastname = $request->lastname;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->profile = "user";
		$user->save();
		
		$view = view('sign-in')->render();
		
		return response()->json([
					'state' => 'success',
					'html' => $view,
					'alert' => array (
								      'type' => 'success', 
									  'message' => 'Registro exitoso!'
								),
					
				]);
	}
	
	#Simple function logOut.
	
	function getLogOut()
	{
		Auth::logout();
		
		#Lets return to the view.
				return response()->json([
					'state' => 'success',
					'location' => route('login'),
					'alert' => array (
								      'type' => 'success', 
									  'message' => 'Sesion finalizada'
								),
				]);
	}

	
	
}
