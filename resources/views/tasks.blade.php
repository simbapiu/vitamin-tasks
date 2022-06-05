<?php
    
?>
<!DOCTYPE html>
<html class="h-100" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script type="text/javascript" src="{{ asset('/js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/sb-admin-2.min.js') }}"></script>
    <script src="https:////cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/34b33e3f11.js" crossorigin="anonymous"></script>

    <title>Lista de tareas</title>
</head>

<body class="d-flex flex-column h-100">
    <header>
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light shadow p-3 mb-5 bg-body">
            <div class="container-fluid">
                <a class="navbar-brand">Listado</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Tareas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="flex-shrink-0">
        <div class="container">
            <div class="row">
                @if($message = Session::get('Listo'))
                    <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
                        <span>{{ $message }}</span>
                    </div>
                @endif
            </div>
            <!-- Modal -->
            @include('partials/add_task_modal')
            @include('partials/edit_task_modal')
            @include('partials/delete_task_modal')
            <div class="mt-5 d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0">Lista de tareas</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-xl btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalAgregar">
                    <i class="fas fa-book fa-sm text-white-50"></i> Crear tarea
                </a>
            </div>
            <p class="lead">Se lista acontinuación las tareas realizadas y por realizar.</p>
            <br>
            @include('partials/tasks_table')
        </div>
    </main>
    <!-- End of Main Content -->
    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container my-auto">
            <div class="copyright text-center my-auto text-white">
                <span>Copyright &copy; 2022</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
    <script>
        var table = $('#dataTable').DataTable({
            language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_",
            "infoEmpty": "Mostrando 0 to 0 of 0",
            "infoFiltered": "(Filtrado de _MAX_ total)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
            }
        });
    </script>
</body>

</html>