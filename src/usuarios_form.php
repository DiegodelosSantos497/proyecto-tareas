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
            $usuario = $obj->obtenerid_usuarios($_GET['id']);
            if ($usuario) {
                $usuario = $obj->obtenerid_usuarios($_GET['id']);
            } else {
                $usuario = null;
            }

            ?>


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <h4 class="card-header bg-info text-center">
                                    <?= is_null($usuario) ? "REGISTRAR NUEVO USUÁRIO" : "ACTUALIZAR USUÁRIO" ?>
                                </h4>
                                <form action="./procesos/usuarios.php" method="POST">
                                    <div class="card-body">
                                        <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $usuario['id_usuario'] ?>">
                                        <div class="form-group">
                                            <label for="nombre">Nombre Completo</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $usuario['nombre'] ?>" placeholder="Ingrese el nombre completo">
                                        </div>
                                        <div class="form-group">
                                            <label for="correo">Correo Electrónico</label>
                                            <input type="email" class="form-control" name="correo" id="correo" value="<?= $usuario['correo'] ?>" placeholder="Ingrese el correo electrónico">
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label for="contrasena">Contraseña</label>
                                                <input type="password" class="form-control" name="contrasena" id="contrasena" value="<?= $usuario['contrasena'] ?>" placeholder="Ingrese la contraseña">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="contrasena2">Confirmar Contraseña</label>
                                                <input type="password" class="form-control" name="contrasena2" id="contrasena2" placeholder="Confirme la contraseña">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer ">
                                        <?php if (isset($_SESSION['mensaje'])) {
                                            echo $_SESSION['mensaje'];
                                            unset($_SESSION['mensaje']);
                                        }
                                        ?>
                                        <a href="./usuarios_lista.php" class="btn btn-danger text-center"><i class="fas fa-arrow-circle-left"></i> CANCELAR</a>
                                        <button type="submit" class="btn btn-success text-center" name="<?= is_null($usuario) ? "REGISTRAR" : "ACTUALIZAR" ?>">
                                           <i class="fas fa-check-circle"></i>
                                            <?= is_null($usuario) ? "REGISTRAR" : "ACTUALIZAR" ?>
                                        </button>
                                    </div>
                                </form>
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