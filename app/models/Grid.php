<?php

class Grid extends Eloquent {

	protected $table = 'grid';

	public function country() {
  	return DB::table('grid_country')->where('grid', $this->id)->lists('country');
  }

  public static function getCategoryArr() {
  	return [ ''=>null,	
						'A'=>'Art & Design',
						'C'=>'Corporate',
						'E'=>'Entertainment',
						'M'=>'Media',
						'N'=>'NGO',
						'P'=>'Professional',
						'S'=>'Sport',
						'O'=>'Others'];
  }

	public static function bare () {
		$columns = Schema::getColumnListing('grid');
		$data = new stdClass();
		foreach($columns as $c) {
			$data->$c = '';
		}
		return $data;
	}

}
