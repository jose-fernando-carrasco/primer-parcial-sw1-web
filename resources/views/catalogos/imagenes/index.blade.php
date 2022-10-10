<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index Imagenes</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<style>

    .ima-grande{
        height: 230px;
        width: 330px; 
    }

    .ima-pequeno{
        height: 110px;
        width: 230px; 
    }

    body{
        background:#f5f5f5;
        margin-top:20px;
    }

    .card-img-tiles {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        position: relative;
        background-color: #fff;
        z-index: 5
    }

    .card-img-tiles .main-img>img,
    .card-img-tiles .thumblist>img {
        display: block;
        width: 100%
    }

    .card-img-tiles .main-img {
        width: 67%;
        padding-right: .375rem
    }

    .card-img-tiles .thumblist {
        width: 33%;
        padding-left: .375rem
    }

    .card-img-tiles .thumblist>img {
        margin-bottom: .75rem
    }

    .card-img-tiles .thumblist>img:last-child {
        margin-bottom: 0
    }

    .mb-grid-gutter {
        margin-bottom: 30px !important;
    }

</style>

<body>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Subiendo Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('imagenes.store',$catalogo->id)}}" method="POST" enctype="multipart/form-data">
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
                            @if(auth()->user()->tipoCuenta == 2)
                               <input type="hidden" class="form-control" name="catalogo_id" value="{{$catalogo->id}}">
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Subir</button>
                    </div>
                </form>
            </div>
            </div>
        </div>


    
    <div class="container pb-5 mb-sm-1">
        <h1 class="d-flex justify-content-center pb-3">Catalogo {{$catalogo->titulo}}</h1>
        <div class="pb-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Subir Imagen</button>
            <a href="{{route('catalogos.index')}}" class="btn btn-danger">Volver</a>
        </div>
        <!-- Categories grid-->
        <div class="row">
            <!-- Category-->
            @foreach($imagenes as $imagen)
                <div class="col-md-4 col-sm-6">
                    <div class="card border-0 mb-grid-gutter">
                        <a class="card-img-tiles" href="shop-style1-ls.html">
                            <div class="main-img"><img src="{{$imagen->url}}" alt="Clothing" class="ima-grande"></div>
                            <div class="thumblist"><img src="{{$imagen->url}}" alt="Clothing" class="ima-pequeno"><img src="{{$imagen->url}}" alt="Clothing" class="ima-pequeno"></div>
                        </a>
                        <div class="card-body border mt-n1 py-4 text-center">
                            <h2 class="h5 mb-1">{{$imagen->name}}</h2><span class="d-block mb-3 font-size-xs text-muted">Disponible por <span class="font-weight-semibold">$49.99</span></span><a class="btn btn-pill btn-outline-primary btn-sm" href="shop-style1-ls.html">Comprar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</html>