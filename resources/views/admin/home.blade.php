@extends('layouts.app',
            [
                'login_route' => 'admin.login', 
                'guard_name' => 'admin',
                'logout_route' => 'admin.logout',
                'profile_route' => 'admin.profile.index'
            ]
        )

@section('siderbar')
    @include('layouts.admin_sidebar')
@endsection

@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-4">
           <div class="card">
           <div class="card-header">Totoal Service Provider</div>
             <div class="card-body">
               <h1>{{ $totalProviders }}</h1>
             </div>
           </div>
       </div>

       <div class="col-md-4">
           <div class="card">
           <div class="card-header">Totoal Service Consumer</div>
             <div class="card-body">
               <h1>{{ $totalConsumers }}</h1>
             </div>
           </div>
       </div>

       <div class="col-md-4">
           <div class="card">
           <div class="card-header">Totoal Requested Services</div>
             <div class="card-body">
               <h1>{{ $totalServices }}</h1>
             </div>
           </div>
       </div>
    </div>
</div>
@endsection
