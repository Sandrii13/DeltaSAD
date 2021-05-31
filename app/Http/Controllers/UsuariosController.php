<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IncidenciasController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsuariosController extends Controller
{
    //comprobamos el rol de la trabajadora: si es coordinadora devuleve los usuarios por zona, si es
    //tf devuleve los usuarios que tengan esa tf asignada
    public function index($message=null){
        if(Auth::user()->rol_id == 1){

            $usuarios = $this->showByZone(Auth::user()->zona);
            if($message!=null){
                return view('front/usuarios')->with('usuarios', $usuarios)->with('message', $message);
            }
            return view('front/usuarios', compact('usuarios', $usuarios));
        }
        $usuarios= $this->showByTf();
        return view('front/usuarios', compact('usuarios', $usuarios));
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

    protected function show(Request $request,$user_id){
        if( Auth::user()->rol_id == 1 || Auth::user()->rol_id == 3 ){
            $usuario = DB::table('usuarios')
                            ->join('users', 'users.id', '=','usuarios.tf_asignada')
                            ->select('usuarios.*', DB::raw('users.nombre AS tfn, users.apellidos AS tfa'))
                            ->where('usuarios.id', $user_id)
                            ->get();
            $incidencias = DB::table('incidencias')
                            ->join('users', 'users.id', '=', 'incidencias.id_tf')
                            ->join('usuarios', 'usuarios.id', '=', 'incidencias.id_usuario')
                            ->select( 'estado', 'descripcion', 'incidencias.created_at', DB::raw('incidencias.id AS idi'))
                            ->where('usuarios.id', $user_id)
                            ->get();
            $evolutivos = DB::table('evolutivos')
                            ->join('usuarios', 'id_usuario', '=', 'usuarios.id')
                            ->join('users', 'id_tf', '=', 'users.id')
                            ->select('evolutivos.id', 'evolutivos.fecha_creacion', 'evolutivos.descripcion', 'users.nombre')
                            ->where('id_usuario', $user_id)
                            ->get();
            $tf=DB::table('users')->select('id', 'nombre', 'apellidos')->where('zona', Auth::user()->zona)->where('rol_id', 2)->get();

            $query=compact('usuario', 'incidencias', 'evolutivos', 'tf');
            if(in_array(true, $query)){
                return view('front/usuario')->with('usuario', $usuario)->with('incidencias', $incidencias)->with('evolutivos', $evolutivos)->with('tfs', $tf);
            }
            Session::flash('errorCarga', 'Error al cargar usuario');
            return view('front/usuario');

        }else{
            $usuario = DB::table('usuarios')->select('id','nombre', 'apellidos', 'direccion', 'detalle', 'tareas' )
                        ->where('id', $user_id)->get();
            $notas = DB::table('notas')->join('users', 'notas.id_tf', '=', 'users.id')
                        ->select('notas.*', 'users.nombre', 'users.apellidos')
                        ->where('id_usuario', $user_id)->get();

            return view('front/usuario', compact('usuario', $usuario), compact('notas', $notas));
        }
    }

    protected function showByZone($zone){
        //mostrar usuarios x zona en pantalla principal de usuarios
        $users=DB::table('usuarios')->where('zona', $zone)->paginate(20);
        return $users;
    }

    protected function showByTf(){
        //mostrar usuarios x zona en pantalla principal de usuarios
        $users=DB::table('usuarios')->select('id', 'nombre', 'apellidos', 'direccion', 'telefono', 'detalle', 'tareas')->where('tf_asignada',Auth::id())->orWhere('tf_asignada2', Auth::id())->orderBy('apellidos', 'desc')->paginate(20);
        return $users;
    }

    protected function update(Request $request){
        $update=DB::table('usuarios')->where('id', $request->id)->update([
            'direccion' => $request->direccion,
            'telefono' => $request->telf,
            'persona_contacto' => $request->contacto,
            'detalle' => $request->detalle,
            'tareas' => $request->tareas,
            'tf_asignada' => $request->tf,
            'horas_asignadas' => $request->horas
        ]);

        if($update == true){
            Session::flash('umodificado', 'Usuario modificado');
        }else{
            Session::flash('uerror', 'Error al modificar usuario');
        }
        return back()->withInput();
    }

    protected function delete($id){
        $e=DB::table('evolutivos')->where('id_usuario', $id)->delete();
        $h=DB::table('horarios')->where('id_usuario', $id)->delete();
        $i=DB::table('incidencias')->where('id_usuario', $id)->delete();
        $n=DB::table('notas')->where('id_usuario', $id)->delete();
        $u=DB::table('usuarios')->where('id', $id)->delete();
        $deleted=compact('e', 'h', 'i', 'n', 'u');
        if(in_array(true, $deleted)){
            Session::flash('eliminado', 'Usuario eliminado');
        }
        Session::flash('error', 'Usuario eliminado');
        return redirect('usuarios');
    }
}
