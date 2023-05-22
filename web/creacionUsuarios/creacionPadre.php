<?php
//DATOS EXTRAS
include("../include/conf.phpinc");
include("../include/func.phpinc");
include("../include/dbopen.php");	
//PAGINA
include("../include/head.php");
include("../include/TablasDinamicas.php");
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

<div class="container">
  <div class="row">
    <div class="col" style="margin-top: 15px">
      <?php
      	//TOP
		echo "<h1 align='left' style=\"margin-left: 30px\"> Cafeteria SCIS </h1>";
		echo "<a align='left'style=\"margin-left: 45px; font-size: 24px;\"> <b> Usuario: </b> <u> $user </u> </a>  <br>";
		echo "<a style=\"margin-left: 45px; font-size: 24px\"> <b> Fecha : </b> obtenerFecha </a>  <br><br>";
		echo "<h2 style=\"margin-left: 20px\"> Nuevo Padre </h2>";
      ?>
    </div>
    <div class="col" align="center" style="margin-top: 28px;">
      <!--   Botones de interaccion cafeteria   -->
     <form action="#" method="get">
      <input type="hidden" name="hid" value="0">
      <input type="submit" name="cerrarS" value="Cerrar Sesion" style="width: 360px; background-color: #BBBBBB; border-radius: 12px;">
      <BR>
      <input type="button" name="Scanner" value="Scanner" style="margin-top: 10px; width: 360; background-color: #BBBBBB; border-radius: 12px;">
  	  </BR>
      <input type="button" name="Lista_Actualizacion_Continua" value="Lista Actualizacion Continua" style="margin-top: 10px; width: 360px; background-color: #BBBBBB; border-radius: 12px;">
     </form>
    </div>
  </div>

  <form action="../cafeteria.php" method="post">
  	<div class="input-group mt-4";>
  		<input  class="form-control bg-light" placeholder="Nombre completo"  name="nombre" required style="text-align:" type="text"> 
  	</div>
  	<br>
  	<div class=\input-group mt-4\;>
  		<input  class="form-control bg-light" placeholder="Email"  name="email" required style="text-align:" type="text"> 
  	</div>
  	<br>
  	<div class=\input-group mt-4\;>
  		<input  class="form-control bg-light" placeholder="Telefono"  name="telefono" required style="text-align:" type="text"> 
  	</div>
  	<br>
  	<div class="btn btn-warning w-100 mt-4 fw-bold shadow";>
  		<input type="submit"  class="btn d-grid gap-2 col-12 mx-auto" name="accion" value="Agregar y crear nuevo estudiante" >
  	</div>
  </form>
</body>
</html>