@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 80px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido(a) '.Auth::user()->name) }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="{{asset('images/img_1.png')}}"width="100%">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
