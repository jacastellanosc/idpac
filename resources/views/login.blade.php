<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>IDPAC</title>
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg bg-primary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-light" href="#page-top">IDPAC - TEST</a>
        </div>
    </nav>
    <div class="clearfix"></div>
    <section style="margin-top: 210px; margin-bottom: 160px;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="{{route('authenticate')}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">Usuario:</label>
                                        <input type="text" name="username" required id="username" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Contraseña:</label>
                                        <input type="password" name="password" required id="password" class="form-control" />
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="#" data-toggle="modal" data-target="#exampleModal"><small>Registrarme</small></a>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <a href="#" data-toggle="modal" data-target="#exampleModal2"><small>Recuperar contraseña</small></a>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-primary">
                                        Iniciar sesión
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="copyright bg-secondary py-4 text-center text-white">
        <div class="container"><small>por <strong>Jimmy Castellanos</strong></small></div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form class="modal-dialog" method="post" action="{{route('register')}}">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light" id="exampleModalLabel">Formulario de registro</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Para registrarse debe ingresar los siguientes datos:</p>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label">Usuario</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="correo@dominio.com" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="*********" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Registrarme</button>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <form class="modal-dialog" method="post" action="{{route('register')}}">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-light" id="exampleModal2Label">Formulario de registro</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Para recuperar su contraseña ingrese su usuario:</p>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label">Usuario</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="correo@dominio.com" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Recuperar clave</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script>
        jQuery(function() {
            if(window.location.hash == '#error') {
                bootbox.alert('El usuario ya se encuentra registrado');
            }
            if(window.location.hash == '#success') {
                bootbox.alert('Usuario registrado!!!');
            }
            if(window.location.hash == '#error-login') {
                bootbox.alert('Por favor verifique que los datos ingresados sean correctos.');
            }
        });
    </script>
</body>

</html>
