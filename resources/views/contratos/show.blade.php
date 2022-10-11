<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Contrato</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<style>

    .tamanito img{
        height: 140px;
        width: 160px;
    }

    .abs-center {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;/* alto */
    }

    .form {
        width: 750px;/* ancho */
    }
</style>

<body>
    {{-- <h1>Ver Contrato Especifico</h1> --}}
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Subiendo Foto al Evento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('imageneventos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nombre de la foto</label>
                        <input type="text" class="form-control" name="name">
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror{{--  despuer ver com quedarse en el modal paa ver el error --}}
                    </div>

                    <div class="form-group">
                        <input name="file" type="file" accept="image/*">
                    </div>

                    <div class="form-group">{{-- solo Los fotografos pueden crear catalogos --}}
                        <input type="hidden" class="form-control" name="evento_id" value="{{$contrato->evento()->id}}">
                    </div>

                    <div class="form-group">{{-- solo Los fotografos pueden crear catalogos --}}
                        <input type="hidden" class="form-control" name="contrato_id" value="{{$contrato->id}}">
                    </div>

                    <div class="form-group">{{-- solo Los fotografos pueden crear catalogos --}}
                        @if(auth()->user()->tipoCuenta == 2)
                           <input type="hidden" class="form-control" name="fotografo_id" value="{{auth()->user()->fotografo()->id}}">
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

    <div class="container mt-5">
       <div class="abs-center">
            <form class="border p-3 form border border-primary" action="{{route('contratos.update',$contrato)}}" method="POST">
                @csrf
                @method('put')

                <div class="form-group col-12">
                    <label class="h2 d-flex justify-content-center">CONTRATO</label>
                </div>

                {{-- QR --}}
                <div id="myQr" class="tamanito mb-4 d-flex justify-content-center">
          
                </div>

                <div class="form-row center">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Evento</label>
                        <input type="text" class="form-control" name="evento_id" value="{{$contrato->evento()->titulo}}" readonly>
                    </div>
                </div>

                <div class="form-row center">
                    
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold">Detalle del Contrato</label>
                        <textarea class="form-control" name="detalle" readonly>{{$contrato->detalle}}</textarea>
                    </div>

                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Clausula del Contrato</label>
                    <input type="text" class="form-control" name="clausulaDelEvento" value="{{$contrato->clausulaDelEvento}}" readonly>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Politica de Cancelacion</label>
                    <input type="text" class="form-control" name="politicaCancelacion" value="{{$contrato->politicaCancelacion}}" readonly>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Plazo de Entrega</label>
                    <input type="text" class="form-control" name="plazoDeEntrega" value="{{$contrato->plazoDeEntrega}}" readonly>
                </div>

                <div class="form-row center">
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold">Fotografo</label>
                        <input type="text" class="form-control" name="fotografo_id" value="{{$contrato->fotografo()->user()->name}}" readonly>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="font-weight-bold">Tipo de Pago</label>
                        <input type="text" class="form-control" name="tipopago_id" value="{{$contrato->tipoDePago()->tipodepago}}" readonly>
                    </div>

                </div>

                <div class="form-row">
                    <input type="hidden" class="form-control" name="organizador_id" value="{{auth()->user()->id}}" readonly>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label class="font-weight-bold">Clientes</label>
                        <select name="seleU[]" class="custom-select form-group" multiple readonly>
                            @foreach ($clientes as $cliente)
                               <option>{{$cliente->user()->name}}</option>
                            @endforeach    
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label class="font-weight-bold">Estado</label>
                        <input type="text" class="form-control" name="estado_id" value="{{$contrato->estado()->name}}" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <input type="hidden" class="form-control" id="url" value="{{route('eventos.imageneventos',$contrato->evento()->id)}}" readonly>
                </div>

                @if (Auth()->user()->tipoCuenta == 2) 
                    <button type="submit" class="btn btn-primary">Avanzar Contrato</button>
                @endif
                    {{-- <button type="submit" class="btn btn-primary">Enviar Contrato</button> --}}
                <a href="{{route('contratos.index')}}" class="btn btn-danger">volver</a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
                    subir foto
                </button>
                
            </form>
    </div>
</div>


</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    const image = document.getElementById("myQr")
    /* Mandar la ruta del evento con el id del evento en específico */
    //const url = 'http://127.0.0.1:8000/eventos/especifico/1'
    const url = document.getElementById("url").value;
    console.log(url);
    const QR = new QRCode(image)
    QR.makeCode(url)
</script>

</html>