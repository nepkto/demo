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
                  <h3>Requested Services</h3>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Request Num</th>
                        <th scope="col">Status</th>
                        <th scope="col">Provder Name</th>
                        <th scope="col">Consumer Name</th>
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Budget</th>
                        <th scope="col">Problem</th>
                        <th scope="col">Service Type</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($requestedServices as $service)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $service->request_num }}</td>
                        <td>
                              @if(in_array(1,$service->proposals->pluck('status')->toArray()))
                                <span class="badge badge-danger">Closed</span>
                              @else
                                <span class="badge badge-info">Active</span>
                              @endif
                            
                        </td>
                        <td>
                          @forelse($service->proposals as $proposal)
                             <span class="badge badge-info">{{ $proposal->serviceProviders->name }}</span>
                          @empty
                            -
                          @endforelse
                        </td>
                        <td>{{ $service->consumer->name }}</td>
                        <td>{{ $service->appointment_date->format('Y-m-d') }}</td>
                        <td>{{ $service->budget }}</td>
                        <td>{{ $service->problem }}</td>
                        <td>{{ $service->service->name }}</td>
                      
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
</div>
@endsection
