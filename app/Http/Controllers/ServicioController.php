<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use function Ramsey\Uuid\v1;

class ServicioController extends Controller
{
    public function showall(){
        $servicios = Servicio::all();
        return $servicios;
    }

    public function showservicesh(){
        $servicio = Servicio::where('city','huanuco')->get();
        return view('Servicio.servicios',compact('servicio'));
    }
    public function showservicesp(){
        $servicio = Servicio::where('city','pillcomarca')->get();
        return view('Servicio.servicios',compact('servicio'));
    }
    public function showservicesa(){
        $servicio = Servicio::where('city','amarillis')->get();
        return view('Servicio.servicios',compact('servicio'));
    }

    public function services(Servicio $servicio){
        return view('Servicio.servicios',compact('servicio'));
    }

}
