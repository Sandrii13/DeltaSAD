<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotasController extends Controller
{
    protected function create(Request $request){
        $isCreated=DB::table('notas')->insert(array(
            'nota' => $request->nota,
            'fecha' => Carbon::now(),
            'id_usuario' => $request->usuario,
            'id_tf' => Auth::user()->id
        ));

        if($isCreated == true){
            return back()->with('message', 'Nota creada');
        }
        return back()->with('message', 'Error al crear la nota');
    }

    protected function delete($id){
        $isDeleted = DB::table('notas')->where('id', $id)->delete();
        if ($isDeleted == true){
            return back()->with('message', 'Nota eliminada');
        }
        return back()->with('message', 'Error al eliminar la nota');
    }
}