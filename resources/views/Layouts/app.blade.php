<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="min-height: 635px">
    <header style="position: fixed;">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm"
             style="float:right;height:55px;width: 100%;position: fixed;left: 0;top: 0;
             background: rgba(22,16,42,0.89);">
            <div class="container">
                <a class="navbar-brand" href="{{ url('home') }}" style="color: white;">
                    {{ config('app.name', 'Laravel') }}
                </a>
                @if(isset(Auth::user()->id))
                <form action="{{route('search')}}" method="post">
                    @csrf
                    <div class="input-group">
                            <input name="busqueda" type="text" placeholder="Busca servicios o trabajadores" value="{{old('busqueda')}}" aria-label="Search" style="width: 300px; height: 40px; border: 0;border-radius: 6px 0px 0px 6px">
                            <button type="submit" style="border: 0; border-radius: 0px 6px 6px 0px">Search</button>
                    </div>
                </form>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="list-style-position: outside">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item"style="color: white;">
                                    <a class="nav-link" href="{{ route('login') }}" style="color: white;">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item"style="color: white;">
                                    <a class="nav-link" href="{{ route('register') }}" style="color: white;">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown" >
                                <a id="navbarDropdown" style="color: white;"class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    @php($user=Auth::user())
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{route('showuser',$user->id)}}">{{__('Profile')}}</a>
                                    <a class="dropdown-item" href="{{route('mycontracts',$user->id)}}">{{__('Contracts')}}</a>
                                    @php($answer = new \App\Http\Controllers\PerfilController())
                                    @if($answer->searchprofilebyUserId(Auth::user()->id) == 'consumidor')
                                        <a class="dropdown-item" href="{{route('registerp',$user->id)}}">{{__('Register as a professional ')}}</a>
                                    @elseif($answer->searchprofilebyUserId(Auth::user()->id) == 'trabajador')
                                        <a class="dropdown-item" href="{{route('workerprofile',$user->id)}}">{{__('Professional profile ')}}</a>
                                    @endif
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <main class="py-4"style="
            background: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg') no-repeat center center fixed;
            background-size: 100% 100%;
            min-height: 540px; padding-top: 55px;
            ">
            @yield('content')
        </main>
    </section>

</body>
<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
</html>
