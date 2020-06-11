@extends('layouts.app',
            [
                'login_route' => 'admin.login', 
                'guard_name' => 'admin',
                'logout_route' => 'admin.logout',
            ]
        )


@section('siderbar')
    @include('layouts.admin_sidebar')
@endsection


@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
          
            <div class="card">
                <div class="card-header">
                  <h3>Provider List</h3>
                </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Address</th>
                      <th scope="col">Phone</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($providers as $provider)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $provider->name }}</td>
                      <td>{{ $provider->email }}</td>
                      <td>{{ $provider->profile->address?: '-' }}</td>
                      <td>{{ $provider->profile->phone?: '-' }}</td>
                    </tr>
                    @empty
                        <tr>No Data</tr>
                    @endforelse
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
