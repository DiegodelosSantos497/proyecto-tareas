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
                            <h1 class="m-0">Lista de Tareas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./inicio.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Lista de Tareas</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            require_once './clases/Tareas.php';
            $obj = new Tareas;
            $tareas = $obj->listarTareas();


            ?>


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="./tareas_form.php" class="btn btn-outline-info btn-block"><i class="fas fa-plus"></i> &nbsp; Nueva Tarea</a>
                                </div>
                                <div class="card-body">
                                    <table id="tablas" class="table table-bordered table-striped table-hover text-center tablas" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Título</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Descripción</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($tareas as $tarea) { ?>
                                                <tr>
                                                    <td><?= $tarea['id_tarea'] ?></td>
                                                    <td><?= $tarea['titulo'] ?></td>
                                                    <td><?= $tarea['fecha'] ?></td>
                                                    <td><?= $tarea['hora'] ?></td>
                                                    <td><?= $tarea['descripcion'] ?></td>
                                                    <td>
                                                        <a href="./tareas_form.php?id=<?= $tarea['id_tarea'] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="./procesos/tareas.php?id=<?= $tarea['id_tarea'] ?>&accion=eliminar" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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