<?php

namespace App\Http\Controllers\ServiceConsumers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceConsumers\ProfileRequest;
use App\Models\ServiceConsumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Auth::guard('service_consumer')->user();

        return view('consumer.profile',compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceConsumer  $serviceConsumer
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceConsumer $serviceConsumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceConsumer  $serviceConsumer
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceConsumer $serviceConsumer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceConsumer  $serviceConsumer
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, ServiceConsumer $serviceConsumer)
    {
        $serviceConsumer->profile()->update($request->only('address','phone'));

        $notification = toast_msg('Update Succesfull','success');

        return back()->with($notification);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceConsumer  $serviceConsumer
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceConsumer $serviceConsumer)
    {
        //
    }
}
