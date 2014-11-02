<?php

class Slider extends Eloquent {

	protected $table = 'slider';

	public static function getSlider($country) {
		$temp = Slider::where('country', $country)->orderBy('position')->get();
		$sliders = [];
		foreach($temp as $key => $s) {
			$sliders[$s->id] = ['image'=>$s->image, 'position'=>$s->position];
		}
		return $sliders;
	}
}
