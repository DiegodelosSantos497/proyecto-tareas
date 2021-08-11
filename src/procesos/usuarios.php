<?php
session_start();
require_once '../clases/Usuarios.php';
$obj = new Usuarios;

if (isset($_POST['REGISTRAR'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena2 = $_POST['contrasena2'];

    if ($nombre == "" || $correo == "" || $contrasena == "" || $contrasena2 == "") {
        $_SESSION['mensaje'] = '<p class="msg msg-error">Completar todos los campos</p>';
        header("location:../usuarios_form.php");
    } elseif ($contrasena !== $contrasena2) {
        $_SESSION['mensaje'] = '<p class="msg msg-error">Las contraseñas son incorrectas</p>';
        header("location:../usuarios_form.php");
    } else {

        if ($obj->insertarUsuarios($nombre, $correo, $contrasena)) {
            $_SESSION['mensaje'] = '<p class="msg msg-exito">Usuário registrado con éxito</p>';
            header("location:../usuarios_form.php");
        } else {
            $_SESSION['mensaje'] = '<p class="msg msg-error">Error al registrar el nuevo usuário</p>';
            header("location:../usuarios_form.php");
        }
    }
} elseif (isset($_POST['ACTUALIZAR'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena2 = $_POST['contrasena2'];
    $id_usuario = $_POST['id_usuario'];

    if ($nombre == "" || $correo == "" || $contrasena == "" || $contrasena2 == "" || $id_usuario == "") {
        $_SESSION['mensaje'] = '<p class="msg msg-error">Completar todos los campos</p>';
        header("location:../usuarios_form.php?id=$id_usuario");
    } elseif ($contrasena !== $contrasena2) {
        $_SESSION['mensaje'] = '<p class="msg msg-error">Las contraseñas son incorrectas</p>';
        header("location:../usuarios_form.php?id=$id_usuario");
    } else {

        if ($obj->actualizarUsuarios($nombre, $correo, $contrasena, $id_usuario)) {

            if ($_SESSION['usuario']['id_usuario'] === $id_usuario) {
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['correo'] = $correo;
                $_SESSION['usuario']['contrasena'] = $contrasena;
            }
            $_SESSION['mensaje'] = '<p class="msg msg-exito">Usuário actualizado con éxito</p>';
            header("location:../usuarios_lista.php");
        } else {
            $_SESSION['mensaje'] = '<p class="msg msg-error">Error al actualizar el nuevo usuário</p>';
            header("location:../usuarios_form.php?id=$id_usuario");
        }
    }
} elseif (isset($_GET['accion']) && $_GET['accion'] == "eliminar") {
    if ($_SESSION['usuario']['id_usuario'] === $_GET['id']) {
        $_SESSION['mensaje'] = '<p class="msg msg-error">No puede eliminar su propia cuenta</p>';
        header("location:../usuarios_lista.php");
    } elseif ($obj->eliminarUsuarios($_GET['id'])) {
        $_SESSION['mensaje'] = '<p class="msg msg-exito">Usuário eliminado con éxito</p>';
        header("location:../usuarios_lista.php");
    } else {
        $_SESSION['mensaje'] = '<p class="msg msg-error">Error al eliminar el usuário</p>';
        header("location:../usuarios_lista.php");
    }
}
