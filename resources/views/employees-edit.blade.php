<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Empresas - IDPAC</title>
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
                <form action="{{route('save-employee')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{(int) @$employee->id}}" />
                    <div class="card">
                        <div class="card-header">
                            @if (!empty($employee))
                            Editar empleado # {{@$employee->id}}
                            @else
                            Nuevo empleado
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nombres</label>
                                        <input type="text" name="name" required id="name" class="form-control" value="{{ @$employee->name }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Apellidos</label>
                                        <input type="text" name="lastname" required id="lastname" class="form-control" value="{{ @$employee->lastname }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">Empresa</label>
                                        <select class="form-control" name="company_id" required>
                                            <option value="">- Seleccionar -</option>
                                            @foreach ($companies as $com)
                                                <option value="{{$com->id}}" {{@$employee->company_id == $com->id ? 'selected' : ''}}>{{$com->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Correo</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ @$employee->email }}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Teléfono</label>
                                        <input type="tel" name="cellphone" id="cellphone" class="form-control" value="{{ @$employee->cellphone }}" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Guardar
                            </button>
                            <a href="{{route('employees')}}" type="button" class="btn btn-dark">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </form>
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
