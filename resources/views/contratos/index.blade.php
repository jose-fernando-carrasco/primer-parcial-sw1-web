<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Contratos</title>
    {{-- bootstrapp 4 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">
   
</head>

<style>
    .abs-center {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;/* alto */
        
    }

    .absX {
        width: 1050px;
    }
    
</style>

<body>
     <h1>Index Contratos</h1>
    

    <div class="card abs-center">
        <div class="card_body absX">


    <table id="Contratos" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Evento</th>
                <th>Fotografo</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contratos as $contrato)              
                <tr>
                    <td>{{$contrato->evento()->titulo}}</td>
                    <td>{{$contrato->fotografo()->user()->name}}</td>
                    <td>{{$contrato->estado()->name}}</td>
                    <td>
                        <a href="{{route('contratos.show',$contrato->id)}}" class="btn btn-success btn-sm">ver</a>
                        <a href="" class="btn btn-warning btn-sm">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Evento</th>
                <th>Fotografo</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </tfoot>
    </table>

</div>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('#Contratos').DataTable({
        responsive: true
    });
</script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>

{{-- Bootstrapp4 --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
 --}}
</html>