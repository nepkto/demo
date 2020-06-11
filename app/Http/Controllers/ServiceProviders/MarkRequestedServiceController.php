<?php

namespace App\Http\Controllers\ServiceProviders;

use App\Http\Controllers\Controller;
use App\Models\RequestService;
use App\Models\ServiceConsumer;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarkRequestedServiceController extends Controller
{
    public function store(Request $request)
    {
       abort_unless($request->user()->id === Auth::guard('service_provider')->id() , 403);
       $requestedServices = ServiceProvider::get();

       foreach($requestedServices as $service) {
       	foreach ($service->unreadNotifications as $notification) {
       	    $notification->markAsRead();
       	}
       }
       $request->user()->unreadNotifications->markAsRead();
       $notification = toast_msg('Marked all as read','success');
       return back()->with($notification); 
    }
}
