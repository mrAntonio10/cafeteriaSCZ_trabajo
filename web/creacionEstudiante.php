<?php
//DATOS EXTRAS
include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");	
//PAGINA
include("include/head2.php");
include("include/TablasDinamicas.php");
?>

<?php
/*
$_SESSION["id"]=$id;
$_SESSION["funcionario"]=$fun;
$_SESSION["su"]=$su;
*/

//variables para iniciar sesion
	session_start();
	$user = $_SESSION['funcionario'];
	$tipo = $_SESSION['su'];

//variables del FORMS
//0 --> cerrar sesion
//Cafeteria debe mostrar listado de estudiantes

?>
<br>
<h2><center>Nuevo Estudiante</center></h2>
<br>
<div style="width: 100%; display: flex;">
  <div style="width: 50%; text-align: right; margin-right: 30px;">
    <h3>Seleccionar Padre/ Madre:</h3>
  </div>
  <div style="width: 50%; margin-left: 30px;">
    <a href="creacionPadre.php" class="button-link">Agregar Nuevo Padre</a>
  </div>
</div>
<br>



  <form action="creacionEstudiante2.php" method="post" style="text-align: center;">
  	
  </form>
</body>
</html>