<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eventos Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<style>
    .tamanito{
        height: 350px;
        width: 290px;
    }
    .card:not([class*=card-outline-]) {
       border: 0;
    }
    .card {
        height: 100%;
        box-shadow: 0 9px 23px rgba(0, 0, 0, 0.09), 0 5px 5px rgba(0, 0, 0, 0.06) !important;
        -webkit-transition: box-shadow 0.7s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
        -moz-transition: box-shadow 0.7s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
        -o-transition: box-shadow 0.7s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
        transition: box-shadow 0.7s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
        -webkit-border-radius: 0.4167rem;
        -moz-border-radius: 0.4167rem;
        -ms-border-radius: 0.4167rem;
        -o-border-radius: 0.4167rem;
        border-radius: 0.4167rem;
    }
    .blockquote {
        margin-bottom: 1rem;
        font-size: 1.25rem;
    }

    blockquote {
        padding: .5rem 1rem;
        font-size: 1.25rem;
        border-left: .25rem solid #eceeef;
    }
    blockquote {
        margin: 0 0 1rem;
    }
    .blockquote p {
        font-size: 1.1rem;
    }
    .card .card-body p {
        margin-bottom: 1rem;
    }

    /* Backgrounds */

    .bg-primary {
        color: #FFFFFF;
        background-color: #07a7e3 !important;
    }

    .bg-secondary {
        color: #FFFFFF;
        background-color: #4f5b60 !important;
    }

    .bg-success {
        color: #FFFFFF;
        background-color: #0ad251 !important;
    }

    .bg-info {
        color: #FFFFFF;
        background-color: #55d3f5 !important;
    }

    .bg-warning {
        color: #ac9a02 !important;
        background-color: #fce418 !important;
    }

    .bg-danger {
        color: #FFFFFF;
        background-color: #f43a59 !important;
    }

    .bg-dark {
        background-color: #122f3b !important;
    }

    .bg-light {
        background-color: #F7F7FA !important;
    }

    .bg-tranparent {
        background-color: transparent !important;
    }

    .bg-dark *,
    .bg-danger *,
    .bg-warning *,
    .bg-info *,
    .bg-success *,
    .bg-secondary *,
    .bg-primary *,
    .bg-dark .batch-icon,
    .bg-danger .batch-icon,
    .bg-warning .batch-icon,
    .bg-info .batch-icon,
    .bg-success .batch-icon,
    .bg-secondary .batch-icon,
    .bg-primary .batch-icon {
        color: #FFFFFF;
    }

    .bg-gradient [class^="card-"],
    .bg-gradient [class^="card-"] * {
        color: #FFFFFF !important;
    }


    /* Highlight Colors - Bottom Border */

    .highlight-color-blue {
        color: #FFFFFF !important;
        background-color: #07a7e3 !important;
    }

    .highlight-color-green {
        color: #FFFFFF !important;
        background-color: #0ad251 !important;
    }

    .highlight-color-orange {
        color: #FFFFFF !important;
        background-color: #FC9131 !important;
    }

    .highlight-color-yellow {
        color: #FFFFFF !important;
        background-color: #F8D800 !important;
    }

    .highlight-color-red {
        color: #FFFFFF !important;
        background-color: #EA5455 !important;
    }

    .highlight-color-purple {
        color: #FFFFFF !important;
        background-color: #973999 !important;
    }

    .bg-gradient {
        color: #FFFFFF !important;
        background: #07a7e3;
        /* Old browsers */
        background: -moz-linear-gradient(-45deg, #07a7e3 0%, #32dac3 100%);
        /* FF3.6-15 */
        background: -webkit-linear-gradient(-45deg, #07a7e3 0%, #32dac3 100%);
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(135deg, #07a7e3 0%, #32dac3 100%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr=$qp-color-1, endColorstr=$qp-color-2, GradientType=1);
        /* IE6-9 fallback on horizontal gradient */
        -webkit-transition: opacity 0.2s ease-out;
        -moz-transition: opacity 0.2s ease-out;
        -o-transition: opacity 0.2s ease-out;
        transition: opacity 0.2s ease-out;
    }

    .bg-gradient [class^="card-"],
    .bg-gradient [class^="card-"] * {
        color: #FFFFFF !important;
    }

    .bg-secondary.bg-gradient {
        color: #FFFFFF !important;
        background: #4f5b60;
        /* Old browsers */
        background: -moz-linear-gradient(-45deg, #4f5b60 0%, #97a9b2 100%);
        /* FF3.6-15 */
        background: -webkit-linear-gradient(-45deg, #4f5b60 0%, #97a9b2 100%);
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(135deg, #4f5b60 0%, #97a9b2 100%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr=$qp-color-1, endColorstr=$qp-color-2, GradientType=1);
        /* IE6-9 fallback on horizontal gradient */
        -webkit-transition: opacity 0.2s ease-out;
        -moz-transition: opacity 0.2s ease-out;
        -o-transition: opacity 0.2s ease-out;
        transition: opacity 0.2s ease-out;
        -webkit-transition: width 0.3s ease-in-out;
        -moz-transition: width 0.3s ease-in-out;
        -o-transition: width 0.3s ease-in-out;
        transition: width 0.3s ease-in-out;
    }

    .bg-success.bg-gradient {
        color: #FFFFFF !important;
        background: #28C76F;
        /* Old browsers */
        background: -moz-linear-gradient(-45deg, #28C76F 0%, #81FBB8 100%);
        /* FF3.6-15 */
        background: -webkit-linear-gradient(-45deg, #28C76F 0%, #81FBB8 100%);
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(135deg, #28C76F 0%, #81FBB8 100%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr=$qp-color-1, endColorstr=$qp-color-2, GradientType=1);
        /* IE6-9 fallback on horizontal gradient */
        -webkit-transition: opacity 0.2s ease-out;
        -moz-transition: opacity 0.2s ease-out;
        -o-transition: opacity 0.2s ease-out;
        transition: opacity 0.2s ease-out;
        -webkit-transition: width 0.3s ease-in-out;
        -moz-transition: width 0.3s ease-in-out;
        -o-transition: width 0.3s ease-in-out;
        transition: width 0.3s ease-in-out;
    }

    .bg-info.bg-gradient {
        color: #FFFFFF !important;
        background: #3677FF;
        /* Old browsers */
        background: -moz-linear-gradient(-45deg, #3677FF 0%, #FFD26F 100%);
        /* FF3.6-15 */
        background: -webkit-linear-gradient(-45deg, #3677FF 0%, #FFD26F 100%);
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(135deg, #3677FF 0%, #FFD26F 100%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr=$qp-color-1, endColorstr=$qp-color-2, GradientType=1);
        /* IE6-9 fallback on horizontal gradient */
        -webkit-transition: opacity 0.2s ease-out;
        -moz-transition: opacity 0.2s ease-out;
        -o-transition: opacity 0.2s ease-out;
        transition: opacity 0.2s ease-out;
        -webkit-transition: width 0.3s ease-in-out;
        -moz-transition: width 0.3s ease-in-out;
        -o-transition: width 0.3s ease-in-out;
        transition: width 0.3s ease-in-out;
    }

    .bg-warning.bg-gradient {
        color: #4f5b60 !important;
        background: #FC9131;
        /* Old browsers */
        background: -moz-linear-gradient(-45deg, #FC9131 0%, #FCCF31 100%);
        /* FF3.6-15 */
        background: -webkit-linear-gradient(-45deg, #FC9131 0%, #FCCF31 100%);
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(135deg, #FC9131 0%, #FCCF31 100%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr=$qp-color-1, endColorstr=$qp-color-2, GradientType=1);
        /* IE6-9 fallback on horizontal gradient */
        -webkit-transition: opacity 0.2s ease-out;
        -moz-transition: opacity 0.2s ease-out;
        -o-transition: opacity 0.2s ease-out;
        transition: opacity 0.2s ease-out;
        -webkit-transition: width 0.3s ease-in-out;
        -moz-transition: width 0.3s ease-in-out;
        -o-transition: width 0.3s ease-in-out;
        transition: width 0.3s ease-in-out;
    }

    .bg-danger.bg-gradient {
        color: #FFFFFF !important;
        background: #EA5455;
        /* Old browsers */
        background: -moz-linear-gradient(-45deg, #EA5455 0%, #FC9131 100%);
        /* FF3.6-15 */
        background: -webkit-linear-gradient(-45deg, #EA5455 0%, #FC9131 100%);
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(135deg, #EA5455 0%, #FC9131 100%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr=$qp-color-1, endColorstr=$qp-color-2, GradientType=1);
        /* IE6-9 fallback on horizontal gradient */
        -webkit-transition: opacity 0.2s ease-out;
        -moz-transition: opacity 0.2s ease-out;
        -o-transition: opacity 0.2s ease-out;
        transition: opacity 0.2s ease-out;
        -webkit-transition: width 0.3s ease-in-out;
        -moz-transition: width 0.3s ease-in-out;
        -o-transition: width 0.3s ease-in-out;
        transition: width 0.3s ease-in-out;
    }
</style>

<body>
    <div class="container">
        <div class="row mb-5 mt-4">
            
            <div class="col-md-12 mt-4 mb-4">
                <a href="{{route('users.show',$cliente->user()->id)}}" class="btn btn-success mb-3">volver</a>
                <a href="{{route('home')}}" class="btn btn-danger mb-3">salir</a>
                <h3 class="text-primary"><strong>EVENTO MODO INVITADO</strong></h3>
            </div>

            @foreach ($EventosInvitados as $EventosInvitado) 
                <div class="col-md-4 mb-5">
                    <div class="card bg-secondary bg-gradient mb-3 text-center">
                    <div class="card-body">
                        <blockquote class="blockquote">
                            <img src="{{$EventosInvitado->url}}" class="tamanito">
                            <footer>
                                <h3>{{$EventosContrato->titulo}}</h3>
                                <a href="" class="btn btn-primary mt-1">ver evento</a>
                            </footer>
                        </blockquote>
                    </div>
                    </div>
                </div>
             @endforeach

            <div class="col-md-12 mb-4">
                <h3 class="text-primary"><strong>EVENTO MODO CONTRATO</strong></h3>
            </div>

            @foreach ($EventosContratos as $EventosContrato) 
                <div class="col-md-4 mb-5">
                    <div class="card bg-info bg-gradient mb-3 text-center">
                        <div class="card-body">
                            <blockquote class="blockquote">
                            <img src="{{$EventosContrato->url}}" class="tamanito">
                            <footer>
                                <h3>{{$EventosContrato->titulo}}</h3>
                                <a href="{{route('eventos.imageneventos',$EventosContrato->id)}}" class="btn btn-primary mt-1">ver evento</a>
                            </footer>
                            </blockquote>
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