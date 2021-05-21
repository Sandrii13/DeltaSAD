@extends('layouts.master')

@section('content')
<style>.container{ width:80%;}

</style>
<div class="container-fluid p-0 m-0 d-flex usuarios">
   
        @include('front.nav')       
  <div class="row container-fluid justify-content-center aligin-items-center">
         
          <div class="col-12 mt-5 ml-5">
            <h1 class="title-user">Trabajadora</h1>
          </div>
          
          <div class="col ml-5">  
                   
            <h2 class="subtitle-user">Tu equipo</h2> 
            </div>
            <div class="col">
            <ul class="nav justify-content-end">
                  <li class="nav-items">

                    <a href="#" class="nav-link active" data-toggle="modal" data-target="#nueva" ><h2>Añadir nueva</h2></a>
                  </li>
                  <li class="nav-items border-left">
                    <a class="nav-link active" href="#"><h2>Mostrar todas</h2></a>
                  </li>
                  
             </ul>             
      
   
           </div>           

<div class="col-12 mt-3 ml-5">
  <hr class="user-underline">
  <div class="container justify-content-center align-items-center vh-100">
      <!--grupo1-->
      <div class="card-deck">

      <div class="card text-center" style="width: 18rem;">
                <img src="/img/icons/trabajadora.png" class="card-img-top" alt="...">
                <div class="card-body bg-primary">
                  <h5 class="card-title">Maria Dolors</h5>   
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">933 444 222</li>
                  <li class="list-group-item">maria@gmail.com</li>
                  <li class="list-group-item">Zona I</li>
                </ul>
                <div>
                <a href="#" class="card-link" data-toggle="modal" data-target="#horarios">Horarios</a>
                <a href="#" class="card-link" data-toggle="modal" data-target="#usuario">Usuarios</a>
                </div>
        </div>
        


       <div class="card text-center" style="width: 18rem;">
                <img src="/img/icons/trabajadora.png" class="card-img-top" alt="...">
                <div class="card-body bg-primary">
                  <h5 class="card-title">Maria Dolors</h5>   
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">933 444 222</li>
                  <li class="list-group-item">maria@gmail.com</li>
                  <li class="list-group-item">Zona I</li>
                </ul>
                <div>
                <a href="#" class="card-link" data-toggle="modal" data-target="#horarios">Horarios</a>
                <a href="#" class="card-link" data-toggle="modal" data-target="#usuario">Usuarios</a>
                </div>
        </div>

        <div class="card text-center"style="width: 18rem;">
                  <img src="/img/icons/trabajadora.png" class="card-img-top" alt="...">
                  <div class="card-body bg-primary">
                    <h5 class="card-title">Maria Dolors</h5>   
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">933 444 222</li>
                    <li class="list-group-item">maria@gmail.com</li>
                    <li class="list-group-item">Zona I</li>
                  </ul>
                  <div>
                  <a href="#" class="card-link" data-toggle="modal" data-target="#horarios">Horarios</a>
                  <a href="#" class="card-link" data-toggle="modal" data-target="#usuario">Usuarios</a>
                  </div>
        </div>

        <div class="card text-center"style="width: 18rem;">
                  <img src="/img/icons/trabajadora.png" class="card-img-top" alt="...">
                  <div class="card-body bg-primary">
                    <h5 class="card-title">Maria Dolors</h5>   
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">933 444 222</li>
                    <li class="list-group-item">maria@gmail.com</li>
                    <li class="list-group-item">Zona I</li>
                  </ul>
                  <div>
                   
                    <a href="#" class="card-link" data-toggle="modal" data-target="#horarios">Horarios</a>
                    <a href="#" class="card-link" data-toggle="modal" data-target="#usuario">Usuarios</a>
                  </div>
        </div>
      </div> 
<!--grupo2-->


  

<div class="modal fade" id="horarios">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4>Horarios</h4>
                
            </div>
            <div class="modal-body">
                <p>Lu - Ma 08:00-14:00 </p>
                <p>Lu - Ma 08:00-14:00 </p>
                <p>Lu - Ma 08:00-14:00 </p>
            </div>
            <div class="modal-footer">
            <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>

            </div>
        </div>
    </div>   
</div>


<div class="modal fade" id="usuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 >Usuarios Asignados</h4>
            </div>
            <div class="modal-body">
              <h2>Usuarios</h2>
               <p> lista </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="close" data-dismiss="modal">
                    <span class="span">×</span>
                </button>

            </div>
        </div>
    </div>   
</div>





</div>

</div>
</div>  
</div>
@endsection
