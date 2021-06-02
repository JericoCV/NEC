@extends('Layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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

@endsection
