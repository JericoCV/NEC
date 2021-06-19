@extends('Layouts.app')
@section('content')
    <div class="container"style="padding-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Perfil profesional') }}</div>
                    <div class="card-body">
                        <img src="{{asset('images/'.$worker->image)}}" width="100px">
                        {{$worker->name}}
                        <a href="{{route('requests',$worker)}}">Solicitudes</a>
                        <a href="{{route('works',$worker)}}">Trabajos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
