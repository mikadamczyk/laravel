<?php

class Obslog extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'filter_id' => 'required'
	);
    
    public function user()
    {
        return $this->belongsTo('User');
    }    
    
    public function object_id()
    {
        return $this->has_one('Object', 'id');
    }
    
    public function program_id()
    {
        return $this->has_one('Program', 'id');
    }
    
    public function telescope_id()
    {
        return $this->has_one('Telescope', 'id');
    }
    
    public function detector_id()
    {
        return $this->has_one('Detector', 'id');
    }
    
    public function filter()
    {
        return $this->belongsTo('Filter');
    }
    
    
}