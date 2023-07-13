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
     $localDateFormat = date('d/m/Y');

      ?>
      <b>Usuario:</b> <?php echo $usuario; ?>
    </div>
    <div>
      <b> Fecha: </b><?php echo $localDateFormat; ?>
    </div>

  </div>
  <div style="width: 25%; text-align: right; padding-right: 30px;">
    <input class="boton" type="submit" name="LogOut" value="Log Out" title="Log Out" onclick="window.location.href='LogOut.php'" >
  </div>
</div>
<div class="boton fondo_azul">
  <div style="width: 20%;">
    <input class="boton" type="submit" name="Buscador" value="Buscador" title="Buscador" onclick="window.location.href='adminprofile.php'" >
  </div>
  <div style="width: 20%;">
    <input class="boton" type="submit" name="Reportes" value="Reportes" title="Reportes" >
  </div>
  <div style="width: 20%;">
    <input class="boton" type="submit" name="AgregarPadre" value="Agregar Padre"  title="Agregar_Padre" onclick="window.location.href='creacionPadre.php'">
  </div>
  <div style="width: 20%;">
    <input class="boton" type="submit" name="AgregarDocente" value="Agregar Docente"  title="Agregar_Docente" onclick="window.location.href='creacionDocente.php'">
  </div>
  <div style="width: 20%;">
    <input class="boton" type="submit" name="AgregarEstudiante" value="Agregar Estudiante" title="Agregar_Estudiante" onclick="window.location.href='creacionEstudiante.php'">
  </div>
</div>

</head>
<body>

