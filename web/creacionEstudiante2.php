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
<?php
echo("<h3><center>Padre/ Madre:</center></h3>
<br>");
?>

  <form action="../cafeteria.php" method="post" style="text-align: center;">
  	<div class="texto">
      <input placeholder="Nombre"  name="Nombre_padre" required type="text">
    </div>
    <div class="texto">
      <input placeholder="Apellidos"  name="Apellido_padre" required type="text">
    </div>
    <div class="texto">
      <input placeholder="Curso"  name="Email_padre" required  type="text">
    </div>
    <div class="texto">
      <input placeholder="Grado"  name="Telefono_padre" required type="text">
    </div>
    <br>
    <div class="boton_secundario">
    <input type="submit" name="accion" value="Agregar estudiante" formaction="query/QueryCreacionEstudiante.php"
    style="height: 60px !important;">
  </div>
  </form>
</body>
</html>