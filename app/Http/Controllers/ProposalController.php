<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\RequestService;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Proposal $proposal)
    {
        $proposal->where('provider_service_id',$proposal->ServiceProviders->id)->first();
        $providerInfo = ServiceProvider::with(['profile','experience'])->where('id', $proposal->provider_service_id)->firstOrFail();

        return view('consumer.provider_info',compact('providerInfo','proposal'));
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
    public function store(Request $request, $id)
    {
        RequestService::findOrFail($id);
        $authId = Auth::guard('service_provider')->id();
        abort_unless($authId === $request->user()->id,403);
        Proposal::create([
            'provider_service_id' => $authId,
            'request_service_id' => $id,
        ]);

        $notification = toast_msg('Request Succesfull','success');
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
       abort_unless($request->user()->id === Auth::guard('service_consumer')->id() , 403); 
        $proposal->update(['status' => 1]);

        $notification = toast_msg('Accept Succesfull','success');
        return back()->with($notification);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        //
    }
}
