<?php
session_start();
require_once '../clases/Tareas.php';
$obj = new Tareas;

/* Insertar registro */
if (isset($_POST['REGISTRAR'])) {
    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $descripcion = $_POST['descripcion'];

    if ($titulo == "" || $fecha == "" || $hora == "" || $descripcion == "") {
        $_SESSION['mensaje'] = '<p class="msg msg-error">Completar todos los campos</p>';
        header("location:../tareas_form.php");
    } else {
        if ($obj->insertarTareas($titulo, $fecha, $hora, $descripcion)) {
            $_SESSION['mensaje'] = '<p class="msg msg-exito">Tarea registrada con éxito</p>';
            header("location:../tareas_form.php");
        } else {
            $_SESSION['mensaje'] = '<p class="msg msg-error">Error al registrar</p>';
            header("location:../tareas_form.php");
        }
    }
    /* Actualizar registro */
} elseif (isset($_POST['ACTUALIZAR'])) {
    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $descripcion = $_POST['descripcion'];
    $id_tarea = $_POST['id_tarea'];

    if ($obj->actualizarTareas($titulo, $fecha, $hora, $descripcion, $id_tarea)) {
        $_SESSION['mensaje'] = '<p class="msg msg-exito">Tarea actualizada con éxito</p>';
        header("location:../tareas_lista.php");
    } else {
        $_SESSION['mensaje'] = '<p class="msg msg-error">Error al actualizar</p>';
        header("location:../tareas_form.php?id=$id_tarea");
    }
    /* Eliminar registro */
} elseif (isset($_GET['accion']) && $_GET['accion'] == "eliminar") {
    if ($obj->eliminarTareas($_GET['id'])) {
        $_SESSION['mensaje'] = '<p class="msg msg-exito">Éxito al eliminar tarea</p>';
        header("location:../tareas_lista.php");
    } else {
        $_SESSION['mensaje'] = '<p class="msg msg-error">Error al eliminar</p>';
        header("location:../tareas_lista.php");
    }
}
