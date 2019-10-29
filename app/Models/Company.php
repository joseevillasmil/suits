<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Company extends Model
{
	use SoftDeletes;
	
	protected $table ="company";
	
	function employees()
	{
		return $this->hasMany('App\Models\Employee', 'company_id');
	}
	
	function checks()
	{
		return $this->hasMany('App\Models\Check', 'company_id');
	}

}