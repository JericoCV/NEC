@extends('Layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registro para trabajadores') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('saveprofile',$user) }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$user->name)}}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname',$user->lastname) }}" required autocomplete="email">

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="profession" class="col-md-4 col-form-label text-md-right">{{ __('What is your job?') }}</label>

                                <div class="col-md-6">
                                    <input id="profession" type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}" required autocomplete="email">

                                    @error('profession')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="servicegroup" class="col-md-4 col-form-label text-md-right">{{ __('Servicio') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="servicegroup" name="servicegroup">
                                        @php($services = new \App\Http\Controllers\ServicioController())
                                        @foreach($services->showall() as $service)
                                                <option value="{{$service->id}}">{{$service->servicename}}</option>
                                        @endforeach
                                    </select>

                                    @error('servicegroup')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="workplace" class="col-md-4 col-form-label text-md-right">{{ __('Workplace') }}</label>

                                <div class="col-md-6">
                                    <input id="workplace" type="text" class="form-control @error('workplace') is-invalid @enderror" name="workplace" value="{{ old('workplace') }}" required autocomplete="email">

                                    @error('workplace')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="info" class="col-md-4 col-form-label text-md-right">{{ __('How do you work?') }}</label>

                                <div class="col-md-6">
                                    <input id="info" type="text" class="form-control @error('info') is-invalid @enderror" name="info" value="{{ old('info') }}" required autocomplete="email">

                                    @error('info')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>price
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="schedule" class="col-md-4 col-form-label text-md-right">{{ __('Wich days do you work?') }}</label>

                                <div class="col-md-6">
                                    <textarea id="schedule" type="text" class="form-control @error('schedule') is-invalid @enderror h-100" name="schedule" value="{{ old('schedule') }}" required autocomplete="email"></textarea>

                                    @error('schedule')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('How much do you charge? (Hours/Work finished)') }}</label>

                                <div class="col-md-6">
                                    <textarea id="price" type="text" class="form-control @error('price') is-invalid @enderror h-100" name="price" value="{{ old('price') }}" required autocomplete="email"></textarea>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar') }}
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
