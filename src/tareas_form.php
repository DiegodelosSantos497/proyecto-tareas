<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once './includes/head.php'; ?>
    <title>Agenda | Lista de Tareas</title>
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
                            <h1 class="m-0">Tareas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./inicio.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Tareas</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            require_once './clases/Tareas.php';
            $obj = new Tareas;
            if ($obj->obtenerid_Tareas($_GET['id'])) {
                $tarea = $obj->obtenerid_Tareas($_GET['id']);
            } else {
                $tarea = null;
            }
            ?>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <h4 class="card-header bg-info text-center">
                                    <?= is_null($usuario) ? "REGISTRAR NUEVA TAREA" : "ACTUALIZAR TAREA" ?>
                                </h4>
                                <form action="./procesos/tareas.php" method="POST">
                                    <div class="card-body">
                                        <input type="hidden" name="id_tarea" id="id_tarea" value="<?= $tarea['id_tarea'] ?>">
                                        <div class="form-group">
                                            <label for="titulo">Título</label>
                                            <input type="text" class="form-control" name="titulo" id="titulo" value="<?= $tarea['titulo'] ?>">
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label for="fecha">Fecha</label>
                                                <input type="date" class="form-control" name="fecha" id="fecha" value="<?= $tarea['fecha'] ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="hora">Hora</label>
                                                <input type="time" class="form-control" name="hora" id="hora" value="<?= $tarea['hora'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-md-12">
                                                <label for="descripcion">Descripción</label>
                                                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="7"><?= $tarea['descripcion'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer ">
                                        <?php if (isset($_SESSION['mensaje'])) {
                                            echo $_SESSION['mensaje'];
                                            unset($_SESSION['mensaje']);
                                        }
                                        ?>
                                        <a href="./tareas_lista.php" class="btn btn-danger text-center"><i class="fas fa-arrow-circle-left"></i> CANCELAR</a>
                                        <button type="submit" class="btn btn-success text-center" name="<?= is_null($tarea) ? "REGISTRAR" : "ACTUALIZAR" ?>">
                                            <i class="fas fa-check-circle"></i>
                                            <?= is_null($tarea) ? "REGISTRAR" : "ACTUALIZAR" ?>
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