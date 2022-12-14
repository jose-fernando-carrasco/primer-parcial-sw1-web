<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Usuarios</title>
    {{-- bootstrapp 4 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">
   
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

</head>

<style>

    .tamImagen{
        height: 350px;
        width: 200px;
    }
    body{margin-top:20px;
        background:#eee;
    }
    .single_advisor_profile {
        position: relative;
        margin-bottom: 50px;
        -webkit-transition-duration: 500ms;
        transition-duration: 500ms;
        z-index: 1;
        border-radius: 15px;
        -webkit-box-shadow: 0 0.25rem 1rem 0 rgba(47, 91, 234, 0.125);
        box-shadow: 0 0.25rem 1rem 0 rgba(47, 91, 234, 0.125);
    }
    .single_advisor_profile .advisor_thumb {
        position: relative;
        z-index: 1;
        border-radius: 15px 15px 0 0;
        margin: 0 auto;
        padding: 30px 30px 0 30px;
        background-color: #3f43fd;
        overflow: hidden;
    }
    .single_advisor_profile .advisor_thumb::after {
        -webkit-transition-duration: 500ms;
        transition-duration: 500ms;
        position: absolute;
        width: 150%;
        height: 80px;
        bottom: -45px;
        left: -25%;
        content: "";
        background-color: #ffffff;
        -webkit-transform: rotate(-15deg);
        transform: rotate(-15deg);
    }
    @media only screen and (max-width: 575px) {
        .single_advisor_profile .advisor_thumb::after {
            height: 160px;
            bottom: -90px;
        }
    }
    .single_advisor_profile .advisor_thumb .social-info {
        position: absolute;
        z-index: 1;
        width: 100%;
        bottom: 0;
        right: 30px;
        text-align: right;
    }
    .single_advisor_profile .advisor_thumb .social-info a {
        font-size: 14px;
        color: #020710;
        padding: 0 5px;
    }
    .single_advisor_profile .advisor_thumb .social-info a:hover,
    .single_advisor_profile .advisor_thumb .social-info a:focus {
        color: #3f43fd;
    }
    .single_advisor_profile .advisor_thumb .social-info a:last-child {
        padding-right: 0;
    }
    .single_advisor_profile .single_advisor_details_info {
        position: relative;
        z-index: 1;
        padding: 30px;
        text-align: right;
        -webkit-transition-duration: 500ms;
        transition-duration: 500ms;
        border-radius: 0 0 15px 15px;
        background-color: #ffffff;
    }
    .single_advisor_profile .single_advisor_details_info::after {
        -webkit-transition-duration: 500ms;
        transition-duration: 500ms;
        position: absolute;
        z-index: 1;
        width: 50px;
        height: 3px;
        background-color: #3f43fd;
        content: "";
        top: 12px;
        right: 30px;
    }
    .single_advisor_profile .single_advisor_details_info h6 {
        margin-bottom: 0.25rem;
        -webkit-transition-duration: 500ms;
        transition-duration: 500ms;
    }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .single_advisor_profile .single_advisor_details_info h6 {
            font-size: 14px;
        }
    }
    .single_advisor_profile .single_advisor_details_info p {
        -webkit-transition-duration: 500ms;
        transition-duration: 500ms;
        margin-bottom: 0;
        font-size: 14px;
    }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .single_advisor_profile .single_advisor_details_info p {
            font-size: 12px;
        }
    }
    .single_advisor_profile:hover .advisor_thumb::after,
    .single_advisor_profile:focus .advisor_thumb::after {
        background-color: #070a57;
    }
    .single_advisor_profile:hover .advisor_thumb .social-info a,
    .single_advisor_profile:focus .advisor_thumb .social-info a {
        color: #ffffff;
    }
    .single_advisor_profile:hover .advisor_thumb .social-info a:hover,
    .single_advisor_profile:hover .advisor_thumb .social-info a:focus,
    .single_advisor_profile:focus .advisor_thumb .social-info a:hover,
    .single_advisor_profile:focus .advisor_thumb .social-info a:focus {
        color: #ffffff;
    }
    .single_advisor_profile:hover .single_advisor_details_info,
    .single_advisor_profile:focus .single_advisor_details_info {
        background-color: #070a57;
    }
    .single_advisor_profile:hover .single_advisor_details_info::after,
    .single_advisor_profile:focus .single_advisor_details_info::after {
        background-color: #ffffff;
    }
    .single_advisor_profile:hover .single_advisor_details_info h6,
    .single_advisor_profile:focus .single_advisor_details_info h6 {
        color: #ffffff;
    }
    .single_advisor_profile:hover .single_advisor_details_info p,
    .single_advisor_profile:focus .single_advisor_details_info p {
        color: #ffffff;
    } 
</style>

<body>

    <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-sm-8 col-lg-6">
                <!-- Section Heading-->
                <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                  <h1>Administrando Usuarios</h1>
                  <p>Fotomania es un software confiable, Estos son todos los usuarios de su sistema</p>
                  <div class="line"></div>
                </div>
              </div>
            </div>

            <a href="{{route('home')}}" class="btn btn-danger mb-4">Salir</a>
            <div class="row">
                
                @foreach ($users as $user)
                    <!-- Single Advisor-->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <!-- Team Thumb-->
                            <div class="advisor_thumb">
                                @if ($user->TengoImagenP())
                                   <img src="{{$user->Imagenperfil1()->url}}" alt="" class="tamImagen">
                                @else
                                   <img src="https://mycontenedor23.s3.amazonaws.com/Perfiles/Sin-Perfil/sin-foto.png" alt="" class="tamImagen"> 
                                @endif
                                
                                <!-- Social Info-->
                                <div class="social-info"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
                            </div>
                            <!-- Team Details-->
                            <div class="single_advisor_details_info">
                                <h4 class="d-flex justify-content-center">{{$user->name}}</h4>
                                <h5 class="designation d-flex justify-content-center">{{$user->getRol()}}</h5>
                                <form action="{{route('users.eliminar', $user->id)}}" method="POST" class="btn btn-danger mt-4 d-flex justify-content-center">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                                {{-- <a href="" class="btn btn-danger mt-4 d-flex justify-content-center">eliminar</a> --}}
                                <a href="{{route('users.show',$user->id)}}" class="btn btn-primary mt-4 d-flex justify-content-center">ver</a>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
            </div>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

</html>