@extends('Layouts.app')
@section('content')
    <div class="container"style="padding-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Detalles de contrato') }}</div>

                    <div class="card-body">
                        <label>
                            @php($user = Auth::user())
                            <a href="{{route('mycontracts',$user->id)}}">Atras</a><br>
                            @php($client=\App\Http\Controllers\UsersController::finduserbyId($contract->userid))
                            Cliente: {{ $client->name.' '.$client->lastname}}<br>
                            Direccion: {{ $contract->adress}}<br>
                            Detalle: {{ $contract->detalle}}<br>
                            {{$contract->created_at}}
                        </label>
                        @if($contract->estado == 'solicitud')
                            <form action="{{route('deletecontract',$contract)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit">Eliminar</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
