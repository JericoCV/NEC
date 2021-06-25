@extends('Layouts.app')
@section('content')
    <div class="container"style="padding-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @php($user=Auth::user())
                    <div class="card-header"><a href="{{route('workerprofile',$user)}}"> {{ __('Perfil profesional') }}</a></div>
                    <div class="card-body">
                        @foreach($requests as $request)
                            @php($client = \App\Http\Controllers\UsersController::finduserbyId($request->userid))
                            {{$client->name}}
                            {{$request->detalle}}
                            <form action="{{route('requestresult',$request,$worker)}}" method="post">
                                @csrf
                                @method('put')
                                <select name="estado">
                                    <option value="aceptado">ACEPTAR</option>
                                    <option value="rechazado">RECHAZAR</option>
                                </select>
                                <button type="submit">ENVIAR</button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
