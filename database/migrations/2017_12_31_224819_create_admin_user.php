<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		\DB::table('users')->insert( array(
		0 =>
            array (
                
                'name' => 'Jose',
                'lastname' => 'Villasmil',
                'profile' => 'admin',
                'email' => 'joseevillasmil@hotmail.es',
                'password' => bcrypt('21166465j'),
            )
		));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
