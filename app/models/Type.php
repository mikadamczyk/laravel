<?php

class Type extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'name' => 'required'
	);
    
    public function techlogs()
    {
        return $this->has_many('Techlog');
    }    
}