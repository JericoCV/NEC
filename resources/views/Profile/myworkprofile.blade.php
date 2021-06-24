@extends('Layouts.app')
@section('content')
    <div class="container"style="padding-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Perfil profesional') }}</div>
                    <div class="card-body">
                        <div style="width: 100%;background: linear-gradient(90deg, rgba(186,188,189,0) 0%, rgba(142,142,142,0) 18%, rgba(33,33,94,1) 100%);">
                            <div style="display: flex;">
                                <div>
                                    <img src="{{asset('images/'.$worker->image)}}" width="100px">
                                </div>
                                <div style="margin-left: 10px">
                                    <div style="width: 100%">
                                        <a href="{{route('editworkphoto',$worker)}}">Cambiar foto de perfil</a>
                                    </div>
                                    <div>
                                        <a href="{{route('editworkerprofile',$worker)}}">Editar mis datos</a>
                                    </div>
                                </div>

                            </div>
                            <h1>{{$worker->name}} {{$worker->lastname}}</h1>
                        </div>
                        <div>
                            <h4>{{$worker->profession}}</h4>
                        </div>
                        <div>
                            <h5>{{$worker->info}}</h5>
                        </div>
                        <div>
                            <label>{{$worker->schedule}}</label>
                        </div>
                        <div>
                            Remuneracion: <label>{{ $worker->price}}</label>
                        </div>
                        <div style="text-align: center; display: flex">
                            <div style="width: 50%">
                                <a href="{{route('requests',$worker)}}">Solicitudes</a>
                            </div>
                            <div style="width: 50%">
                                <a href="{{route('works',$worker)}}">Trabajos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
