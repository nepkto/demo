<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceProviderProfile extends Model
{
  	/**
  	 * Disble Timestamps
  	 * @var boolean
  	 */  
    public $timestamps = false;

    protected $fillable = [
    	'address',
    	'phone',
      'latitude',
      'longitude',
    	'service_provider_id'
    ];
}
