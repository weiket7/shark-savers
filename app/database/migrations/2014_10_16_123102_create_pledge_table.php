<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePledgeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pledge', function($table) {
    	//http://laravel.com/docs/4.2/security
        $table->increments('id');
        $table->string('first_name', 50);
        $table->string('last_name', 50);
        $table->string('nric', 20);
        $table->string('email', 100);
        $table->string('country', 20);
        $table->string('current', 20);        
        $table->timestamps();        
    });

    $p = new Pledge();
    $p->first_name='Wei Ket';
    $p->last_name='Wei Ket';
    $p->nric='S1234567G';
    $p->email='wei_ket@hotmail.com';
    $p->country='Singapore';
    $p->finished=1;
    $p->support=1;
    $p->save();

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('pledge');		
	}

}
