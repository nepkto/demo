@extends('layouts.app',
            [
                'login_route' => 'consumer.login', 
                'register_route' => 'consumer.register',
                'guard_name' => 'service_consumer',
                'logout_route' => 'consumer.logout',
                'profile_route' => 'consumer.profile.index'
            ]
        )


        @section('styles')
            <style>
                #map {
                    height: 75vh;
                }
                #infowindow-content {
                  display: none;
                }
            </style>
        @stop

@section('styles')
    <style>
        #map {
            height: 75vh;
        }
        #infowindow-content {
          display: none;
        }
    </style>
@stop

@section('siderbar')
    @include('layouts.consumer_sidebar')
@endsection


@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3>Request Service</h3></div>

                <div class="card-body">
                   
                        <form method="POST" action="{{ route('request-services.store')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="service_id" class="col-md-4 col-form-label text-md-right">Service Type</label>

                                <div class="col-md-6">
                                   <select name="service_id" id="service_id" class="form-control">
                                        @foreach($services as $service => $id)
                                            <option value="{{ $id }}" @if(old('service_id') == $id) selected @endif >{{ $service }}</option>
                                        @endforeach
                                   </select>

                                    @error('service_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="problem" class="col-md-4 col-form-label text-md-right">Problem</label>

                                <div class="col-md-6">
                                    <input id="problem" type="text" class="form-control @error('problem') is-invalid @enderror" name="problem" value="{{ old('problem') }}" required autocomplete="problem" autofocus>

                                    @error('problem')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div> 

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <textarea name="description" id="description" rows="10" class="form-control @error('description') is-invalid @enderror" >
                                        {{ old('description')}}
                                    </textarea>
                                    

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="budget" class="col-md-4 col-form-label text-md-right">Budget</label>
                                <div class="col-md-6">
                                   
                                    
                                    <input id="budget" type="text" class="form-control @error('budget') is-invalid @enderror" name="budget" value="{{ old('budget') }}" required autocomplete="budget" autofocus>

                                    @error('budget')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="appointment_date" class="col-md-4 col-form-label text-md-right">Appointment Date</label>
                                <div class="col-md-6">
                                   
                                    
                                    <input id="appointment_date" type="date" class="form-control @error('appointment_date') is-invalid @enderror" name="appointment_date" value="{{ old('appointment_date') }}" required autocomplete="appointment_date" autofocus>

                                    @error('appointment_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                 <label for="appointment_date" class="col-md-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="address" name="address" class="form-control  mt-2 mr-sm-2" placeholder="Search Address" value="{{ old('address') }}">
                                    <input type="hidden" id="latitude" name="latitude" class="form-control" value="0">
                                    <input type="hidden" id="longitude" name="longitude" class="form-control" value="0">
                                </div>
                            </div>

                            {{-- Google map --}}
                            <div class="form-group">
                                <div id="map"></div>
                                <div id="infowindow-content">
                                  <span id="place-name"  class="title"></span><br>
                                  <strong>Place ID</strong>: <span id="place-id"></span><br>
                                  <span id="place-address"></span>
                              </div>
                            </div>

                            {{-- End google map --}}

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                            Order Request
                                    </button>
                                </div>
                            </div>
                        </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('consumer.request_service.map')
@stop
