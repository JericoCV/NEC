@extends('layouts.app')

@section('content')
    <div class="container"style="padding-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Servicios') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            {{__('Busca servicios cerca a tu ciudad') }}
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
                            <img src="{{asset('images/img_3.png')}}"width="100%"><br>
                            @foreach($servicio as $service)
                                <label>
                                    <a href="{{route('showservice',$service)}}">{{$service->servicename}}</a><br>
                                </label><br>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection
