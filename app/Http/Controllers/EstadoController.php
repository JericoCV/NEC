<?php

namespace App\Http\Controllers;
use App\Models\Estado;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public static function valorationvalidate(int $id1, int $id2){
        $valoration= Estado::where('userid',$id1)->where('profileid',$id2)->first();
        if (!empty($valoration->calification)){
            $message = 'Already exists';
        }else{
            $message = 'new';
        }
        return $message;
    }
    public static function getvaloration(int $id1, int $id2){
        $valoration= Estado::where('userid',$id1)->where('profileid',$id2)->first();
        return $valoration;
    }
     public function valorate(Perfil $worker, Request $request){
         $request->validate([
            'calification' => 'required',
             'commentary' => 'required'
         ]);
         $valoration = new Estado();
         $valoration->userid = $request->userid;
         $valoration->profileid = $worker->id;
         $valoration->calification = $request->calification;
         $valoration->commentary = $request->commentary;
         $valoration->save();
         return redirect()->route('showworker',$worker);
     }
    public function valorateupdate(Estado $valoration, Request $request){
        $request->validate([
            'calification' => 'required',
            'commentary' => 'required'
        ]);
        $valoration->calification = $request->calification;
        $valoration->commentary = $request->commentary;
        $valoration->save();
        $worker = Perfil::where('id',$valoration->profileid)->first();
        return redirect()->route('showworker',$worker);
    }
}
