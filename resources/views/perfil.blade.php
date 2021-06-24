@extends('Layouts.app')
@section('content')
    <div class="container"style="padding-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Bienvenido(a) '.Auth::user()->name) }}</div>
                    <div class="card-body">
                        <div style="width: 100%;height: 150px;background: linear-gradient(90deg, rgba(186,188,189,0) 0%, rgba(142,142,142,0) 18%, rgba(33,33,94,1) 100%);">
                                {{$user->name}}<br>
                            @if(!empty($user->lastname)){{$user->lastname}}
                            @else

                                <label>
                                    No te olvides <a href="{{route('edituser',$user->id)}}">completar tu perfil</a>
                                </label> @endif
                            <br>{{$user->email}}<br>
                            @if(!empty($user->lastname))
                                {{$user->adress}}<br>
                                {{$user->phone}}<br>
                            <a href="{{route('edituser',$user->id)}}">Edita tu perfil</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
