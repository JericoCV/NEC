@extends('Layouts.app')
@section('content')
    <div class="results" style="padding-top: 80px; display: flex; align-content: center; padding-left: 20px">
        <div class="results-services" style="width: 400px; min-height: 150px; background: white;
        padding-left: 10px; padding-top: 10px; border-radius: 6px">
            {{'Servicios que coinciden con tu busqueda:'}}
            @php($services = \App\Http\Controllers\ServicioController::search($objective))
            @if(!empty($services))
                @foreach($services as $service)
                    <div style="width: 400px; text-align: center">
                        <label>
                            <a href="{{route('showservice',$service)}}">{{$service->servicename}}</a>
                        </label>
                    </div>
                @endforeach

            @endif
        </div>
        <div class="results-workers" style="width: 400px; min-height: 150px; background: white;
        padding-left: 10px; padding-top: 10px; border-radius: 6px; margin-left: 10px">
            {{'Trabajadores que coinciden con tu busqueda:'}}
            @php($workers = \App\Http\Controllers\PerfilController::search($objective))
            @if(!empty($workers))
                @foreach($workers as $worker)
                    <div style="width: 400px ; text-align: center">
                        <label>
                            <a href="{{route('showworker',$worker)}}">{{$worker->name}} {{$worker->lastname}}</a>
                        </label>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
