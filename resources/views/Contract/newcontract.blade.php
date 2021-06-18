@extends('Layouts.app')
@section('content')
    <div class="container"style="padding-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New Contract') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{route('savecontract',$worker)}}">
                            @csrf
                            <div class="form-group row">
                                <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Where will the work be done?') }}</label>

                                <div class="col-md-6">
                                    <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                                    <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress')}}" required autocomplete="adress" autofocus>

                                    @error('adress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="detalle" class="col-md-4 col-form-label text-md-right">{{ __('Tell to '.$worker->name.' about the work') }}</label>

                                <div class="col-md-6">
                                    <textarea id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror h-100" name="detalle" value="{{ old('detalle') }}" required autocomplete="detalle"></textarea>

                                    @error('detalle')
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
