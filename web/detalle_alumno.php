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
//variables para iniciar sesion
	session_start();
	$user = $_SESSION['funcionario'];
	$tipo = $_SESSION['su'];
  $alumno = $_REQUEST['usuario'];
  //idAdmin
  $id= $_SESSION['id'];


  //query que debe tar en otro .php
   $query=("SELECT p.id_padre as pid, e.id_estudiante as eid,e.Nombre as en, e.Apellido as eap, p.Nombre as pn, p.Apellido as pap, e.Curso as ec, e.Grado as eg, p.Saldo as ps FROM lista_familia as lf, padre as p, estudiante as e WHERE lf.id_estudiante=$alumno AND lf.id_padre=p.id_padre and lf.id_estudiante=e.id_estudiante;");
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
            <a href="creacionPadre.php" class="button-link">Agregar Saldo</a>
          </div>
          <br><br><br><br>

          </div>
        </div>
  <!-- Bandeja Lista Estudiantes Continua -->

   <div class="container text-center">
  <div class="row" style="margin-bottom: 4em;">
    <div class="col-sm-8"> <?php bandejaDetalle($respuesta); ?></div>
  </div>
  <div class="row">
    <a href="creacionEstudiante.php" class="button-link">Agregar Estudiante</a>
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







<!-- contenido popup -->
<div id="popup" class="popup">
  <div class="popup-content">
    <?php
          //obtenerAnhioGestion
    $anioActual = date("Y");
    //request
    $idAlumno = $_REQUEST['cod']; 
    //query
    $sql = "SELECT e.Nombre as ne, e.Apellido as ae, p.id_padre as idP, p.Nombre as np, p.Apellido as ap FROM estudiante e, lista_familia lf, padre p WHERE e.id_estudiante=$alumno AND lf.id_estudiante=$alumno AND p.id_padre=lf.id_padre;";
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
        require_once("libreria/phpqrcode/qrlib.php");
          QRcode::png("http://192.168.0.18/CAFETERIA/web/imagenes/comprobarQr.php?sent=$alumno-$debitarPadre-$id","test.png");
      ?>
      <!-- para mostrar la imagen-->
          <img src="test.png" width="150" height="150">
    <br>
    <button id="closePopup">Cerrar</button>
  </center>
  </div>
</div>


<!-- Script -->

<script>
$(document).ready(function() {
  $("#openPopup").click(function() {
    $("#popup").fadeIn();
  });

  $("#closePopup").click(function() {
    $("#popup").fadeOut();
  });
});

</script>



</body>
</html>