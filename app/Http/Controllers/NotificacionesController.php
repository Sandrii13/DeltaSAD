<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class NotificacionesController extends Controller
{
    public function index(){

    }

    protected function viewSent(){
        $notification=DB::table('notificaciones')->join('users', 'users.id', '=', 'destinatario')->where('creador', Auth::user()->id)
                            ->select('notificaciones.*', DB::raw('users.nombre AS nombre, users.apellidos AS apellidos'))->get();
        $users=DB::table('users')->select('id', 'nombre', 'apellidos')->get();
        return view('front/notificaciones/enviadas')->with('notificaciones', $notification)->with('users', $users);
    }

    protected function create(Request $request){
        if($request->prioridad == null){
            $prioridad = 0;
        }
        $isCreated=DB::table('notificaciones')->insert(
            array(
                'asunto' => $request->asunto,
                'detalle' => $request->detalle,
                'creador' => Auth::user()->id,
                'destinatario' => $request->para,
                'prioridad' => $prioridad,
                'fecha' => Carbon::now()
            )
        );
        if($isCreated == true){
            return back()->with('message', 'Modificado');
        }
        return back()->with('message', 'Error al enviar notificacion');
    }

}
