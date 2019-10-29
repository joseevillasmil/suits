<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Place extends Model
{
	use SoftDeletes;
	
	protected $table ="place";
	

}