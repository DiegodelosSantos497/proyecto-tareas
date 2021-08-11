<?php

session_start();
if(!isset($_SESSION['usuario'])){
    header("location:../index.php");
}



?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="http://localhost/proyecto/src/inicio.php" class="nav-link">Inicio</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Buscar..." aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./salir.php" onclick="return confirm('Estás seguro de querer cerrar sesión?')">
                <i class="fas fa-power-off"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="../public/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Agenda</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../public/img/logo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['usuario']['nombre'] ?></a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="./inicio.php" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Inicio
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Tareas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./tareas_lista.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado de Tareas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tareas_form.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nueva Tarea</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Usuários
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./usuarios_lista.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado de Usuários</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="usuarios_form.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nuevo Usuário</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>