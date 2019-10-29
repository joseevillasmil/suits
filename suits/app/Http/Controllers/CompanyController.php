<?php
/*
* Simple Login jose villasmil
*/
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Company;

class CompanyController extends Controller
{

	public function index()
	{
			
			$companys = Company::orderBy('name')->get();
			
			
			$view = view('panel/companys', [ "companys" => $companys])->render();
			
			
			return response()->json([
					'state' => 'success',
					'html' => $view,
				]);
				
	}
	
	public function getAccount($id)
	{
			$company = Account::find($id);
			$bills = Bill::orderBy('name')->get();
			$currencys = Currency::orderBy('name')->get();
			
			$datos = array(
				"account" => $company,
				"bills" => $bills,
				"currencys" => $currencys,
			);
			
			$view = view('panel/account')->with($datos);
			
			return response()->json([
					'state' => 'success',
					'html' => $view->render(),
				]);
				
	}
	
	public function postNew(Request $request)
	{	
	
		#Process the transaction
		$company = new Account();
		$company->name = $request->name;
		$company->description = $request->description;
		$company->currency_id = $request->currency_id;
		$company->balance = 0;
		$company->type= $request->type;
		$company->save();
		
		#Returning information plus an alert.
		$companys = Account::orderBy('name')->get();
		$currencys = Currency::orderBy('name')->get();
		$view = view('panel/accounts', [ "accounts" => $companys, "currencys" => $currencys ])->render();
			
		return response()->json([
					'state' => 'success',
					'html' => $view,
					'alert' => array (
								      'type' => 'success', 
									  'message' => 'Registro exitoso'
								),
				]);
	}
	
	
}
