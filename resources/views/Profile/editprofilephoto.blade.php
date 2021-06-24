@extends('Layouts.app')
@section('content')
    <div class="container"style="padding-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registro para trabajadores') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('updateworkphoto',$worker) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Foto Actual') }}</label>
                                <img src="{{asset('images/'.$worker->image)}}" width="100px">
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Sube una foto tuya') }}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="inputfile" name="image" onchange="loadFile(event)" value="{{ old('image') }}" style="
                                    .inputfile {
                                        width: 0.1px;
                                        height: 0.1px;
                                        opacity: 0;
                                        overflow: hidden;
                                        position: absolute;
                                        z-index: -1;} ">
                                    <img id="output" style="max-height: 100px"/>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Actualizar') }}
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

