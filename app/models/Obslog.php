<?php

class Obslog extends Eloquent {
    
    protected $guarded = array();
    
    /**
     * Ares options
     */
    public static $ares = array('off', 'on');

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
    
    public function first_half()
    {
        return $this->belongsTo('Condition');
    }
    
    public function second_half()
    {
        return $this->belongsTo('Condition');
    }
    
    public function evening_flat()
    {
        return $this->belongsTo('Flat');
    }
    
    public function morning_flat()
    {
        return $this->belongsTo('Flat');
    }
    
    public function autoguider()
    {
        return $this->belongsTo('Autoguider');
    }
    
    
}