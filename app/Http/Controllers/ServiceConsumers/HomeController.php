<?php

namespace App\Http\Controllers\ServiceConsumers;

use App\Http\Controllers\Controller;
use App\Models\RequestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        public function index()
        {
            $requestedServices = RequestService::with(['service:id,name','consumer','proposals'])->orderBy('id','desc')->where('service_consumer_id',Auth::guard('service_consumer')->id())->get();
            return view('consumer.home')->with([
            'login_route' => 'consumer.login', 
            'register_route' => 'consumer.register',
            'requestedServices' => $requestedServices
        ]);
        
    }
}
