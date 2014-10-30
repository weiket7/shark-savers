<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slider', function($table)
    {
    	//http://laravel.com/docs/4.2/security
        $table->increments('id');
        $table->string('image', 50);
        $table->integer('position');
    });

  	DB::table('slider')->insert([
  		'id'=>1,
  		'position'=>1,
  		'image'=>'slider1.png',
  	]);

  	DB::table('slider')->insert([
  		'id'=>2,
  		'position'=>2,
  		'image'=>'slider2.png',
  	]);
  
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('slider');
	}

}
