<?php
	require 'conexion.php';
	$usuario=$_POST['correo'];
	$contra = $_POST['contra'];
	
	$password= md5($contra);

	if(isset($usuario)){
			$con = Database::getInstance()->getDb();

			$usuarios = $con->prepare("SELECT email FROM usuarios WHERE email = ?");
			$usuarios->bindParam(1, $usuario);
			$usuarios->execute();
			$counta = $usuarios->rowCount();
			if($counta > 0){
				$actualiza = $con->prepare("UPDATE usuarios SET contraseña = ? WHERE email = ?");
				$actualiza->bindParam(1, $password);
				$actualiza->bindParam(2, $usuario);
				$actualiza->execute();
				echo "<script language='JavaScript'>
				$('#olvido').modal('hide');
  				</script>";
				exit;
			$con = null;
		}else{
			echo "<br><div class='alert alert-danger'>El usuario no existe. Verifica tu correo.</div>";
		}
	}
?>