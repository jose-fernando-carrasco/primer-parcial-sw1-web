<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SHow Eventos</title>
</head>

<style>
    .tamanito img{
        height: 30px;
        width: 40px;
    }
</style>

<body>
    {{-- Vista de un Evento en especifico --}}
    <div id="myQr" class="tamanito">
          
    </div>

    <button  id="mibtn">Generar QR</button>

    <form action="{{route('eventos.storeQR')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label>Nombre del QR</label>
                <input type="text" class="form-control" name="titulo">
            </div>

            <div class="form-group">
                <input name="file" type="file" id="inputS3" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Crear</button>
    </form>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    // Generar CodeQR
    const image = document.getElementById("myQr")
    /* Mandar la ruta del evento con el id del evento en específico */
    const url = 'http://127.0.0.1:8000/' /* window.location.href */
    console.log(url);
    const QR = new QRCode(image)
    QR.makeCode(url)

    const des = document.getElementById("mibtn")
    des.addEventListener('click',() => {
        const enlace = document.createElement('a')
        enlace.href = image.querySelector('img').src
        //console.log(enlace.href);
         document.getElementById("inputS3").value = enlace.href;
        //imagen.value = enlace.href;
        console.log(imagen.val);

        /* enlace.download = 'cadenita';
        enlace.click(); */
        
    })
</script>
</html>