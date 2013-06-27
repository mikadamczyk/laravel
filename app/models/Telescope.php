<?php

class Telescope extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'hidden' => 'required',
		'name' => 'required'
	);
}