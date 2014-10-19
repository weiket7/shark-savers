<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGridTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grid', function($table)
    {
    	//http://laravel.com/docs/4.2/security
        $table->increments('id');
        $table->string('content_id', 50);
        $table->string('image', 50);
        $table->string('caption', 50);
        $table->char('type', 1);
        $table->mediumInteger('position');
        $table->timestamps();
    });

    $g = new Grid();
    $g->content_id = 1;
    $g->caption = "Lorem ipsum";
    $g->image = "grid1.jpg";
    $g->type = 'V';
    $g->position = '1';
    $g->save();

    $g = new Grid();
    $g->content_id = 1;
    $g->caption = "Lorem ipsum";
    $g->image = "grid1.jpg";
    $g->type = 'A';
    $g->position = '2';
    $g->save();

    $g = new Grid();
    $g->content_id = 1;
    $g->caption = "Lorem ipsum";
    $g->image = "grid1.jpg";
    $g->type = 'S';
    $g->position = '3';
    $g->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('grid');
	}

}
