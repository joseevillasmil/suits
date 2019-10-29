<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Employee extends Model
{
	use SoftDeletes;
	
	protected $table ="employee";
	
	function company()
	{
		return $this->belongsTo('\App\Models\Company', 'company_id');	
	}

}