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
                        <label>
                            >{{$worker->name}} {{$worker->lastname}}
                            <br>
                            <a href="{{route('createcontract',$worker)}}">Contratar</a>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
