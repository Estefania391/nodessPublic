<?php
require 'php/conexion.php';

SESSION_START();

$con = Database::getInstance()->getDb();

$personaliza = $con->prepare("SELECT nombre, favicon, logo, colorP FROM personalizar");
$personaliza->execute();
$rowsp = $personaliza->fetchAll(\PDO::FETCH_OBJ);

foreach($rowsp as $rowp){
  $nombre = $rowp->nombre;
  $favicon = $rowp->favicon; 
  $logo = $rowp->logo;
  $colores = $rowp->colorP; 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login | <?php print($nombre); ?></title>
  <!-- Site Icons -->
  <link rel="shortcut icon" type="image/png" href="personalizar/php_personalizar/<?php print($favicon); ?>"/> 
  <link rel="apple-touch-icon" href="personalizar/php_personalizar/<?php print($favicon); ?>">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Site CSS -->
  <link rel="stylesheet" href="../style.css">
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="../css/responsive.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/custom.css">
  <script src="../js/modernizr.js"></script><!--Modernizr -->
</head>

<body style="background-image: url(img/login_admin_bg.gif); background-attachment: fixed; background-repeat: no-repeat; background-size: cover;">
  <div class="container col-md-4">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login <?php if(isset($nombre))print($nombre);  ?></div>
      <div class="card-body">
        <form onsubmit="Login(); return false" method="post" role="form">
          <div class="form-group">
            <label for="Correo">Correo Electronico</label>
            <input class="form-control" id="Correo" type="email" aria-describedby="emailHelp" placeholder="Ingresa tu correo">
          </div>
          <div class="form-group">
            <label for="Contrasena">Contraseña</label>
            <input class="form-control" id="Contrasena" type="password" placeholder="Ingresa tu contraseña">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          <div id="alerta"></div>
        </form>
        <div class="text-center">
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../fontawesome/js/all.js" type="text/javascript"></script>
  <script>
  function Login(){
      var correo=$("#Correo").val();
      var contra=$("#Contrasena").val();

      $.ajax({
              url:'php/consulta_login.php',
              data:'correo='+correo +'&contra='+ contra,
              type: 'post',
              success: function(data){
                  $("#alerta").html(data);
                  $(document).ready(function() {
                      setTimeout(function() {
                          $(".alert").fadeOut(1000);
                      },1100);
                  });
              }
      })
  }
  </script>
</body>

</html>
