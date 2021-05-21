@extends('layouts.master')

@section('content')
    <div class="container-fluid p-0 m-0 d-flex usuarios">
        @include('front.nav')
        <div class="row">
            <div class="col-12 mt-5 ml-5">
                <h1 class="title-user">TRABAJADORAS</h1>
            </div>
            <div class="col-12 ml-5">
                <h2 class="subtitle-user">Todas las trabajadoras</h2>
                <hr class="user-underline">
            </div>
            <div class="row">
                <div class="col-12">

                </div>
            </div>
            <div class="col-12 mt-3 ml-5 " id="filtrar_block">
                <p class="col-md-auto">Buscar por:</p>
                <div class="row ml-5">
                   <div class="col-12">
                       <div class="col-md-12">
                           <div class="col-md-5">
                               <div class="form-group row dni_trabajadoras ">
                                   <div class="col-12">
                                       <div class="col-md-12">

                                           <label for="dni" class="col-4 col-md-4 col-form-label text-md-right dni_view">{{ __('Dni:') }}</label>

                                           <div class="col-md-6">
                                               <input id="dni_search" type="text" class="form-control col-md-12" name="dni" required="" autocomplete="dni">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-5">
                               <div class="form-group  row dni_trabajadoras">
                                   <div class="col-12">
                                       <div class="col-md-12">
                                           <label for="dni" class="col-12 col-md-4 col-form-label text-md-right select_view">{{ __('Zonas:') }}</label>

                                           <select id="select_zonas" class=" col-md-6 form-select" aria-label="Default select example" name="select_zonas">
                                               <option selected="">Selecciona</option>
                                               <!--solo es prueba, raquel no te enfades-->
                                               @php
                                                   use Illuminate\Support\Facades\DB;
                                                   $zones = DB::table('zonas')->select('zonas')->get();
                                                   for($i=0;$i<count($zones);$i++){
                                                      echo "<option value='".$zones[$i]->zonas."'>".$zones[$i]->zonas."</option>";
                                                   }
                                                   //dd($zones[$i]->zonas) ;
                                               @endphp
                                           </select>
                                       </div>

                                   </div>
                               </div>
                           </div>
                           <a class=" col-md-2 limpiar_filtro">Limpiar</a>

                       </div>
                   </div>
                </div>



            </div>
            <div class="col-md-8 ml-5 pl-5" id="tabla_filtrar">
                <table class="table col-md-3">
                    <thead>
                    <tr>
                        <th>Nombre y apellido</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Zona</th>
                        <th>Horarios</th>
                        <th>Usuarios</th>
                    </tr>
                    </thead>
                    <tr>
                        <td>Andrea Alonso</td>
                        <td>6529089</td>
                        <td>andrea@gmail.com</td>
                        <td class="zona_tabla_camp">clot</td>
                        <td><a href="">ver</a></td>
                        <td><a href="">ver</a></td>
                    </tr>
                   <!--trabajadoras-->
                </table>

            </div>


        </div>

    </div>
@endsection
