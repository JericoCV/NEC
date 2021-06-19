<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\User;

class PerfilController extends Controller
{
    public function createprofile(User $user){
        return view('Profile.professional',compact('user'));
    }
    public function saveprofile(User $user, Request $request){
        $request->validate([
            'name' => 'required',
            'schedule' => 'required',
            'info' => 'required',
            'workplace' => 'required',
            'price' => 'required',
            'profession' => 'required',
            'servicegroup' => 'required',
            'lastname' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $perfil = new Perfil();
        $perfil->userid = $user->id;
        $perfil->name = $request->name;
        $perfil->lastname = $request->lastname;
        $perfil->servicegroup = $request->servicegroup;
        $perfil->profession = $request->profession;
        $perfil->workplace = $request->workplace;
        $perfil->schedule = $request->schedule;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $perfil->image = $imageName;
        $perfil->info = $request->info;
        $perfil->price = $request->price;
        $perfil->save();
        return redirect()->route('home');

    }
    public function searchprofilebyUserId(int $id){
        $answer = Perfil::where('userid',$id)->first();
        if(!empty($answer)){
            $respuesta ='trabajador';
        }else{
            $respuesta = 'consumidor';
        }
        return $respuesta;
    }
    public static function showprofilesbyIdservice(int $id){
        $results = Perfil::where('servicegroup',$id)->get();
        return $results;
    }
    public function showworker(Perfil $worker){
        return view('Profile.workerprofile',compact('worker'));
    }
    public function workerdata(User $user){
        $worker = Perfil::where('userid',$user->id)->first();
        return view('Profile.myworkprofile', compact('worker'));
    }
    public static function findworkerbyId(int $id){
        $worker = Perfil::where('userid',$id)->first();
        return view('Profile.myworkprofile', compact('worker'));
    }

}
