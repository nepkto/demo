<?php

namespace App\Http\Controllers\ServiceConsumers;

use App\Events\RequestedServiceEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceConsumers\CreateServiceRequest;
use App\Models\RequestService;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::pluck('id','name');
        return view('consumer.request_service.index',compact('services'));
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
    public function store(CreateServiceRequest $request)
    {
        $requestService = RequestService::create($request->except(['_method','_token']) +['service_consumer_id'=> Auth::guard('service_consumer')->id(),
            'request_num' => Auth::guard('service_consumer')->id(). time()
        ]);
        if($requestService) {
            
            $data['id'] = $request->user()->id;
            $data['name'] = $request->user()->name;
            $data['problem'] = $requestService->problem;
            event(new RequestedServiceEvent($data));
        }

        $notification = toast_msg("Service Request Successful. Your Service request number is: $requestService->request_num",'success');

        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestService  $requestService
     * @return \Illuminate\Http\Response
     */
    public function show(RequestService $requestService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestService  $requestService
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestService $requestService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestService  $requestService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestService $requestService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestService  $requestService
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestService $requestService)
    {
        //
    }
}
