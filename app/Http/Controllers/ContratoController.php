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
        $contract->save();
        return redirect()->route('showworker',$worker);
    }
    public function showcontractsbyUser(User $user){
        $contracts = Contrato::where('userid',$user->id)->get();
        return view('Contract.mycontracts',compact('contracts'));
    }

}
