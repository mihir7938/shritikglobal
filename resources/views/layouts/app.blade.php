<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shritik Global</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('img/favicon.ico')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('adminlte/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/ekko-lightbox.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/toastr.min.css')}}">
	@yield('header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="loader">
        <div class="loader-inner">
            <img src="{{asset('img/loading.gif')}}" alt="" style="width: 100%;">
        </div>
    </div>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto align-items-center">
                @if(Auth::check())
                    <li class="nav-item mr-3">
                        Welcome {{Auth::user()->name}},
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{route('logout')}}">
                            Logout
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{route('login')}}" class="brand-link">
              <img src="{{asset('img/logo.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
              <span class="brand-text font-weight-light">Shritik Global</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        @if(Auth::check() && (Auth::user()->isAssociate()))
                            <li class="nav-item">
                                <a href="{{route('admin.index')}}" class="nav-link {{(Route::currentRouteName() == 'admin.index') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        @elseif(Auth::check() && Auth::user()->isTelecaller())
                            <li class="nav-item">
                                <a href="{{route('telecallers.index')}}" class="nav-link {{(Route::currentRouteName() == 'telecallers.index') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('telecallers.calls')}}" class="nav-link {{(Route::currentRouteName() == 'telecallers.calls') || (Route::currentRouteName() == 'telecallers.calls.edit') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-phone-alt"></i>
                                    <p>All Calls</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('telecallers.calls.add')}}" class="nav-link {{(Route::currentRouteName() == 'telecallers.calls.add') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New Call</p>
                                </a>
                            </li>
                        @elseif(Auth::check() && Auth::user()->isCordinator())
                            <li class="nav-item">
                                <a href="{{route('cordinators.index')}}" class="nav-link {{(Route::currentRouteName() == 'cordinators.index') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('cordinators.customers')}}" class="nav-link {{(Route::currentRouteName() == 'cordinators.customers') || (Route::currentRouteName() == 'cordinators.customers.edit') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>All Customers</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('cordinators.customers.add')}}" class="nav-link {{(Route::currentRouteName() == 'cordinators.customers.add') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New Customer</p>
                                </a>
                            </li>
                        @elseif(Auth::check() && Auth::user()->isAdmin())
                            <li class="nav-item">
                                <a href="{{route('admin.index')}}" class="nav-link {{(Route::currentRouteName() == 'admin.index') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item {{(Route::currentRouteName() == 'admin.products') || (Route::currentRouteName() == 'admin.products.add') || (Route::currentRouteName() == 'admin.products.edit') || (Route::currentRouteName() == 'admin.subproducts') || (Route::currentRouteName() == 'admin.subproducts.add') || (Route::currentRouteName() == 'admin.subproducts.edit') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{(Route::currentRouteName() == 'admin.products') || (Route::currentRouteName() == 'admin.products.add') || (Route::currentRouteName() == 'admin.products.edit') || (Route::currentRouteName() == 'admin.subproducts') || (Route::currentRouteName() == 'admin.subproducts.add') || (Route::currentRouteName() == 'admin.subproducts.editsubproducts') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-layer-group"></i>
                                    <p>Masters<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('admin.products')}}" class="nav-link {{(Route::currentRouteName() == 'admin.products') || (Route::currentRouteName() == 'admin.products.add') || (Route::currentRouteName() == 'admin.products.edit') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Products</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.subproducts')}}" class="nav-link {{(Route::currentRouteName() == 'admin.subproducts') || (Route::currentRouteName() == 'admin.subproducts.add') || (Route::currentRouteName() == 'admin.subproducts.edit') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Sub Products</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{(Route::currentRouteName() == 'admin.customers') || (Route::currentRouteName() == 'admin.customers.add') || (Route::currentRouteName() == 'admin.customers.edit') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{(Route::currentRouteName() == 'admin.customers') || (Route::currentRouteName() == 'admin.customers.add') || (Route::currentRouteName() == 'admin.customers.edit') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-rupee-sign"></i>
                                    <p>Customers<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('admin.customers')}}" class="nav-link {{(Route::currentRouteName() == 'admin.customers') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Customers</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.customers.add')}}" class="nav-link {{(Route::currentRouteName() == 'admin.customers.add') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add New Customer</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{(Route::currentRouteName() == 'admin.users') || (Route::currentRouteName() == 'admin.users.add') || (Route::currentRouteName() == 'admin.users.edit') || (Route::currentRouteName() == 'users.change') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{(Route::currentRouteName() == 'admin.users') || (Route::currentRouteName() == 'admin.users.add') || (Route::currentRouteName() == 'admin.users.edit') || (Route::currentRouteName() == 'users.change') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>Users<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('admin.users')}}" class="nav-link {{(Route::currentRouteName() == 'admin.users') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Users</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.users.add')}}" class="nav-link {{(Route::currentRouteName() == 'admin.users.add') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add New User</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{(Route::currentRouteName() == 'admin.calls') || (Route::currentRouteName() == 'admin.calls.add') || (Route::currentRouteName() == 'admin.calls.edit') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{(Route::currentRouteName() == 'admin.calls') || (Route::currentRouteName() == 'admin.calls.add') || (Route::currentRouteName() == 'admin.calls.edit') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-phone-alt"></i>
                                    <p>Telecaller<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('admin.calls')}}" class="nav-link {{(Route::currentRouteName() == 'admin.calls') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Calls</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.calls.add')}}" class="nav-link {{(Route::currentRouteName() == 'admin.calls.add') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add New Call</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{(Route::currentRouteName() == 'admin.newcall') || (Route::currentRouteName() == 'admin.followup') || (Route::currentRouteName() == 'admin.filestatus') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{(Route::currentRouteName() == 'admin.newcall') || (Route::currentRouteName() == 'admin.followup') || (Route::currentRouteName() == 'admin.filestatus') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-times"></i>
                                    <p>Old Data Telecaller<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('admin.newcall')}}" class="nav-link {{(Route::currentRouteName() == 'admin.newcall') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>New Calls</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.followup')}}" class="nav-link {{(Route::currentRouteName() == 'admin.followup') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Follow Up Details</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.filestatus')}}" class="nav-link {{(Route::currentRouteName() == 'admin.filestatus') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>File Status</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            @yield('content')
        </div>
        <footer class="main-footer">
            Copyright &copy; 2026 Shritik Global. All rights reserved.
        </footer>
    </div>
    <script src="{{asset('adminlte/js/jquery.min.js')}}"></script>
    <script src="{{asset('adminlte/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('adminlte/js/select2.full.min.js')}}"></script>
    <script src="{{asset('adminlte/js/bs-custom-file-input.min.js')}}"></script>
    <script src="{{asset('adminlte/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('adminlte/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('adminlte/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('adminlte/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte/js/jszip.min.js')}}"></script>
    <script src="{{asset('adminlte/js/buttons.html5.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js"></script>
    <script src="{{asset('js/validation-additional.js')}}"></script>
    <script src="{{asset('adminlte/js/moment.min.js')}}"></script>
    <script src="{{asset('adminlte/js/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('adminlte/js/daterangepicker.js')}}"></script>
    <script src="{{asset('adminlte/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('adminlte/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('adminlte/js/adminlte.js')}}"></script>
    <script src="{{asset('adminlte/js/ekko-lightbox.min.js')}}"></script>
    <script src="{{asset('adminlte/js/toastr.min.js')}}"></script>
     <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    @yield('footer')
</body>
</html>