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


    <div class="container pb-5 mb-sm-1">
        <h1 class="d-flex justify-content-center pb-3">Fotos del Evento</h1>
        <div class="pb-4">
            <a href="{{route('home')}}" class="btn btn-danger">salir</a>
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
                            <h2 class="h5 mb-1">{{$imagen->name}}</h2>
                            <h3 class="h5 mb-1">{{$imagen->fotografo()->user()->name}}</h3>
                            <span class="d-block mb-3 font-size-xs text-muted">Disponible por <span class="font-weight-semibold">$49.99</span></span><a class="btn btn-pill btn-outline-primary btn-sm" href="shop-style1-ls.html">Comprar</a>
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