<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class ServiceProviderExperience extends Model
{
	/**
	 * Disble Timestamps
	 * @var boolean
	 */  
	public $timestamps = false;

	protected $fillable = [
    	'title',
    	'service_id',
    	'experience',
    	'description'
    ];

    public function service() 
    {
    	return $this->belongsTo(Service::class);
    }
}
