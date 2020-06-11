@extends('layouts.app',
            [
                'login_route' => 'consumer.login', 
                'register_route' => 'consumer.register',
                'guard_name' => 'service_consumer',
                'logout_route' => 'consumer.logout',
                'profile_route' => 'consumer.profile.index'
            ]
        )

@section('siderbar')
    @include('layouts.consumer_sidebar')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>My Requested Services</h3>
        </div>
        <div class="col-md-12">
            @foreach($requestedServices as $service)
                <div class="card mb-2">
                  <div class="card-body">
                    <h5 class="card-title"><b>#</b>{{ $service->request_num }}</h5>
                    <h5 class="card-title">{{ $service->problem }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $service->service->name }}</h6>
                    <p class="card-text">{{ $service->description }}</p>
                    <p class="card-text">Budget: {{ $service->budget}}</p>
                    <p class="card-text"><i>Appointment Date</i> {{ $service->appointment_date->format('Y-m-d') }}</p>
                    <p>Proposals: <a href="Javascript::void(0)" class="card-link">{{ $service->proposals->count()?: 0 }}</a></p>
                    <p> Status
                    <span class="badge badge-primary">{{ in_array(1,$service->proposals->pluck('status')->toArray()) ? 'Accepted': 'Ongoing'}}</span></p>
                    <a href=""></a>
                    <p>Proposed By: 
                        @forelse($service->proposals as $proposal)
                            <a href="{{ url('consumer/proposal/'. $proposal->id) }}" class="btn btn-info"> {{ $proposal->serviceProviders->name }}</a> 
                        @empty
                            <a href="Javascript::void(0)"> None</a>
                        @endforelse
                    </p>
                  </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
