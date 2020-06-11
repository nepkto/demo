<?php

namespace App\Models;


use App\Models\ServiceProviderExperience;
use App\Models\ServiceProviderProfile;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ServiceProvider extends Authenticatable
{
    	use Notifiable;

    	/**
    	 * Provider Guard
    	 * @var service_provider
    	 */
    	protected $guard = 'service_provider';

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
            return $this->hasOne(ServiceProviderProfile::class);
        }

        public function experience()
        {
            return $this->hasOne(ServiceProviderExperience::class);
        }


        /**
         * Relations End
         */
}
