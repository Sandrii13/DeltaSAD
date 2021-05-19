<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    //comprobamos el rol de la trabajadora: si es coordinadora devuleve los usuarios por zona, si es
    //tf devuleve los usuarios que tengan esa tf asignada
    public function index(Request $request){

        if($request->user()->hasRole('coordinadora') == true){
            $zone = DB::table('zona')->select('zona')->where('id',Auth::id())->orderBy('apellidos', 'desc')->get();
            $usuarios = $this->showByZone($zone);
            return view('front/usuarios', compact('usuarios', $usuarios));
        }

        $users= $this->showByTf();
        return view('front/usuarios', compact('users', $users));
    }

    protected function create(Request $request){

        $insert = DB::table('usuarios')->insert(
            array(
                'nombre' => $request->name,
                'apellidos' => $request->subname,
                'direccion' => $request->direction,
                'telefono' => $request->telf,
                'dni' => $request->dni,
                'persona_contacto' => $request->contact,
                'detalle' => $request->detail,
                'tareas' => $request->chores,
                'horas_asignadas'=> $request->hours,
                'archivos_adjuntos'=> $request->file,
                'tf_asignada'=> $request->tf1,
                'tf_asignada2' => $request->tf2,
                'zona' => $request->zone
            )
        );
        return redirect(); //redireccionar a la pag donde estabas estaria bien un popup conforme se ha creadp
    }

    protected function show(Request $request, $user_id){

        if($request->user()->hasRole() == 'coordinadora'){
            $columns = '*';
        }else{
            $columns = 'id, nombre, apellidos, direccion, telefono, detalle, tareas';
        }

        $usuario = DB::table('usuarios')->select($columns)->where('id', $user_id)->get();
        return view('usuario', compact('usuario', $usuario));
    }

    protected function showByZone($zone){
        //mostrar usuarios x zona en pantalla principal de usuarios
        $users=DB::table('usuarios')->where('zona', $zone)->get();
        return $users;
    }

    protected function showByTf(){
        //mostrar usuarios x zona en pantalla principal de usuarios
        $users=DB::table('usuarios')->select('id', 'nombre', 'apellidos', 'direccion', 'telefono', 'detalle', 'tareas')->where('tf_asignada',Auth::id())->orWhere('tf_asignada2', Auth::id())->orderBy('apellidos', 'desc')->get();
        return $users;
    }

    protected function update(Request $request){

    }

    protected function delete(Request $request){

    }
}
