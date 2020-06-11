<?php

namespace App\Http\Controllers\ServiceProviders;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceProviders\GeneralInfoRequest;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class GeneralInfoController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function update(GeneralInfoRequest $request, ServiceProvider $serviceProvider)
    {
        $serviceProvider->update($request->only('name'));
        
        $notification = toast_msg('Update Succesfull','success');
        
        return back()->with($notification);
    }

}
