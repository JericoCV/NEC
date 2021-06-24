@extends('Layouts.app')
@section('content')
    <div class="container"style="padding-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __($worker->name.' '.$worker->lastname) }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div style="display: flex; background: #0c0b21; border-radius: 0px 50px 50px 0px">
                            <div>
                                <img src="{{asset('images/'.$worker->image)}}" width="100px">
                            </div>
                            <div style="padding-left: 10px; color: white">
                                <label>
                                    >{{$worker->name}} {{$worker->lastname}}
                                    <br>
                                    >{{$worker->profession}}
                                    <br>
                                    >{{$worker->workplace}}
                                    <br>
                                    @include('Layouts.recognize')
                                </label>

                            </div>
                        </div>
                            <div>
                                <label>
                                    Informacion:
                                </label>
                                {{$worker->info}}
                                <br>
                                <label>
                                    Horario:
                                </label>
                                {{$worker->schedule}}
                                <br>
                                <label>
                                    Remuneracion:
                                </label>
                                {{$worker->price}}

                            </div>
                            @if($worker->userid != Auth::user()->id)
                                <div>
                                    @if(\App\Http\Controllers\EstadoController::valorationvalidate(Auth::user()->id,$worker->id)=='new')
                                        <form action="{{route('valorate',$worker)}}" method="post">
                                            @csrf
                                            {{\App\Http\Controllers\EstadoController::valorationvalidate(Auth::user()->id,$worker->id)}}
                                            <input name="userid" type="hidden" value="{{Auth::user()->id}}">
                                            <div>
                                                <LABEL>Califica el trabajo de {{$worker->name}}</LABEL>
                                                <select name="calification">
                                                    <option value="1">MUY MALO</option>
                                                    <option value="2">MALO</option>
                                                    <option value="3">REGULAR</option>
                                                    <option value="4">BUENO</option>
                                                    <option value="5">MUY BUENO</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label>Como ha sido el trabajo de {{$worker->name}}</label>
                                                <textarea name="commentary"></textarea>
                                            </div>
                                            <div>
                                                <button type="submit">VALORAR</button>
                                            </div>
                                        </form>
                                    @else
                                        @php($valoration =\App\Http\Controllers\EstadoController::getvaloration(Auth::user()->id,$worker->id))
                                        <form action="{{route('valorateupdate',$valoration->id)}}" method="post">
                                            @csrf
                                            @method('put')
                                            <input name="userid" type="hidden" value="{{Auth::user()->id}}">
                                            <div>
                                                <LABEL>Califica el trabajo de {{$worker->name}}</LABEL>
                                                <select name="calification">
                                                    <option value="1">MUY MALO</option>
                                                    <option value="2">MALO</option>
                                                    <option value="3">REGULAR</option>
                                                    <option value="4">BUENO</option>
                                                    <option value="5">MUY BUENO</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label>Como ha sido el trabajo de {{$worker->name}}</label>
                                                <textarea name="commentary"></textarea>
                                            </div>
                                            <div>
                                                <button type="submit">ACTUALIZAR</button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
