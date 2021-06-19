<?php

namespace App\Http\Controllers;
use App\Models\Contrato;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Perfil;

class ContratoController extends Controller
{
    public function createcontract(Perfil $worker){
        return view('Contract.newcontract', compact('worker'));
    }
    public function savecontract(Request $request,Perfil $worker){
        $request->validate([
            'adress' => 'required',
            'detalle' => 'required'
        ]);
        $contract = new Contrato();
        $contract->userid = $request->userid;
        $contract->profileid = $worker->id;
        $contract->adress = $request->adress;
        $contract->detalle = $request->detalle;
        $contract->price = 'Acordado entre el cliente y el trabajador';
        $contract->estado = 'solicitud';
        $contract->save();
        return redirect()->route('showworker',$worker);
    }
    public function showcontractsbyUser(User $user){
        $contracts = Contrato::where('userid',$user->id)->orderBy('created_at', 'asc')->get();
        return view('Contract.mycontracts',compact('contracts'));
    }

    public function viewcontract(Contrato $contract){
        return view('Contract.viewcontract',compact('contract'));
    }

    public function myrequests(Perfil $worker){
        $requests = Contrato::where('profileid',$worker->id)->where('estado','solicitud')->get();
        return view('Contract.myrequests',compact('requests','worker'));
    }
    public function requestresult(Request $estado,Contrato $request){
        $request->estado = $estado->estado;
        $request->save();
        $worker = Perfil::where('userid',$request->profileid)->first();
        return redirect()->route('requests', $worker);
    }
    public function myworks(Perfil $worker){
        $requests = Contrato::where('profileid',$worker->id)->where('estado','aceptado')->get();
        return view('Contract.myworks',compact('requests','worker'));
    }
}
