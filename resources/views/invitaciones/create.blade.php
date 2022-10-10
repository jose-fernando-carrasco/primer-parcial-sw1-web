<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Invitaciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<style>

    .tamanito img{
        height: 130px;
        width: 150px;
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
    <div class="container">
        <div class="abs-center">
            <form class="border p-3 form" action="{{route('invitaciones.store')}}" method="POST">
                @csrf
                <div class="form-group col-12 d-flex justify-content-center">
                    <label class="h2 text-primary">CREANDO INVITACION</label>
                </div>

                {{-- QR --}}
                <div id="myQr" class="tamanito mb-4 d-flex justify-content-center">
          
                </div>

                <div class="form-row center">
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold">Evento</label>
                        <input type="text" class="form-control" name="evento_titulo" value="{{$Evento->titulo}}" readonly>
                        <input type="hidden" class="form-control" name="evento_id" value="{{$Evento->id}}" readonly>
                    </div>
                </div>

                <div class="form-row center">
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold">Lugar</label>
                        <input type="text" class="form-control" name="evento_lugar" value="{{$Evento->ubicacion}}" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold">Seleccionar a los Clientes que quiere invitar</label>
                        <select name="seleU[]" class="custom-select form-group" multiple>
                            @foreach ($clientes as $cliente)
                               <option  value="{{$cliente->id}}">{{$cliente->user()->name}}</option>
                            @endforeach    
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <input type="hidden" class="form-control" name="organizador_id" value="{{auth()->user()->id}}" readonly>
                </div>

                <div class="form-row">
                    <input type="hidden" class="form-control" id="url" value="{{route('eventos.especifico',$Evento->id)}}" readonly>
                </div>

                <button type="submit" class="btn btn-primary">Enviar Invitacion</button>
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
            title: 'Invitacion Enviado',
            showConfirmButton: false,
            timer: 1500
            })
        </script>
    @endif


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