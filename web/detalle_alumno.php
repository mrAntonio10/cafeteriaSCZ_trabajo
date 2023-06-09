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
//variables para iniciar sesion
	session_start();
	$user = $_SESSION['funcionario'];
	$tipo = $_SESSION['su'];
  $alumno = $_REQUEST['usuario'];

//variables del FORMS
?>

      <div class="container" >
        <div class="row">
          <div class="col" style="margin-top: 15px">
            <?php
            	//TOP
      		echo "<h1 align='left' style=\"margin-left: 30px\"> Cafeteria SCIS </h1>";
      		echo "<a align='left'style=\"margin-left: 45px; font-size: 24px;\"> <b> Usuario: </b> <u> $user </u> </a>  <br>";
      		echo "<a style=\"margin-left: 45px; font-size: 24px\"> <b> Fecha : </b> obtenerFecha </a>  <br><br>";
      		echo "<h2 style=\"margin-left: 20px\"> Detalle de consumo: </h2>";
            ?>

          </div>
          <div class="col" align="center" style="margin-top: 28px;">

          </div>
        </div>
  <!-- Bandeja Lista Estudiantes Continua -->
   <?php
   //query que debe tar en otro .php
   $query=("SELECT e.id_estudiante as eid,e.Nombre as en, e.Apellido as eap, p.Nombre as pn, p.Apellido as pap, e.Curso as ec, e.Grado as eg, p.Saldo as ps FROM lista_familia as lf, padre as p, estudiante as e WHERE lf.id_estudiante=$alumno AND lf.id_padre=p.id_padre and lf.id_estudiante=e.id_estudiante;");
   $respuesta=query($query);


  
   ?>

   <div class="container text-center">
  <div class="row">
    <div class="col-sm-8"> <?php bandejaDetalle($respuesta); ?></div>
    <div class="col-sm-4">col-sm-4</div>
  </div>
</div>


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

      </div>



</body>
</html>