<?php

class Program extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'hidden' => 'required',
		'name' => 'required'
	);
}