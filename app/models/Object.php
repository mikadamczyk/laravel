<?php

class Object extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'hidden' => 'required',
		'name' => 'required'
	);
}