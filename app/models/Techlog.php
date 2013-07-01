<?php

class Techlog extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
// 		'type_id' => 'required',
		'title' => 'required',
		'remarks' => 'required'
	);
    
    public function user()
    {
        return $this->belongsTo('User');
    }
    
    public function device()
    {
        return $this->belongsTo('Device');
    }
    
    public function type()
    {
        return $this->belongsTo('type');
    }    
        
}