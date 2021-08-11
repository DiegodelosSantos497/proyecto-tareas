<?php
session_start();
if(isset($_SESSION['usuario'])){
  header("location:./src/inicio.php");
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agenda | Iniciar Sesión</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Estilos css -->
  <link rel="stylesheet" href="./public/css/estilos.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./public/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center bg-white">
        <a href="http://localhost/proyecto/" class="h1"><b>Agenda</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Iniciar Sesión</p>
        <?php if (isset($_SESSION['mensaje'])) {
          echo $_SESSION['mensaje'];
          unset($_SESSION['mensaje']);
        }
        ?>

        <form action="./src/procesos/login.php" method="POST">
          <div class="input-group mb-3">
            <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo electrónico">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-12">
              Correo Electrónico: <strong>admin@admin.com</strong>
              Contraseña: <strong>admin</strong>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" name="iniciar_sesion" class="btn btn-primary btn-block">Iniciar Sesión</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="./public/plugins/jquery/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Font Awesome -->
  <script src="./public/plugins/fontawesome/fontawesome.js"></script>
  <!-- AdminLTE App -->
  <script src="./public/js/adminlte.min.js"></script>
</body>

</html>