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

  //idAdmin
  $id= $_SESSION['id'];

  $id_padre = $_GET['id_padre'];


  //query que debe tar en otro .php
   $query=("SELECT Nombre, Apellido, Saldo FROM padre WHERE id_padre=$id_padre");
   $respuesta=query($query);

   foreach ($respuesta as $fila) {
    $padre = "{$fila['Nombre']} {$fila['Apellido']}";
    $saldo = "{$fila['Saldo']}";
   }

//variables del FORMS
?>

      <div class="container" >
        <div class="row">
          <div class="col" style="margin-top: 60px">
            <?php
            	//TOP
      		echo "<a align='left'style=\"margin-left: 45px; font-size: 24px; color: #071655;\"> <b> Padre/ Madre: </b> $padre </a>  <br>";
          ?>
          <div class="col">
            <?php
      		    echo "<a style=\"margin-left: 45px; font-size: 24px; color: #071655;\"> <b> Saldo Actual: </b> $saldo Bs</a>";
            ?>
          </div>

          <br><br>

          </div>
        </div>

      </div>
      <div style="text-align: center ;">
        <a style="margin-left: 45px; font-size: 24px; color: #071655; text-align: center ;"><b>Agregar Saldo</b></a>
      </div>
      <div style="width: 100%; display:  flex;">
        <div style="text-align: right ; width: 50%;">
          <a style="margin-right: 45px; font-size: 24px; color: #071655; text-align: center ;"><b>Cantidad: </b></a>
        </div>
        <div style="text-align: left ; width: 50%;">
          <input style="margin-top: 5px;" placeholder="0.00 BS"  name="Monto" required type="number" min="0">
        </div>
      </div>

      <div style="width: 100%; display:  flex;">
        <div style="text-align: right ; width: 50%;">
          <a style="margin-right: 45px; font-size: 24px; color: #071655; text-align: center ;"><b>Tipo de pago: </b></a>
        </div>
        <div style="text-align: left ; width: 50%;">
          <select style="margin-top: 8px; color: #071655;" name="tipo_pago">
            <option value="Efectivo">Efectivo</option>
            <option value="Trasnferencia">Trasnferencia</option>
          </select>
        </div>
      </div>


</body>
</html>