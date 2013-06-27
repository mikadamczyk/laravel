<?php

class Message extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		//'sticky' => 'required',
		'title' => 'required',
		'description' => 'required'
	);
    
    public function user_id()
    {
        return $this->belongsTo('User');
    }
}