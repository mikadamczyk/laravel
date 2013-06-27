<?php

class Filter extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		//'hidden' => 'required',
		'name' => 'required'
	);
    
    public function obslogs()
    {
        return $this->has_many('Obslog');
    }
}