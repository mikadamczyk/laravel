<?php

class Techlog extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'type_id' => 'required',
		'title' => 'required',
		'remarks' => 'required'
	);
}