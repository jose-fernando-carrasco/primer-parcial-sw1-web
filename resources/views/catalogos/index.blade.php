<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Catalogos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<style>
    .card-img-top{
        height: 450px;
        width: 600px;
    }

    .container-fluid {
        margin-top: 4;
        height: 200px;
        width: 1500px;
    }

    body{
        margin-top:20px;
    }

    .events_area {
        padding: 50px 0 20px;
        background: #002347;
    }

    @media (max-width: 991px) {
        .events_area {
            padding: 70px 0;
        }
    }

    .events_area .event-link {
        color: #fdc632;
        font-size: 13px;
        text-transform: uppercase;
    }

    .events_area .event-link img {
        margin-left: 5px;
        display: inline-block;
    }

    .single_event {
        margin-bottom: 30px;
    }

    .single_event .event_thumb {
        overflow: hidden;
    }

    .single_event .event_thumb img {
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
    }

    .single_event .event_details {
        background: rgba(0, 35, 71, 0.5);
        position: absolute;
        top: 0px;
        right: 0px;
        width: 275px;
        padding: 30px 25px;
        color: #ffffff;
    }

    .single_event .event_details .date {
        color: #ffffff;
        padding-right: 15px;
        border-right: 2px solid #fff;
        font-family: "Rubik", sans-serif;
        font-size: 14px;
    }

    .single_event .event_details .date span {
        display: block;
        color: #fdc632;
        font-size: 28px;
        font-weight: 500;
    }

    .single_event .event_details .time-location {
        padding-left: 15px;
        font-size: 14px;
    }

    .single_event .event_details .time-location p {
        margin-bottom: 0px;
    }

    .single_event .event_details .time-location p span {
        color: #ffffff;
        font-size: 13px;
        font-weight: 500;
    }

    .single_event:hover img {
        transform: scale(1.1);
    }

    .single_event:hover h4 a {
        color: #fdc632;
    }

</style>

<body>
  
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Creando Catalogo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('catalogos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nombre del Catalogo</label>
                        <input type="text" class="form-control" name="titulo">
                        @error('titulo')
                            <small class="text-danger">{{$message}}</small>
                        @enderror{{--  despuer ver com quedarse en el modal paa ver el error --}}
                    </div>

                    <div class="form-group">
                        <label>Descripcion</label>
                        <input type="text" class="form-control" name="descripcion">
                    </div>

                    <div class="form-group">
                        <input name="file" type="file" accept="image/*">
                    </div>

                    <div class="form-group">{{-- solo Los fotografos pueden crear catalogos --}}
                        @if(auth()->user()->tipoCuenta == 2)
                           <input type="hidden" class="form-control" name="fotografo_id" value="{{auth()->user()->fotografo()->id}}">
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <h1 class="font-weight-bold">Catalogos De los Fotografo</h1>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.css">
    <div class="container-fluid">
        <div class="events_area"> 
            <div class="container">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                    Crear Catalogo
                </button>
                <a href="{{route('home')}}" class="btn btn-danger">Volver</a>
                
                {{-- <div><label>  </label></div> --}}
                @foreach ($fotografos as $fotografo)
                    <div class="d-flex justify-content-center">
                        <h1 class="font-weight-bold text-light">{{$fotografo->user()->name}}</h1>
                    </div>

                    <div class="row">
                        @foreach ($fotografo->catalogos() as $catalogo)
                            <div class="col-lg-6 col-md-6">
                                <div class="single_event position-relative">
                                    <div class="event_thumb">
                                        <img src="{{$catalogo->url}}" class="card-img-top" />
                                    </div>
                                    <div class="event_details">
                                        <div class="d-flex mb-4">
                                            <div class="date"><span>{{date("d", $catalogo->cred_at)}}</span>{{date("F", mktime(0, 0, 0, date("m", $catalogo->cred_at), 10));}}</div>
                                            <div class="time-location">
                                                <p><span class="ti-time mr-2"></span> {{date("H", $catalogo->cred_at).':'.date("i", $catalogo->cred_at)}}</p>
                                                <p><span class="ti-location-pin mr-2"></span> Santa Cruz</p>
                                            </div>
                                        </div>
                                        <h2>{{$catalogo->titulo}}</h2>
                                        <p>{{$catalogo->descripcion}}</p>
                                        <a href="{{route('imagenes.index',$catalogo->id)}}" class="btn btn-primary rounded-0 mt-3">Ver Album</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>