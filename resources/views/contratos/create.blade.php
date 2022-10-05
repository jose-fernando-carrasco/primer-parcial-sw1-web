<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contratar Fotografo</title>
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
    <div class="container">
       <div class="abs-center">
            <form class="border p-3 form" action="{{route('contratos.store')}}" method="POST">
                @csrf
                <div class="form-group col-12">
                    <label class="h2">Contrato</label>
                </div>

                <div class="form-row center">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Evento</label>
                        <select name="evento_id" class="form-control">
                            @foreach ($Eventos as $Evento)
                               <option  value="{{$Evento->id}}" selected>{{$Evento->titulo}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row center">
                    
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold">Detalle del Contrato</label>
                        <textarea class="form-control" name="detalle">{{old('detalle')}}</textarea>
                        @error('detalle')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Clausula del Contrato</label>
                    <input type="text" class="form-control" name="clausulaDelEvento" value="{{old('clausulaDelEvento')}}">
                    @error('clausulaDelEvento')
                            <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Politica de Cancelacion</label>
                    <input type="text" class="form-control" name="politicaCancelacion" value="{{old('politicaCancelacion')}}">
                    @error('politicaCancelacion')
                            <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Plazo de Entrega</label>
                    <input type="text" class="form-control" name="plazoDeEntrega" value="{{old('plazoDeEntrega')}}">
                    @error('plazoDeEntrega')
                            <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-row center">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Fotografo</label>
                        <select name="fotografo_id" class="form-control">
                            @foreach ($Fotografos as $Fotografo)
                               <option  value="{{$Fotografo->id}}" selected>{{$Fotografo->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold">Tipo de Pago</label>
                        <select name="tipopago_id" class="form-control">
                            @foreach ($TiposPagos as $TiposPago)
                               <option  value="{{$TiposPago->id}}" selected>{{$TiposPago->tipodepago}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label class="font-weight-bold">Organizador</label>
                        <input type="text" class="form-control" name="nombreOrganizador" value="{{auth()->user()->name}}" readonly>
                        <input type="hidden" class="form-control" name="organizador_id" value="{{auth()->user()->id}}" readonly>
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-primary">Crear Evento</button>
                <a href="{{route('home')}}" class="btn btn-danger">Salir</a>
            </form>
    </div>
</div>


</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('info') == 'ok') 
        <script>
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Contrato Enviado',
            showConfirmButton: false,
            timer: 1500
            })
        </script>
    @endif
</html>