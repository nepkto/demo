<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\RequestService;
use App\Models\ServiceConsumer;
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
    	$totalProviders = ServiceProvider::count();
    	$totalConsumers = ServiceConsumer::count();
    	$totalServices = RequestService::count();
       return view('admin.home',compact('totalProviders','totalConsumers','totalServices'));
    }
}
