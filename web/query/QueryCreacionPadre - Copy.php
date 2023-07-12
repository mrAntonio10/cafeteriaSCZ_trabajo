<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>QueryCreacionPadre</title>
</head>
<body>
	<?php
		session_start();
		
		$nombre=$_POST['Nombre_padre'];
		$apellido=$_POST['Apellido_padre'];
		$telefono=$_POST['Telefono_padre'];
		$email=$_POST['Email_padre'];
		$saldo=$_POST['Saldo_padre'];
		

		include("../include/func.phpinc");
		include("../include/dbopen.php");

		$sql1="INSERT INTO PADRE (Nombre,Apellido,correo,Telefono,Saldo,Usuario,contrasena,Estado,Tipo) VALUES ('$nombre','$apellido','$email','$telefono',$saldo,'usuario','contrasena','0','padre');";
		$res = query($sql1);

		$sql2="SELECT id_padre FROM PADRE WHERE Nombre = '$nombre' and Apellido = '$apellido' and correo = '$email' and Telefono = '$telefono';";
		$res2 = query($sql2);
		foreach($res2 as $fila){
			$id_padre=$fila['id_padre'];
		}	
		$_SESSION["id_padre"]=$id_padre;


		include('mailconc.php');
		include("dbclose.php");
		header("Location: ../creacionEstudiante.php");
	?>
</body>
</html>