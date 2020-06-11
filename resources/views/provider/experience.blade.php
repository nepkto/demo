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
            <div class="card">
                <div class="card-header text-center"><h3>Profession info</h3></div>

                <div class="card-body">
                   
                        <form method="POST" action="{{ route('provider.experience.update', auth()->guard('service_provider')->id()) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Who you are?</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title')?: $exp->title }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div> 

                            <div class="form-group row">
                                <label for="service_id" class="col-md-4 col-form-label text-md-right">Service Offered</label>

                                <div class="col-md-6">
                                   <select name="service_id" id="service_id" class="form-control">
                                        @foreach($services as $service => $id)
                                            <option value="{{ $id }}" @if($id == $exp->service_id) selected @endif>{{ $service }}</option>
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
                                <label for="description" class="col-md-4 col-form-label text-md-right">Experience Details</label>
                                <div class="col-md-6">
                                    <textarea name="description" id="description" rows="10" class="form-control @error('description') is-invalid @enderror" >
                                        {{ old('description')?: $exp->description }}
                                    </textarea>
                                    

                                    @error('description')
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
