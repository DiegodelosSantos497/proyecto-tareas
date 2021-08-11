<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once './includes/head.php'; ?>
    <title>Agenda | Lista de Usuários</title>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Archivo del navbar y del aside -->
        <?php require_once './includes/menu.php'; ?>
        <!-- /Archivo del navbar y del aside -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Usuários</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./inicio.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Usuários</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            require_once './clases/Usuarios.php';
            $obj = new Usuarios;
            $usuarios = $obj->listarUsuarios();
            ?>
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="./usuarios_form.php" class="btn btn-outline-info btn-block"><i class="fas fa-plus"></i> &nbsp; Nuevo Usuário</a>
                                </div>
                                <div class="card-body">
                                    <table id="tablas" class="table table-bordered table-striped table-hover text-center tablas" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre Completo</th>
                                                <th>Correo Electrónico</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($usuarios as $usuario) { ?>
                                                <tr>
                                                    <td><?= $usuario['id_usuario'] ?></td>
                                                    <td><?= $usuario['nombre'] ?></td>
                                                    <td><?= $usuario['correo'] ?></td>
                                                    <td>
                                                        <a href="./usuarios_form.php?id=<?= $usuario['id_usuario'] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="./procesos/usuarios.php?id=<?= $usuario['id_usuario'] ?>&accion=eliminar" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <?php if (isset($_SESSION['mensaje'])) {
                                                    echo $_SESSION['mensaje'];
                                                    unset($_SESSION['mensaje']);
                                                }
                                                ?>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Archivo de los scripts js -->
        <?php require_once './includes/footer.php'; ?>
        <!-- /Archivo de los scripts js -->
</body>

</html>