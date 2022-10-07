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
    <h1>Ver Contrato Especifico</h1>
    <div class="container">
       <div class="abs-center">
            <form class="border p-3 form" action="{{route('contratos.update',$contrato)}}" method="POST">
                @csrf
                @method('put')

                <div class="form-group col-12">
                    <label class="h2">Contrato</label>
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

                @if (Auth()->user()->tipoCuenta == 2) 
                    <button type="submit" class="btn btn-primary">Avanzar Contrato</button>
                @endif
                    {{-- <button type="submit" class="btn btn-primary">Enviar Contrato</button> --}}
                <a href="{{route('contratos.index')}}" class="btn btn-danger">Salir</a>
            
            </form>
    </div>
</div>


</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>