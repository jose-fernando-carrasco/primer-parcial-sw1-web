<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<style>
 
 .tamanito{
    height: 520px;
    width: 500px;
 }

body{
    margin-top:20px;
    background:#e7ebf2;    
}
/*
Profile
*/
.si-border-round {
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    border-radius: 50%;
}

.social-icon-sm {
    margin: 0 5px 5px 0;
    width: 30px;
    height: 30px;
    font-size: 18px;
    line-height: 30px !important;
    color: #555;
    text-shadow: none;
    border-radius: 3px;
    overflow: hidden;
    display: block;
    float: left;
    text-align: center;
    border: 1px solid #AAA;
}
.tabs-admin > .nav-item > .nav-link.active {
    border-color: #0073ff;
    color: #0073ff;
}

.tabs-admin > .nav-item > .nav-link {
    padding: 10px 15px;
    color: #555;
    font-weight: 600;
    text-transform: capitalize;
    margin-bottom: -2px;
    border-bottom: 2px solid transparent;
}
.act-content span.text-small {
    display: block;
    color: #999;
    margin-bottom: 10px;
    font-size: 12px;
}

.text-small {
    font-size: 12px !important;
}
.admin-tab-content {
    padding: 10px 15px;
}

.pt30 {
    padding-top: 30px !important;
}
.card .card-title {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 28px;
    margin: 0;
    font-size: .9rem;
    font-weight: 600;
    line-height: 28px;
}

.mb20 {
    margin-bottom: 20px !important;
}
.pb20 {
    padding-bottom: 20px !important;
}

.pt20 {
    padding-top: 20px !important;
}
.text-small {
    font-size: 12px !important;
}

.text-muted {
    color: #999 !important;
}
.card .card-content {
    padding: 15px 15px;
}
.profile-header {
  background-size: cover;
  position: relative;
  overflow: hidden; }
  .profile-header .img-fluid.rounded-circle {
    max-width: 100px;
    margin: 0 auto;
    margin-bottom: 20px;
    display: block; }

.activity-list > li {
  border-bottom: 1px solid #eee;
  padding-bottom: 20px;
  margin-bottom: 20px; }

.activity-list .float-left {
  margin-right: 10px;
  width: 40px;
  height: 40px;
  float: left;
  display: block;
  border-radius: 50%;
  background-color: #eee;
  font-size: 20px;
  line-height: 100%;
  line-height: 43px;
  text-align: center; }
  .activity-list .float-left a {
    display: inline-block;
    color: #999; }

.act-content {
  overflow: hidden; }
  .act-content span.text-small {
    display: block;
    color: #999;
    margin-bottom: 10px;
    font-size: 12px; }
</style>

<body>
    
     <!-- Modal -->
     <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Subiendo Foto al Perfil</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('imagenperfils.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nombre de la Imagen</label>
                        <input type="text" class="form-control" name="name">
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror{{--  despuer ver com quedarse en el modal paa ver el error --}}
                    </div>

                    <div class="form-group">
                        <input name="file" type="file" accept="image/*">
                    </div>

                    <div class="form-group">{{-- solo Los fotografos pueden crear catalogos --}}
                           <input type="hidden" class="form-control" name="user_id" value="{{auth()->user()->id}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">subir</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
    
        <div class="row">
            <div class="col-md-4 mb30">
                <div class="card">
    
                    {{-- Cabecera de izquierda --}}
                    <div class="card-content pt20 pb20 profile-header">
                        @if ($user->TengoImagenP())
                           <img src="{{$user->Imagenperfil1()->url}}" alt="" class="img-fluid rounded-circle">
                        @else
                           <img src="https://mycontenedor23.s3.amazonaws.com/Perfiles/Sin-Perfil/sin-foto-con-barbijo.jpg" alt="" class="img-fluid rounded-circle">
                        @endif
                        
                        <h4 class="card-title text-center mb20">{{$user->name}}</h4>
                        <p>Hola Soy {{$user->name}} bienvenido a mi perfil aqui podras ver muchas cosas entre ellas las fotos como ver mi correo</p>
                        
                        {{-- iconos de facebook etc... --}}
                        <div class="text-center clearfix">
                            <a href="#" class="social-icon-sm si-border si-facebook si-border-round">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#" class="social-icon-sm si-border si-twitter si-border-round">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" class="social-icon-sm si-border si-g-plus si-border-round">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a href="#" class="social-icon-sm si-border si-skype si-border-round">
                                <i class="fa fa-skype"></i>
                            </a>
                        </div>

                        <hr>
                        {{-- 947 seguidores --}}
                        <div class="row">
                            <div class="col-md-4 mb20">
                                <h5>947</h5>
                                <h6 class="text-small text-muted">Followers</h6>
                            </div>
                            <div class="col-md-4 mb20">
                                <h5>583</h5>
                                <h6 class="text-small text-muted">Tweets</h6>
                            </div>
                            <div class="col-md-4 mb20">
                                <h5>48</h5>
                                <h6 class="text-small text-muted">Posts</h6>
                            </div>
                        </div>
                        @can('users.index') 
                            <a href="{{route('users.index')}}" class="btn btn-success btn-rounded mt-2">usuarios</a>
                        @endcan
                        
                            <a href="{{route('home')}}" class="btn btn-danger btn-rounded mt-2">salir</a>
                        
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#staticBackdrop">
                            subir foto
                        </button>
                        {{-- Solo clientes --}}
                        @can('eventos.indexcliente')
                           <a href="{{route('eventos.indexcliente',auth()->user()->id)}}" class="btn btn-warning mt-2">mis eventos</a>
                        @endcan
                        {{-- <a href="{{route('home')}}" class="btn btn-primary btn-rounded">subir foto</a> --}}
                        <hr>
                        <div class="skill-bar mb20 clearfix">
                            <label for=""> Nombre de Usuario</label>
                            <div class="">
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" readonly>
                            </div>
                        </div>
                        <!--skill bar-->
                        <div class="skill-bar mb20 clearfix">
                            <label for=""> Correo de Usuario</label>
                            <div class="">
                                <input type="text" class="form-control" name="correo" value="{{$user->email}}" readonly>
                            </div>
                        </div>
                        <!--skill bar-->
                        <div class="skill-bar mb20 clearfix">
                            <label for=""> Tipo de Usuario</label>
                            <div class="">
                                <input type="text" class="form-control" name="rol" value="{{$user->getRol()}}" readonly>
                            </div>
                        </div>
                        <!--skill bar-->
                        <div class="skill-bar clearfix">
                            <span>Porcentaje de 3 fotos</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: {{$user->procentajeFotosPerfil()}}"></div>
                            </div>
                        </div>
                        
                    </div>
                    <!--content-->
    
                </div>
            </div>

            {{-- Lado derecho --}}
            <div class="col-md-8 mb30">
                <div class="card">
                    <div>
                        <!-- Nav tabs -->
                        <ul class="nav tabs-admin" role="tablist">
                            <li role="presentation" class="nav-item"><a class="nav-link active" href="#t1" aria-controls="t1" role="tab" data-toggle="tab">Fotos</a></li>
                        </ul>
    
                    @for ($i = 0; $i < 5; $i++)   
                        <!-- Tab panes -->
                        <div class="tab-content admin-tab-content pt30">
                            <div role="tabpanel" class="tab-pane active show" id="t1">
                                <ul class="activity-list list-unstyled">
                                    <li class="clearfix">
                                        
                                        <div class="act-content">
                                            <div class="font400">
                                               <h3>Foto {{$i+1}}</h3>
                                            </div>
                                            <p>Este es la foto numero {{$i+1}} que el usuario que configuro para un mejor escaneo de la inteligencia artificial</p>
                                            @empty($fotos[$i])
                                               <img src="https://mycontenedor23.s3.amazonaws.com/Perfiles/Sin-Perfil/sin-foto.png" alt="" class="img-fluid img-thumbnail tamanito">
                                            @else
                                               <img src="{{$fotos[$i]->url}}" alt="" class="img-fluid img-thumbnail tamanito">
                                            @endempty
                                        </div>
                                    </li>
                                    
                                    
                                </ul>
                            </div>
 
                        </div>
                        
                    @endfor
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</html>