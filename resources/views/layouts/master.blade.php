<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reviewwa admin</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="main" class="nav-link">Home</a>
            </li>

        </ul>


        <!-- Right navbar links -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../" class="brand-link">
            <span class="brand-text font-weight-light">Reviewwa</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img class="rounded-circle" src="{{(auth()->user()->avatars->first() != null) ?
                    '/' . auth()->user()->avatars->first()->avatar_small : 'http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg'}}" alt="user img">
                </div>
                <div class="info">
                    <p class="d-block text-white">{{ Auth::user()->name }}</p>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="/admin/users" class="nav-link">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>
                                Пользователи
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/reviews" class="nav-link">
                            <i class="nav-icon fas fa-bookmark"></i>
                            <p>
                                Обзоры
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/addUser" class="nav-link">
                            <i class="nav-icon fas fa-user-plus"></i>
                            <p>
                                Создать пользователя
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/addGenre" class="nav-link">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>
                                Добавить жанр
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/removeGenre" class="nav-link">
                            <i class="nav-icon fas fa-minus-circle"></i>
                            <p>
                                Удалить жанр
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Starter Page</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="info-box">
                            <a href="{{ route('admin.users') }}" class="info-box-icon bg-info"><i class="far fa-user"></i></a>

                            <div class="info-box-content">
                                <span class="info-box-text">Пользователи</span>
                                <span class="info-box-number">{{ $counts['Users'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="info-box">
                            <a href="{{ route('admin.reviews') }}" class="info-box-icon bg-success"><i class="far far fa-bookmark"></i></a>
                            <div class="info-box-content">
                                <span class="info-box-text">Обзоры</span>
                                <span class="info-box-number">{{ $counts['reviews'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @yield('table')
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
