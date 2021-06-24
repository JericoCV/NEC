@if($worker->userid != Auth::user()->id)
    <a href="{{route('createcontract',$worker)}}">Contratar</a>
    @else
    @php($user=Auth::user())
    <a href="{{route('workerprofile',$user->id)}}">{{__('Ir a mi perfil')}}</a>
@endif
