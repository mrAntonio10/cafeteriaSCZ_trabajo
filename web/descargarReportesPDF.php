<?php
//DATOS EXTRAS
include("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
//variables necesarias
  $apartado = $_REQUEST['sent'];
//variables de fecha
  $date = new DateTime('now', new DateTimeZone('UTC'));
  $date->setTimezone(new DateTimeZone('America/La_Paz'));
ob_start();
?>
<html>
<head> 
  <title>
     .: Cafeteria SCIS :. 
  </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"></script>




<style type="text/css">
  #popup {
    left:0;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 1001;
  }
  .popup-content {
    margin: 0px auto;
    margin-top: 100px;
    padding: 30px;
    position: relative;
    width: 40%;
    min-width: 250px;
    background: white;
    border: 1px solid black;
    height: 400px;
    border-radius:  20px;
  }

  .dataTables_filter {
    text-align: center !important;
    padding-top: 10px !important;
    padding-bottom: 20px !important;
  }
  .dataTables_filter input{
    width: 100% !important;
    background-color: #d2d2d2 !important;
  }
  .dataTables_info {
    display: none;
  }
  .dataTables_paginate {
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 10px !important;
    padding-bottom: 20px !important;
  }
  .dataTables_paginate .page-link {
    color: #071655;

  &:focus {
    color: yellow !important;
  }
  &.active,
  .active > & {
    color: yellow !important;
  }
  }
  .dataTables_paginate .active>.page-link, .page-link.active{
    background-color: #071655 !important;
    border-color: #071655 !important;
  }
  .fondo_azul {
    background: #071655;
    color: #FFFFFF;
    display:  flex;
    padding-top: 30px;
  }
  h1 {
    font-size: 40px;
    display:  flex;
  }
  .boton input{
    background: #071655;
    font-size: 16px;
    color: #FFFFFF;
    border-color: yellow;
    border-bottom: none;
    text-align: center;
    border-radius: 10px 10px 0 0;
    width: 100%;
    height: 50px;
    white-space: normal;
    &.active,
    .active > & {
    color: #071655;
    background: #ffffff;
  }
  }
  .boton input:hover {
    background: #ffffff;
    color: #071655;
  }
  .boton_secundario input{
    background: #071655;
    font-size: 16px;
    color: #FFFFFF;
    border-radius: 5px;
    margin-bottom: 10px;
    height: 40px;
  }
  .boton_secundario{
    background: #071655;
    font-size: 16px;
    color: #FFFFFF;
    border-radius: 5px;
    margin-bottom: 10px;
    height: 40px;
  }
  .texto input{
    margin-bottom: 15px;
    width: 60%;
    height: 40px;
  }
  .button-link {
    padding: 10px 20px;
    background-color: #071655;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-decoration: none;
    color: #FFFFFF;
    font-size: 16px;
    margin-bottom: 10px;
    height: 40px;
  }
  .button-link:hover {
    color: #FFFFFF;
  }

  @media only screen and (max-width: 809px) {
      .boton input{
        font-size: 13px;
      }
  }
  @media only screen and (max-width: 712px) {
      .boton input{
        font-size: 10px;
      }
  }
</style>
<div class="fondo_azul" style>
  <div style="width: 50%; display:  flex;">
    <img src="include/LogoSCIS.png" style="width: 70px; height: 70px; margin-left: 20px; bottom: 10px; position: relative;">
    <h1>CAFETERIA SCIS</h1>
  </div>
  <div style="width: 25%; text-align: right; padding-right: 30px;">
    <div>
      <?php
      session_start();
      $id= $_SESSION['id'];
     $usuario= $_SESSION["funcionario"];
  $localDateFormat = $date->format('d/m/Y');


      ?>
      <b>Usuario:</b> <?php echo " $usuario";  ?>
    </div>
 

  </div>

</div>


</head>



<body>


<?php
  switch ($apartado) {
  case 1:
     //fecha actual

         $fechaActual = $date->format('Y-m-d');
             echo "PDF Caja Diara $fechaActual";  
      $sql = "SELECT t.id_estudiante as id, t.monto as monto, t.fecha as fecha, e.Nombre as en,e.Apellido as ea FROM transaccion t, estudiante e WHERE t.fecha='$fechaActual' AND t.id_estudiante=e.id_estudiante;";
      $respuesta = query($sql);
      bandejaReportes($respuesta);

//Termina el query y la bandeja - debemos cerrar el body y html para cargar toda la pagina como un PDF
     break;  

    case 3:
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
  
  case 5:
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

</body>
</html>

<?php

$html=ob_get_clean();
require_once 'libreria/dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("reportePdf".$fechaActual, array("Attachment"  => false));
// PARA EN VIAR EL CORREO :D
include_once("mailconc.php");
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
