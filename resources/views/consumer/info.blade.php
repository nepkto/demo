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
                <div class="card-header text-center"><h3>General Info</h3></div>

                <div class="card-body">
                   
                        <form method="POST" action="{{ route('consumer.general-info.update',$info->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')?: $info->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                            Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    
                </div>
            </div>
        </div>
        <div class="col-md-12 pt-3">
            <div class="card">
                <div class="card-header text-center"><h3>Profile</h3></div>

                <div class="card-body">
                   
                        <form method="POST" action="{{ route('consumer.profile.update', $info->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?:$info->profile->address }}" required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Mobile</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone')?: $info->profile->phone }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                            Update
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
