<?php

namespace App\Models;

use App\Model\ServiceConsumerProfile;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ServiceConsumer extends Authenticatable
{
	use Notifiable;

	/**
	 * Consumer Guard
	 * @var service_consumer
	 */
	protected $guard = 'service_consumer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /**
     * Relations Start
     */
    public function profile()
    {
        return $this->hasOne(ServiceConsumerProfile::class);
    }


    /**
     * Relations End
     */
}
