@extends('Layouts.app')
@section('content')
    <div class="container"style="padding-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @php
                            switch ($servicio->city){
                                case 'huanuco':
                                    $ciudad = 'showservicesh';
                                    break;
                                case 'amarillis':
                                    $ciudad = 'showservicesa';
                                    break;
                                case 'pillcomarca':
                                    $ciudad = 'showservicesp';
                                    break;}
                        @endphp
                        <a href="{{route($ciudad)}}">{{$servicio->servicename}}</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ 'Selecciona tu ciudad' }}
                                </a>

                                <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('showservicesh') }}">
                                        {{__('Huanuco')}}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('showservicesp') }}">
                                        {{__('Pillco Marca')}}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('showservicesa') }}">
                                        {{__('Amarillis')}}
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-header">{{ __('Trabajadores') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @php ($workers = \App\Http\Controllers\PerfilController::showprofilesbyIdservice($servicio->id))
                        @if(!empty($workers))
                            @foreach($workers as $worker)
                                <label>
                                    <a href="{{route('showworker',$worker)}}">{{$worker->name}} {{$worker->lastname}}</a>
                                </label>@endforeach
                            @else
                                <label>
                                    No hay trabajadores aun
                                </label>
                            @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
