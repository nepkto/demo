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
                  <h3>Consumer List</h3>
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
                    @forelse($consumers as $consumer)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $consumer->name }}</td>
                      <td>{{ $consumer->email }}</td>
                      <td>{{ $consumer->profile->address?: '-' }}</td>
                      <td>{{ $consumer->profile->phone?: '-' }}</td>
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
