<?php

class Slider extends Eloquent {

	protected $table = 'slider';
	public $timestamps = false;

	public static function getSlider($country) {
		$temp = Slider::where('country', $country)->orderBy('position')->get();
		$sliders = [];
		foreach($temp as $key => $s) {
			$sliders[$s->id] = ['image'=>$s->image, 'position'=>$s->position];
		}
		return $sliders;
	}

	public static function bare () {
		$columns = Schema::getColumnListing('slider');
		$data = new stdClass();
		foreach($columns as $c) {
			$data->$c = '';
		}
		return $data;
	}
}
