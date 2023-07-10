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
  <div style="width: 100%; text-align: right;">
    <h3>Seleccionar Padre/ Madre:</h3>
<?php
  //Bandeja Seleccionar un padre existente
   $query=('SELECT p.id_padre as pid,p.Nombre as pn, p.Apellido as pap FROM padre as p;');
   $respuesta=query($query);
   bandejaPadre($respuesta);
?>
  </div>
  <div style="width: 50%; margin-left: 30px;">
    <a href="creacionPadre.php" class="button-link">Agregar Nuevo Padre</a>
  </div>
</div>
<br>



  <form action="creacionEstudiante2.php" method="post" style="text-align: center;">
  	
  </form>




<!-- SCRIPT PARA PODER HACER LA PAGINACION -->
  <script type="text/javascript">
              $(document).ready(function() {
     $('#workers_table').DataTable( {
          language: {
              url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
            },
            lengthMenu: [ 10 ],
        dom: 'Bfrtip',

            });
      });
</script>
</body>
</html>