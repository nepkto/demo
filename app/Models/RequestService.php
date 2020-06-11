<?php

namespace App\Models;

use App\Models\Proposal;
use App\Models\Service;
use App\Models\ServiceConsumer;
use Illuminate\Database\Eloquent\Model;

class RequestService extends Model
{

	protected $casts = [
		'appointment_date' => 'date:m-d-Y',
	];

    protected $fillable = [
    	'service_consumer_id',
    	'service_id',
        'request_num',
        'budget',
    	'address',
    	'problem',
    	'description',
    	'latitude',
    	'longitude',
    	'appointment_date'
    ];


    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function consumer() {
        return $this->belongsTo(ServiceConsumer::class,'service_consumer_id','id');
    }

    public function proposals() {
        return $this->hasMany(Proposal::class);
    }

}
