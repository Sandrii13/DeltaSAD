@extends('layouts.master')


@section('content')

<style>
    .fotos{
        position: relative;
    }

</style>
<section class="usuarios">
    <div class="row container-principal">
        <div class="col-12">
            <div class="row d-flex justify-content-center">
                <div class="col-12 mt-5 ml-5">
                    <h1 class="title-user">Trabajadora</h1>
                </div>
                <div class="col ml-5">
                    <h2 class="subtitle-user">Tu equipo</h2>
                </div>
                <div class="col">
                    <ul class="nav justify-content-end">
                        <li class="nav-items">
                            <a href="#" class="nav-link active" data-toggle="modal" data-target="#nueva">
                                <h2>Nueva</h2>
                            </a>
                        </li>
                        <li class="nav-items border-left">
                            <a class="nav-link active" href="{{route('trabajadoras.todas')}}">
                                <h2>Buscar</h2>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="fotos col-12 mt-3 ml-5">
                    <hr class="user-underline">

                    @if(isset($tfs))
                    @foreach ($tfs as $tf )
                    <div class="card col-12 col-md-10 mt-3 ml-5" style="width: 18rem;">



                        @if(isset($tf->img))
                        <img src="imagenUser/{{$tf->img}}">
                        @else
                        <img src="/img/icons/trabajadora.png" >
                        @endif


                        <div class="text-center">

                            <a href="#" onclick="usuarios({{$tf->id}})" class="card-link" data-toggle="modal"
                                data-target="#usuario">Usuarios</a>
                        </div>
                    </div>
                    @endforeach
                    @endif

            </div>
        </div>

    </div>
 </section>


@endsection
