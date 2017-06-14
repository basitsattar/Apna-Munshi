<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Factory extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	public $timestamps = false;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'factories';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('');

	public function company(){
		return $this->belongsTo('Company');
	}
	public function product(){
		return $this->hasMany('Product');
	}
	public function category(){
		return $this->hasMany('Category');
	}
	public function client(){
		return $this->hasMany('Client');
	}
	public function employee(){
		return $this->hasMany('Employee');
	}
	public function Bill(){
		return $this->hasMany('Bill');
	}

}
