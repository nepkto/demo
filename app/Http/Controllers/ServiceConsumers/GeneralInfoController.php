<?php

namespace App\Http\Controllers\ServiceConsumers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceConsumers\GeneralInfoRequest;
use App\Models\ServiceConsumer;
use Illuminate\Http\Request;

class GeneralInfoController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceConsumer  $serviceConsumer
     * @return \Illuminate\Http\Response
     */
    public function update(GeneralInfoRequest $request, ServiceConsumer $serviceConsumer)
    {
        $serviceConsumer->update($request->only('name'));
        
        $notification = toast_msg('Update Succesfull','success');
        
        return back()->with($notification);
    }

}
