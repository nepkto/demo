<?php

namespace App\Models;

use App\Models\ServiceProvider;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = [
    	'provider_service_id',
    	'request_service_id',
    	'status'
    ];

    public function serviceProviders()
    {
    	return $this->belongsTo(ServiceProvider::class,'provider_service_id');
    }
}
