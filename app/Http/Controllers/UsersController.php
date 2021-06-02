<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function showuser(User $user){
        return view('perfil',compact('user'));
    }

    public function edituser(User $user){
        return view('Usuario.editarperfil',compact('user'));
    }
    public function updateuser(Request $request, User $user){
        $request->validate([
            'name' => 'required',
            'dni' => 'required',
            'adress' => 'required',
            'phone' => 'required',
            'lastname' => 'required'
        ]);
        $user->name = $request->name;
        $user->dni = $request->dni;
        $user->adress = $request->adress;
        $user->phone = $request->phone;
        $user->lastname = $request->lastname;
        $user->save();
        return redirect()->route('showuser',compact('user'));
    }
}
