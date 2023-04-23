<?php
//DATOS EXTRAS
include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");	
//PAGINA
include("include/head.php");
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

<div class="container">
  <div class="row">
    <div class="col" style="margin-top: 15px">
      <?php
      	//TOP
		echo "<h1 align='left' style=\"margin-left: 30px\"> Cafeteria SCIS </h1>";
		echo "<a align='left'style=\"margin-left: 45px; font-size: 24px;\"> <b> Usuario: </b> <u> $user </u> </a>  <br>";
		echo "<a style=\"margin-left: 45px; font-size: 24px\"> <b> Fecha : </b> obtenerFecha </a>  <br><br>";
		echo "<h2 style=\"margin-left: 20px\"> Buscador: </h2>";
      ?>
    </div>
    <div class="col" align="center" style="margin-top: 28px;">
      <!--   Botones de interaccion cafeteria   -->
     <form action="#" method="get">
      <input type="hidden" name="hid" value="0">
      <input type="submit" name="cerrarS" value="Cerrar Sesion" style="width: 360px; background-color: #BBBBBB; border-radius: 12px;">
      <BR>
      <input type="button" name="Añadir_Padre" value="Añadir Padre" style="margin-top: 10px; background-color: #BBBBBB; border-radius: 12px;"> 
      <input type="button" name="Añadir_Docente" value="Añadir Docente" style="margin-top: 10px; background-color: #BBBBBB; border-radius: 12px;">
      <input type="button" name="Añadir_Alumno" value="Añadir Alumno" style="margin-top: 10px; background-color: #BBBBBB; border-radius: 12px;">
      <BR>
      <input type="button" name="Scanner" value="Scanner" style="margin-top: 10px; width: 360; background-color: #BBBBBB; border-radius: 12px;">
  	  </BR>
      <input type="button" name="Lista_Actualizacion_Continua" value="Lista Actualizacion Continua" style="margin-top: 10px; width: 360px; background-color: #BBBBBB; border-radius: 12px;">
     </form>
    </div>
  </div>
  <!-- Bandeja Lista Estudiantes Continua -->
	 <?php

	 //query que debe tar en otro .php
	 $query=('SELECT e.id_estudiante as eid,e.Nombre as en, e.Apellido as eap, p.Nombre as pn, p.Apellido as pap, e.Curso as ec, e.Grado as eg, p.Saldo as ps FROM lista_familia as lf, padre as p, estudiante as e WHERE lf.id_padre=p.id_padre and lf.id_estudiante=e.id_estudiante;');
	 $respuesta=query($query);
	 bandejaEntrada($respuesta);
	 ?>


<!-- SCRIPT PARA PODER HACER LA PAGINACION -->
  <script type="text/javascript">
              $(document).ready(function() {
     $('#workers_table').DataTable( {
          language: {
              url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                }
            });
      });
</script>

</body>
</html>