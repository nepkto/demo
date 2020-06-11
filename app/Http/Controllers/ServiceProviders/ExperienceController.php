<?php

namespace App\Http\Controllers\ServiceProviders;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceProviders\ExperienceRequest;
use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{

    public function index(ServiceProvider $serviceProvider)
    {
        $exp = $serviceProvider->experience()->first();
        $services = Service::pluck('id','name');
        return view('provider.experience',compact('exp','services'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceProvider $serviceProvider)
    {
        $serviceProvider->experience()->update($request->except(['_token','_method']));
        
        $notification = toast_msg('Update Succesfull','success');
        
        return back()->with($notification);
    }

}
