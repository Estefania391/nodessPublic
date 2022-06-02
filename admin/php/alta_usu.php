<?php
require('conex.php');
require 'class.phpmailer.php';
require 'class.smtp.php';

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$fecha_regis = Date("Y-m-d");
$numero = $_POST['numero'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];
$password = md5($pass);
$nivel = "joven_jedi";
$status = 1;

$con = Conectar();
$sql = "INSERT INTO usuarios(Nombre, Apellidos, Numero, Correo, Contra, Fecha_registro, Nivel, Status) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
$q = $con->prepare($sql);
$q->bindParam(1, $nombre);
$q->bindParam(2, $apellidos);
$q->bindParam(3, $numero);
$q->bindParam(4, $correo);
$q->bindParam(5, $password);
$q->bindParam(6, $fecha_regis);
$q->bindParam(7, $nivel);
$q->bindParam(8, $status);
$q->execute();

/*
//Recibir todos los parámetros del formulario
$para = "salvador112233@hotmail.com";
$asunto = "Registro en FrickGeekMoon";
$mensaje = "pr";

//Correo que enviara y password
$correo_O="@hotmail.com";
$corr_password="soluciones2016_";

//Hosting que envia los correos y metodo seguro
$hosting_correo="smtp-mail.outlook.com";
$puerto= 587;
$met_seguro='tls';

//Este bloque es importante
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = $met_seguro;
$mail->Host = $hosting_correo;
$mail->Port = $puerto;

$mail->Username = $correo_O;
$mail->Password = $corr_password;

$mail->From = $correo_O;
//nombre de quien envia el correo
$mail->FromName = "FrickGeekMoon"; 

//Agregar destinatario
$mail->AddAddress($correo);
$mail->Subject = $asunto;
$mail->Body = $mensaje;

if($mail->Send())
{
	echo'<script type="text/javascript">
			alert("Enviado Correctamente");
			window.location="http://localhost:81/proyectosweb/maillocal/index.php"
		 </script>';
}
else{
	echo  "Error: " . $mail->ErrorInfo;
}*/
?>