<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>QueryCreacionEstudiante</title>
</head>
<body>
	<?php
		session_start();

		$id_padre=$_SESSION['id_padre'];
		$nombre=$_POST['nombre_estudiante'];
		$apellido=$_POST['apellido_estudiante'];
		$curso=$_POST['curso_estudiante'];
		$grado=$_POST['grado_estudiante'];
		

		include("../include/func.phpinc");
		include("../include/dbopen.php");

		$sql1="INSERT INTO ESTUDIANTE (Nombre,Apellido,Curso,Estado,Grado) VALUES ('$nombre','$apellido','$curso',0,'$grado');";
		$res1 = query($sql1);

		$sql2="SELECT id_estudiante FROM ESTUDIANTE WHERE Nombre = '$nombre' and Apellido = '$apellido' and Curso = '$curso' and Grado = '$grado';";
		$res2 = query($sql2);
		foreach($res2 as $fila){
			$id_estudiante=$fila['id_estudiante'];
		}

		$sql3="INSERT INTO LISTA_FAMILIA (id_padre, id_estudiante) VALUES ($id_padre,$id_estudiante);";
		$res3 = query($sql3);




		include('mailconc.php');
		include("dbclose.php");
		header("Location: ../cafeteria.php");
		unset($_SESSION["id_padre"]);
	?>
</body>
</html>