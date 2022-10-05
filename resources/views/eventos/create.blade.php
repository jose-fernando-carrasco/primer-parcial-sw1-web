<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Evento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<style>
    .abs-center {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 80vh;/* alto */
    }

    .form {
        width: 750px;/* ancho */
    }
</style>

<body>
    <h1>Crear Evento..</h1>
    <div class="container">
       <div class="abs-center">
            <form class="border p-3 form" action="{{route('eventos.store')}}" method="POST">
                @csrf
                <div class="form-row center">
                    <div class="form-group col-md-6">
                        <label>Titulo del Evento</label>
                        <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}">
                        @error('titulo')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    {{-- <label for="validationServer01">First name</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" value="Mark" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div> --}}

                    <div class="form-group col-md-6">
                        <label>Tipo de Evento</label>
                        <select name="tipoevento_id" class="form-control">
                            @foreach ($tiposEventos as $tipoEvento)
                               <option  value="{{$tipoEvento->id}}" selected>{{$tipoEvento->tipodeevento}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ubicacion</label>
                    <input type="text" class="form-control" name="ubicacion" value="{{old('ubicacion')}}">
                    @error('ubicacion')
                            <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Detalle</label>
                    <textarea class="form-control" name="detalle">{{old('detalle')}}</textarea>
                    @error('detalle')
                            <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Capacidad</label>
                        <input type="text" class="form-control" name="cantpersonas" value="{{old('cantpersonas')}}">
                        @error('cantpersonas')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label>Organizador</label>
                        <input type="text" class="form-control" name="nombreOrganizador" value="{{auth()->user()->name}}" readonly>
                        <input type="hidden" class="form-control" name="organizador_id" value="{{auth()->user()->id}}" readonly>
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-primary">Crear Evento</button>
            </form>
    </div>
</div>


</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</html>