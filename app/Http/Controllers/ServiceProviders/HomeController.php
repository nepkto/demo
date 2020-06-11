<?php

namespace App\Http\Controllers\ServiceProviders;

use App\Http\Controllers\Controller;
use App\Models\RequestService;
use App\Models\ServiceProvider;
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
        $authId =  Auth::guard('service_provider')->id();
        $serviceProviders = ServiceProvider::get();
        $requestedServices = RequestService::with(['service:id,name','consumer','proposals'])->orderBy('id','desc')->get();
        return view('provider.home')->with([
        	'login_route' => 'provider.login', 
        	'register_route' => 'provider.register',
            'requestedServices' => $requestedServices,
            'authId' => $authId,
            'serviceProviders' => $serviceProviders
        ]);
    }
}

