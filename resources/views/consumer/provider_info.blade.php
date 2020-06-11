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
            <div class="card">
                <div class="card-header text-center"><h3>Provider Info</h3></div>

                <div class="card-body">
                   <p>Name: {{ $providerInfo->name }}</p>
                   <p>Email: {{ $providerInfo->email }}</p>
                   <p>Address: {{ $providerInfo->profile->address }}</p>
                   <p>Mobile: {{ $providerInfo->profile->phone }}</p>
                   <p>Profession: {{ $providerInfo->experience->title }}</p>
                   <p>Job Description: {{ $providerInfo->experience->description }}</p>
                </div>
            </div>
            <div class="card-body">

              <form action="{{ route('proposal.update', $proposal)  }}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn {{ $proposal->status ? 'btn-info' : 'btn-primary' }}" {{ $proposal->status? 'disabled': '' }}>{{ $proposal->status ? 'Accepted' : 'Accept' }}</button>
              </form>
              
            </div>
        </div>
    </div>
</div>
@endsection
