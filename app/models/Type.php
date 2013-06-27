<?php

class Type extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'hidden' => 'required',
		'name' => 'required'
	);
}