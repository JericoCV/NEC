@extends('Layouts.app')
@section('content')
    <div class="container"style="padding-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New Contract') }}</div>

                    <div class="card-body">
                        @foreach($contracts as $contract)
                            <label>
                                {{$contract->detalle}}<br>
                                {{$contract->created_at}}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
