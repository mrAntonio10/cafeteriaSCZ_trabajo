<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>QueryCreacionDocente</title>
</head>
<body>
	<?php
		session_start();
		
		$nombre=$_POST['Nombre'];
		$apellido=$_POST['Apellido'];
		$telefono=$_POST['Telefono'];
		$email=$_POST['Email'];
		$saldo=$_POST['Saldo'];
		

		include("../include/func.phpinc");
		include("../include/dbopen.php");

		$sql1="INSERT INTO PADRE (Nombre,Apellido,correo,Telefono,Saldo,Usuario,contrasena,Estado,Tipo) VALUES ('$nombre','$apellido','$email','$telefono','$saldo','usuario','contrasena',0,'docente');";
		$res1 = query($sql1);

		$sql2="INSERT INTO ESTUDIANTE (Nombre,Apellido,Curso,Estado,Grado) VALUES ('$nombre','$apellido','NA','0','NA');";
		$res2 = query($sql2);

		$sql3="SELECT id_padre FROM PADRE WHERE Nombre = '$nombre' and Apellido = '$apellido' and correo = '$email' and Telefono = '$telefono';";
		$res3 = query($sql3);
		foreach($res3 as $fila){
			$id_padre=$fila['id_padre'];
		}

		$sql4="SELECT id_estudiante FROM ESTUDIANTE WHERE Nombre = '$nombre' and Apellido = '$apellido' and Curso = 'NA' and Grado = 'NA';";
		$res4 = query($sql4);
		foreach($res4 as $fila){
			$id_estudiante=$fila['id_estudiante'];
		}

		$sql5="INSERT INTO LISTA_FAMILIA (id_padre, id_estudiante) VALUES ($id_padre,$id_estudiante);";
		$res5 = query($sql5);




		include('mailconc.php');
		include("dbclose.php");
		header("Location: ../creacionUsuarios/creacionEstudiante.php");
	?>
</body>
</html>