<?php

class Object extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'name' => 'required'
	);
    
    public function obslogs()
    {
        return $this->has_many('Obslog');
    }
}