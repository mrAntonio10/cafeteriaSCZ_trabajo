<?php
//DATOS EXTRAS
include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");	
//PAGINA
include("include/head2.php");
include("include/TablasDinamicas.php");

 //variables para iniciar sesion
        session_start();
        $user = $_SESSION['funcionario'];
        $tipo = $_SESSION['su'];
//variables del FORMS
?>

  <!-- Bandeja Lista Estudiantes Continua -->
	 <?php
	 //query que debe tar en otro .php
	 $query=('SELECT p.id_padre as pid, e.id_estudiante as eid,e.Nombre as en, e.Apellido as eap, p.Nombre as pn, p.Apellido as pap, e.Curso as ec, e.Grado as eg, p.Saldo as ps FROM lista_familia as lf, padre as p, estudiante as e WHERE lf.id_padre=p.id_padre and lf.id_estudiante=e.id_estudiante;');
	 $respuesta=query($query);
	 bandejaEntrada($respuesta);

	 ?>


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