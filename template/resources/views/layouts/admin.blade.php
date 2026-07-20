<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>OAL Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        .select2-container .select2-selection--single { height: 38px !important; border: 1px solid #d1d3e2 !important; }
        .select2-container--default .select2-selection--single .select2-selection__rendered { line-height: 38px !important; }
        .select2-container--default .select2-selection--single .select2-selection__arrow { height: 36px !important; }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                <div class="sidebar-brand-text mx-3">OAL Admin</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active"><a class="nav-link" href="/"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Modules</div>
<li class="nav-item"><a class="nav-link" href="/"><i class="fas fa-fw fa-link"></i><span>Dashboard</span></a></li>
<li class="nav-item"><a class="nav-link" href="/books"><i class="fas fa-fw fa-link"></i><span>Books</span></a></li>
<li class="nav-item"><a class="nav-link" href="/books/{id}"><i class="fas fa-fw fa-link"></i><span>Books/{id}</span></a></li>
<li class="nav-item"><a class="nav-link" href="/categories"><i class="fas fa-fw fa-link"></i><span>Categories</span></a></li>
<li class="nav-item"><a class="nav-link" href="/categories/{id}"><i class="fas fa-fw fa-link"></i><span>Categories/{id}</span></a></li>
<li class="nav-item"><a class="nav-link" href="/publishers"><i class="fas fa-fw fa-link"></i><span>Publishers</span></a></li>
<li class="nav-item"><a class="nav-link" href="/publishers/{id}"><i class="fas fa-fw fa-link"></i><span>Publishers/{id}</span></a></li>
<li class="nav-item"><a class="nav-link" href="/authors"><i class="fas fa-fw fa-link"></i><span>Authors</span></a></li>
<li class="nav-item"><a class="nav-link" href="/authors/{id}"><i class="fas fa-fw fa-link"></i><span>Authors/{id}</span></a></li>
<li class="nav-item"><a class="nav-link" href="/members"><i class="fas fa-fw fa-link"></i><span>Members</span></a></li>
<li class="nav-item"><a class="nav-link" href="/members/{id}"><i class="fas fa-fw fa-link"></i><span>Members/{id}</span></a></li>
<li class="nav-item"><a class="nav-link" href="/reservations"><i class="fas fa-fw fa-link"></i><span>Reservations</span></a></li>
<li class="nav-item"><a class="nav-link" href="/reservations/{id}"><i class="fas fa-fw fa-link"></i><span>Reservations/{id}</span></a></li>
<li class="nav-item"><a class="nav-link" href="/fines"><i class="fas fa-fw fa-link"></i><span>Fines</span></a></li>
<li class="nav-item"><a class="nav-link" href="/fines/{id}"><i class="fas fa-fw fa-link"></i><span>Fines/{id}</span></a></li>

        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#"><span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span></a>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">@yield('content')</div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto"><div class="copyright text-center my-auto"><span>Copyright &copy; OAL Compiler 2024</span></div></div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/js/sb-admin-2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    </script>
</body>
</html>