<?php
header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=reportesExcel.xls");



//DATOS EXTRAS
include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
//variables necesarias
  $apartado = $_REQUEST['sent'];
//variables de fecha
  $date = new DateTime('now', new DateTimeZone('UTC'));
  $date->setTimezone(new DateTimeZone('America/La_Paz'));
?>


<?php
  switch ($apartado) {
  case 2:
     //fecha actual

         $fechaActual = $date->format('Y-m-d');
             echo "PDF Caja Diara $fechaActual";  
      $sql = "SELECT t.id_estudiante as id, t.monto as monto, t.fecha as fecha, e.Nombre as en,e.Apellido as ea FROM transaccion t, estudiante e WHERE t.fecha='$fechaActual' AND t.id_estudiante=e.id_estudiante;";
      $respuesta = query($sql);
      bandejaReportes($respuesta);

//Termina el query y la bandeja - debemos cerrar el body y html para cargar toda la pagina como un PDF
     break;  

    case 4:
          //fecha actual
         $fechaActual = $date->format('Y-m-d');
         $date->sub(new DateInterval('P7D'));
         $fechaSemana = $date->format('Y-m-d');
             echo "PDF Caja Semanal $fechaSemana - $fechaActual";  
      $sql = "SELECT t.id_estudiante as id, t.monto as monto, t.fecha as fecha, e.Nombre as en,e.Apellido as ea FROM transaccion t, estudiante e WHERE t.fecha BETWEEN '$fechaSemana' AND '$fechaActual'AND t.id_estudiante=e.id_estudiante;";
      $respuesta = query($sql);
      bandejaReportes($respuesta);
//Termina el query y la bandeja - debemos cerrar el body y html para cargar toda la pagina como un PDF
      break;  
  
  case 6:
      //fecha actual
         $fechaActual = $date->format('Y-m-d');
             echo "PDF Deudores $fechaActual";  
      $sql = "SELECT Nombre as n, Apellido as p, correo as c, Telefono as t, Saldo as s from padre WHERE Saldo < 0;";
      $respuesta = query($sql);
      bandejaDeudores($respuesta);
//Termina el query y la bandeja - debemos cerrar el body y html para cargar toda la pagina como un PDF
      break;
}

      ?>


<?php
function bandejaDeudores($respuesta){
?>
<table id="workers_table" class="table" style="width:100%;">
<thead>
              <tr>
    <?php
                echo "<th style=\"border-right: 1px solid #FDFEFE; text-align: center;\"> Nombre </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE; text-align: center;\"> Apellido </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE; text-align: center;\"> Correo </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE; text-align: center;\"> Telefono </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE; text-align: center;\"> Saldo </th>";         
    ?>
              </tr>
            </thead>
            <tbody>
              <?php
             
    foreach ($respuesta as $fila) {

      // code...
      echo "<tr style=\"text-align: center; \">";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['n']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['p']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['c']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['t']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['s']} </td>";
      echo "</tr>";
    }
    ?>
             
            </tbody>
          </table>
<?php
}
?>



<?php
function bandejaReportes($respuesta){
?>
<table id="workers_table" class="table" style="width:100%;">
<thead>
              <tr>
    <?php
               
              
                echo "<th style=\"border-right: 1px solid #FDFEFE; text-align: center;\"> Nombre </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE; text-align: center;\"> Apellido </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE; text-align: center;\"> Monto </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE; text-align: center;\"> Fecha </th>";
               
    ?>
              </tr>
            </thead>
            <tbody>
              <?php
             
    foreach ($respuesta as $fila) {

      // code...
      echo "<tr style=\"text-align: center; \">";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['en']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['ea']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['monto']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['fecha']} </td>";
      echo "</tr>";
    }
    ?>
             
            </tbody>
          </table>
<?php
}
?>
