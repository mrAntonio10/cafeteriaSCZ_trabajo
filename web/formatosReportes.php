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
//variables del FORMS
?>

<div style="margin-top: 30px; margin-left: 200px;">
  <h1 > Reportes </h1>


  <div style="margin-top: 30px; margin-left: 200px;">
    <h2>
      Caja Diaria: 
        <button onclick="window.location.href = 'descargarReportes.php?sent=1';">Descargar en PDF</button> 
        <button onclick="window.location.href = 'descargarReportes.php?sent=2';">Descargar en Excel</button>
      <br>
      Caja Semanal:
       <button onclick="window.location.href = 'descargarReportes.php?sent=3';">Descargar en PDF</button> 
        <button onclick="window.location.href = 'descargarReportes.php?sent=4';">Descargar en Excel</button>
      <br>
      Deudores: 
       <button onclick="window.location.href = 'descargarReportes.php?sent=5';">Descargar en PDF</button> 
        <button onclick="window.location.href = 'descargarReportes.php?sent=6';">Descargar en Excel</button>
      <br>
      Estado de cuentas:
       <button onclick="window.location.href = 'descargarReportes.php?sent=7';">Descargar en PDF</button> 
        <button onclick="window.location.href = 'ruta-de-la-pagina';">Descargar en Excel</button>
      <br>
    </h2>
  </div>

</div>
  
</body>
</html>