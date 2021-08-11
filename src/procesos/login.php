<?php
session_start();

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
if ($correo == "" || $contrasena == "") {
    $_SESSION['mensaje'] = '<p class="msg msg-error">Campos Vacíos</p>';
    header("location:../../index.php");
} else {
    require_once '../clases/Usuarios.php';
    $obj = new Usuarios;
    $login = $obj->loginUsuarios($correo, $contrasena);
    if ($login) {
        $_SESSION['usuario'] = $login;
        header("location:../inicio.php");
    } else {
        $_SESSION['mensaje'] = '<p class="msg msg-error">Datos incorrectos</p>';
        header("location:../../index.php");
    }
}
