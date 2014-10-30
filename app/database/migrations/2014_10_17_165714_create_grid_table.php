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
        $table->char('type', 1);
        $table->string('image', 50);
        $table->string('logo', 50);
        $table->text('text');
        $table->char('category', 1);
        $table->string('title', 200);
        $table->string('link', 200);
        $table->string('caption', 50);
        $table->mediumInteger('position');
        $table->timestamps();

        Schema::create('grid_country', function($table)
        {
          //http://laravel.com/docs/4.2/security
            $table->integer('grid_id');
            $table->string('country', 2);
        });

        $country_arr = ['SG','MY','HK'];
          $count = 0;
          foreach($country_arr as $key => $c) {
              DB::table('grid_country')->insert([
                'grid_id'=>1+$count,
                'country'=>$c,
              ]);    
              DB::table('grid_country')->insert([
                'grid_id'=>4+$count,
                'country'=>$c,
              ]);    
              DB::table('grid_country')->insert([
                'grid_id'=>7+$count,
                'country'=>$c,
              ]);    
              $count++;   
          }
    });


    $g = new Grid();
    $g->type = 'A';
    $g->title = 'Kimberly Chia 谢静仪';
    $g->link = '';
    $g->position = '1';
    $g->text = '1';
    $g->logo = '';
    $g->category = "A";
    $g->image = "am1.png";
    $g->save();

    $g = new Grid();
    $g->title = 'Kimberly Chia 谢静仪';
    $g->link = '';
    $g->position = '2';
    $g->logo = '';
    $g->category = "A";
    $g->image = "am2.png";
    $g->type = 'A';
    $g->text = '2';
    $g->save();

    $g = new Grid();
    $g->title = 'Kimberly Chia 谢静仪';
    $g->link = '';
    $g->position = '3';
    $g->logo = '';
    $g->category = "A";
    $g->image = "am3.png";
    $g->type = 'A';
    $g->text = '3';
    $g->save();

    //v    
    $g = new Grid();
    $g->title = 'Shark Savers';
    $g->link = 'WYpTC4R7M3M';
    $g->position = '';
    $g->logo = '';
    $g->image = "vid1.png";
    $g->type = 'V';
    $g->text = '4';
    $g->save();

    $g = new Grid();
    $g->title = 'Shark Savers';
    $g->link = 'WYpTC4R7M3M';
    $g->position = '';
    $g->logo = '';
    $g->image = "vid2.png";
    $g->type = 'V';
    $g->text = '5';
    $g->save();

    $g = new Grid();
    $g->title = 'Shark Savers';
    $g->link = 'WYpTC4R7M3M';
    $g->position = '';
    $g->logo = '';
    $g->image = "vid3.png";
    $g->type = 'V';
    $g->text = '6';
    $g->save();

    //su
    $g = new Grid();
    $g->title = 'Shark Savers';
    $g->link = '';
    $g->position = '7';
    $g->logo = 'accomplice-logo.png';
    $g->image = "accomplice.png";
    $g->type = 'S';
    $g->text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sagittis eleifend lectus, vel vehicula lectus sagittis ut. Curabitur volutpat mi nec velit tincidunt euismod a id dolor. Pellentesque egestas nunc tincidunt luctus dignissim. Donec id ex erat. Sed varius scelerisque massa in bibendum. Praesent pulvinar, lectus quis fringilla aliquet, mi justo consequat augue, eget dignissim nisi mauris nec urna. Fusce ultrices egestas tellus eget blandit. Fusce porta accumsan laoreet. Morbi nec ante vehicula, venenatis nunc id, sollicitudin nulla. Pellentesque condimentum dui sit amet rhoncus commodo. Mauris ut efficitur nisi. Duis id sapien vel ex eleifend ullamcorper. Integer aliquam odio ipsum, vitae pretium elit venenatis consectetur. Proin bibendum dolor eu nisi lacinia pharetra. Donec vitae consectetur libero.';
    $g->save();

    $g = new Grid();
    $g->title = 'Shark Savers';
    $g->link = '';
    $g->position = '8';
    $g->logo = 'accomplice-logo.png';
    $g->image = "accomplice.png";
    $g->type = 'S';
    $g->text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sagittis eleifend lectus, vel vehicula lectus sagittis ut. Curabitur volutpat mi nec velit tincidunt euismod a id dolor. Pellentesque egestas nunc tincidunt luctus dignissim. Donec id ex erat. Sed varius scelerisque massa in bibendum. Praesent pulvinar, lectus quis fringilla aliquet, mi justo consequat augue, eget dignissim nisi mauris nec urna. Fusce ultrices egestas tellus eget blandit. Fusce porta accumsan laoreet. Morbi nec ante vehicula, venenatis nunc id, sollicitudin nulla. Pellentesque condimentum dui sit amet rhoncus commodo. Mauris ut efficitur nisi. Duis id sapien vel ex eleifend ullamcorper. Integer aliquam odio ipsum, vitae pretium elit venenatis consectetur. Proin bibendum dolor eu nisi lacinia pharetra. Donec vitae consectetur libero.';
    $g->save();

    $g = new Grid();
    $g->title = 'Shark Savers';
    $g->link = '';
    $g->position = '9';
    $g->logo = 'accomplice-logo.png';
    $g->image = "accomplice.png";
    $g->type = 'S';
    $g->text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sagittis eleifend lectus, vel vehicula lectus sagittis ut. Curabitur volutpat mi nec velit tincidunt euismod a id dolor. Pellentesque egestas nunc tincidunt luctus dignissim. Donec id ex erat. Sed varius scelerisque massa in bibendum. Praesent pulvinar, lectus quis fringilla aliquet, mi justo consequat augue, eget dignissim nisi mauris nec urna. Fusce ultrices egestas tellus eget blandit. Fusce porta accumsan laoreet. Morbi nec ante vehicula, venenatis nunc id, sollicitudin nulla. Pellentesque condimentum dui sit amet rhoncus commodo. Mauris ut efficitur nisi. Duis id sapien vel ex eleifend ullamcorper. Integer aliquam odio ipsum, vitae pretium elit venenatis consectetur. Proin bibendum dolor eu nisi lacinia pharetra. Donec vitae consectetur libero.';
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
		Schema::dropIfExists('grid_country');
	}

}
