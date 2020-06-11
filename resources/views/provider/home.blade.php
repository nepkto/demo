@extends('layouts.app',
            [
                'login_route' => 'provider.login', 
                'register_route' => 'provider.register',
                'guard_name' => 'service_provider',
                'logout_route' => 'provider.logout',
                'profile_route' => 'provider.profile.index'
            ]
        )


@section('siderbar')
    @include('layouts.provider_sidebar')
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
             <h3 class="text-center">Notification</h3>
            <ul class="list-group">
                    @foreach($serviceProviders as $provider)
                        @foreach($provider->unreadNotifications as $notification)
                            @if($loop->iteration != $loop->parent->iteration)
                            <a href="#" class="list-group-item list-group-item-action"><span><i>{{ $notification->data['data']['name']}}</i></span><span> My problem :</span><span>{{ $notification->data['data']['problem']}}<c/span></a>
                                <li class="list-group-item"> </li>
                            @endif
                        @endforeach
                    @endforeach
                    @if($provider->unreadNotifications->count() > 0)
                    <form action="{{ route('mark-all-read') }}" method="POST">
                        @csrf
                        <button class="btn-link list-group-item">Mark all read</button>
                    </form>

                    @endif
            </ul>
        </div>
        <div class="col-md-12">
            <h3>All Requested Services</h3>
        </div>
        <div class="col-md-12">
            @foreach($requestedServices as $service)
                <div class="card mb-1">
                  <div class="card-body">
                    <h5 class="card-title">#{{ $service->request_num }}</h5>
                    <h5 class="card-title">{{ $service->problem }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $service->service->name }}</h6>
                    <p class="card-text">{{ $service->description }}</p> 
                    <p class="card-text">Appointment Date: {{ $service->appointment_date->format('Y-d-m') }}</p> 
                    <p>By: <a href="Javascript:void(0)" class="card-link">{{ ucfirst($service->consumer->name)}}</a> Proposal:<a href="Javascript::void(0)" class="card-link">{{ $service->proposals->count()?: 0 }}</a> Budget:<a class="card-link" href="Javascript::void(0)">{{ $service->budget }}</a>
                    </p>
                    <form action="{{ route('proposal.store', $service->id) }}" method="POST">
                        @csrf
                        @if(!in_array(1,$service->proposals->pluck('status')->toArray()))
                        <button @if(in_array($authId,$service->proposals->pluck('provider_service_id')->toArray())) disabled @endif class="btn btn-success">{{ in_array($authId,$service->proposals->pluck('provider_service_id')->toArray()) ? 'Already Requested':  'Make Request'}}</button>

                        @else
                            <button class="btn btn-secondary" disabled>Closed</button>

                        @endif
                    </form>
                  </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
