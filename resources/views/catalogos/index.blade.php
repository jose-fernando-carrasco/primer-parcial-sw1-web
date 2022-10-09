<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Catalogos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<style>
    .card-img-top{
        height: 300px;
        width: 300px;
    }
</style>
<body>
    <h1>Index Catalogos</h1>
    @if (session('info'))
        <div  class="mensaje-sesion">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
        Crear Catalogo
    </button>

    {{-- <a href="{{route('catalogos.create')}}">Mostrar</a> --}}
  
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Creando Catalogo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('catalogos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nombre del Catalogo</label>
                        <input type="text" class="form-control" name="titulo">
                        @error('titulo')
                            <small class="text-danger">{{$message}}</small>
                        @enderror{{--  despuer ver com quedarse en el modal paa ver el error --}}
                    </div>

                    <div class="form-group">
                        <label>Descripcion</label>
                        <input type="text" class="form-control" name="descripcion">
                    </div>

                    <div class="form-group">
                        <input name="file" type="file" accept="image/*">
                    </div>

                    <div class="form-group">{{-- solo Los fotografos pueden crear catalogos --}}
                        <input type="hidden" class="form-control" name="fotografo_id" value="{{auth()->user()->fotografo()->id}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </form>
        </div>
        </div>
    </div>


    {{-- <section>
        @foreach ($catalogos as $catalogo)
            <div class="card" style="width: 20rem;">
                <img src="{{$catalogo->url}}" class="card-img-top img-fluid" alt="">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
        
    </section> --}}




    @foreach ($catalogos as $catalogo)
    <div class="row row-cols-1 row-cols-md-2">
            <div class="col mb-4">
                <div class="card h-20">
                    <img src="{{$catalogo->url}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
      </div>

      @endforeach

</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>