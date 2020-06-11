<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ServiceConsumerProfile extends Model
{
	/**
	 * Disble Timestamps
	 * @var boolean
	 */
    public $timestamps = false;


    protected $fillable = [
    	'address',
    	'phone',
    	'service_consumer_id'
    ];
}
