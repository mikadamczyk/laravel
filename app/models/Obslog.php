<?php

class Obslog extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'program_id' => 'required',
		'object_id' => 'required'
	);
    
    public function user()
    {
        return $this->belongsTo('User');
    }    
    
    public function object()
    {
        return $this->belongsTo('Object');
    }
    
    public function program()
    {
        return $this->belongsTo('Program');
    }
    
    public function telescope()
    {
        return $this->belongsTo('Telescope');
    }
    
    public function detector()
    {
        return $this->belongsTo('Detector');
    }
    
    public function filter()
    {
        return $this->belongsTo('Filter');
    }
    
    
}