<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Empleados - IDPAC</title>
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg bg-primary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-light" href="#page-top">IDPAC - TEST</a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 text-light rounded" href="/companies">Empresas</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 text-light rounded" href="/employees">Empleados</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 text-light rounded" href="/logout">Salir</a></li>
                    </ul>
                </div>
        </div>
    </nav>
    <div class="clearfix"></div>
    <section style="margin-top: 160px; margin-bottom: 100px;">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                Empleados
                            </div>
                            <div class="col-md-4 text-right">
                                <small>Registros ({{$employees->count()}})</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="search" class="form-control" name="filter_name" placeholder="Buscar..." value="{{$filter_name}}" />
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="filter_company">
                                        <option value="">- Todas las empresas -</option>
                                        @foreach ($companies as $com)
                                            <option value="{{$com->id}}" {{$filter_company == $com->id ? 'selected' : ''}}>{{$com->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 text-right">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-search"></i> Buscar
                                    </button>
                                    <a href="employees/edit/0" type="button" class="btn btn-info">
                                        <i class="fa fa-plus"></i> Nuevo
                                    </a>
                                </div>
                            </div>
                        </form>
                        <hr />
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Empresa</th>
                                    <th>Correo</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $emp)
                                <tr>
                                    <td>{{$emp->name}}</td>
                                    <td>{{$emp->lastname}}</td>
                                    <td>{{$emp->company->name}}</td>
                                    <td>{{$emp->email}}</td>
                                    <td class="text-center">{{$emp->cellphone}}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="employees/edit/{{$emp->id}}" title="Editar" class="btn btn-xs btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="employees/delete/{{$emp->id}}" title="Borrar" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="copyright bg-secondary py-4 text-center text-white">
        <div class="container"><small>por <strong>Jimmy Castellanos</strong></small></div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
</body>

</html>
