<html>
	<head>
		
	</head>
	<body>
	<?php
		//DATOS EXTRAS
		include("../include/conf.phpinc");
		include("../include/func.phpinc");
		include("../include/dbopen.php");	
		
		
		//obtenerAnhioGestion
		$anioActual = date("Y");
		//request
		$idAlumno = $_REQUEST['cod']; 
		//query
		$sql = "SELECT e.Nombre as ne, e.Apellido as ae, p.id_padre as idP, p.Nombre as np, p.Apellido as ap FROM estudiante e, lista_familia lf, padre p WHERE e.id_estudiante=$idAlumno AND lf.id_estudiante=$idAlumno AND p.id_padre=lf.id_padre;";
		$res = query($sql);
		//obtener los parametros
		foreach($res as $fila){
			$nombreEstudiante=$fila['ne'];
			$apellidoEstudiante=$fila['ae'];
			$nombrePadre=$fila['np'];
			$apellidoPadre=$fila['ap'];
			$debitarPadre=$fila['idP'];
		}

		//EstructuraFormatoTarjeta
	?>		
		<center>
			<?php
				//top
				echo "<h1> CLASS OF $anioActual </h1>";
				//estudiante
				echo "<h2> $nombreEstudiante $apellidoEstudiante</h2>";
				//padre
				echo "<h3> Parent: <br>";
				echo "$nombrePadre $apellidoPadre </h3>";


			//gestorDelQr
				require_once("../libreria/phpqrcode/qrlib.php");
  				QRcode::png("http://192.168.0.25/CAFETERIA/web/imagenes/comprobarQr.php?sent=$idAlumno-$debitarPadre","test.png");
			?>
			<!-- para mostrar la imagen-->
		      <img src="test.png" width="150" height="150">
		</center>
    
		
	</body>
</html>