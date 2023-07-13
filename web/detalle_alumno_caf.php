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
  $datos_alumno = $_REQUEST['usuario'];
  $var=explode("-",$datos_alumno);
  $idAlumno = $var[0];
  $id_padre = $var[1];

  //idAdmin
  $id= $_SESSION['id'];


  //query que debe tar en otro .php
   $query=("SELECT p.id_padre as pid, e.id_estudiante as eid, e.Nombre as en, e.Apellido as eap, p.Nombre as pn, p.Apellido as pap, e.Curso as ec, e.Grado as eg, p.Saldo as ps FROM lista_familia as lf JOIN estudiante as e ON lf.id_estudiante = e.id_estudiante JOIN padre as p ON lf.id_padre = p.id_padre WHERE lf.id_padre = 1;");
   $respuesta=query($query);

   foreach ($respuesta as $fila) {
    $padre = "{$fila['pn']} {$fila['pap']}";
    $saldo = "{$fila['ps']}";
    $id_padre = "{$fila['pid']}";

   }

//variables del FORMS
?>

      <div class="container" >
        <div class="row">
          <div class="col" style="margin-top: 60px">
            <?php
            	//TOP
      		echo "<a align='left'style=\"margin-left: 45px; font-size: 24px;\"> <b> Padre/ Madre: </b> $padre </a>  <br>";
          ?>
          <div style= "width: 100%">
            <?php
      		    echo "<a style=\"margin-left: 45px; font-size: 24px\"> <b> Saldo: </b> $saldo Bs   &emsp;&emsp;</a>";
            ?>
          </div>
          <br><br><br><br>

          </div>
        </div>
  <!-- Bandeja Lista Estudiantes Continua -->

   <div class="container text-center">
  <div class="row" style="margin-bottom: 4em;">
    <div class="col-sm-8"> <?php bandejaDetalleCaf($respuesta); ?></div>
  </div>
</div>


<!-- SCRIPT PARA PODER HACER LA PAGINACION -->
  <script type="text/javascript">
              $(document).ready(function() {
     $('#workers_table').DataTable( {
          language: {
              url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                },
                lengthMenu: [10],
                dom: 'rti',
            });
      });
</script>
      </div>





</body>
</html>