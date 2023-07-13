
<?php
function bandejaEntrada($respuesta){
?>
<table id="workers_table" class="table" style="width:100%;">
<thead>
              <tr>
    <?php
               
                echo "<th style=\"border-right: 1px solid #F9F9F9; text-align: center;\"> # </th>";
                echo "<th style=\"border-right: 1px solid #F9F9F9; text-align: center;\"> Nombre Estudiante </th>";
                echo "<th style=\"border-right: 1px solid #F9F9F9; text-align: center;\"> Nombre Padre </th>";
                echo "<th style=\"border-right: 1px solid #F9F9F9; text-align: center;\"> Curso </th>";
                echo "<th style=\"border-right: 1px solid #F9F9F9; text-align: center;\"> Grado </th>";
                echo "<th style=\"border-right: 1px solid #F9F9F9; text-align: center;\"> Saldo </th>";
                echo "<th style=\"border-right: 1px solid #F9F9F9; text-align: center;\">  Ver Detalles </th>";
               
    ?>
              </tr>
            </thead>
            <tbody>
              <?php
             
    foreach ($respuesta as $fila) {

      // code...
      echo "<tr style=\"text-align: center; \">";
      echo "<td style=\"border-right: 1px solid #F9F9F9\">{$fila['eid']} </td>";
      echo "<td style=\"border-right: 1px solid #F9F9F9;\"> ";
      echo "{$fila['en']}  {$fila['eap']}
        </td>";


      echo "<td style=\"border-right: 1px solid #F9F9F9\"> {$fila['pn']} {$fila['pap']} </td>";
      echo "<td style=\"border-right: 1px solid #F9F9F9\"> {$fila['ec']} </td>";
      echo "<td style=\"border-right: 1px solid #F9F9F9\"> {$fila['eg']} </td>";
      echo "<td style=\"border-right: 1px solid #F9F9F9\"> {$fila['ps']} </td>";
      
      echo "<form action=\"#\" method=\"post\">";
      $descripcion = "{$fila['descripcion_doc']}";
      $id_origen = "{$fila['oop']}";
      echo "<input name=\"desc\" type=\"hidden\" value=\"$descripcion\">";
      echo "<input name=\"id_o\" type=\"hidden\" value=\"$id_origen\">";
      echo "<input name=\"point\" type=\"hidden\" value=\"10\">"; 
      echo "<td style=\"border-right: 1px solid #FDFEFE\">";
      echo "<input type=\"submit\" style=\"background: #071655; width: 100px; color: white\" value=\"Detalle\" formaction=\"detalle_alumno.php?usuario={$fila['eid']}-{$fila['pid']}\">";
      echo "</td>";
      echo "</form>";
      echo "</tr>";
    }
    ?>
             
            </tbody>
          </table>
<?php
}
?>

<?php
function bandejaEntradaCaf($respuesta){
?>
<table id="workers_table" class="table" style="width:100%;">
<thead>
              <tr>
    <?php
               
                echo "<th style=\"border-right: 1px solid #F9F9F9; text-align: center;\"> # </th>";
                echo "<th style=\"border-right: 1px solid #F9F9F9; text-align: center;\"> Nombre Estudiante </th>";
                echo "<th style=\"border-right: 1px solid #F9F9F9; text-align: center;\"> Nombre Padre </th>";
                echo "<th style=\"border-right: 1px solid #F9F9F9; text-align: center;\"> Curso </th>";
                echo "<th style=\"border-right: 1px solid #F9F9F9; text-align: center;\"> Grado </th>";
                echo "<th style=\"border-right: 1px solid #F9F9F9; text-align: center;\"> Saldo </th>";
                echo "<th style=\"border-right: 1px solid #F9F9F9; text-align: center;\">  Ver Detalles </th>";
               
    ?>
              </tr>
            </thead>
            <tbody>
              <?php
             
    foreach ($respuesta as $fila) {

      // code...
      echo "<tr style=\"text-align: center; \">";
      echo "<td style=\"border-right: 1px solid #F9F9F9\">{$fila['eid']} </td>";
      echo "<td style=\"border-right: 1px solid #F9F9F9;\"> ";
      echo "{$fila['en']}  {$fila['eap']}
        </td>";


      echo "<td style=\"border-right: 1px solid #F9F9F9\"> {$fila['pn']} {$fila['pap']} </td>";
      echo "<td style=\"border-right: 1px solid #F9F9F9\"> {$fila['ec']} </td>";
      echo "<td style=\"border-right: 1px solid #F9F9F9\"> {$fila['eg']} </td>";
      echo "<td style=\"border-right: 1px solid #F9F9F9\"> {$fila['ps']} </td>";
      
      echo "<form action=\"#\" method=\"post\">";
      $descripcion = "{$fila['descripcion_doc']}";
      $id_origen = "{$fila['oop']}";
      echo "<input name=\"desc\" type=\"hidden\" value=\"$descripcion\">";
      echo "<input name=\"id_o\" type=\"hidden\" value=\"$id_origen\">";
      echo "<input name=\"point\" type=\"hidden\" value=\"10\">"; 
      echo "<td style=\"border-right: 1px solid #FDFEFE\">";
      echo "<input type=\"submit\" style=\"background: #071655; width: 100px; color: white\" value=\"Detalle\" formaction=\"detalle_alumno_caf.php?usuario={$fila['eid']}-{$fila['pid']}\">";
      echo "</td>";
      echo "</form>";
      echo "</tr>";
    }
    ?>
             
            </tbody>
          </table>
<?php
}
?>

  

<?php
function bandejaDetalle($respuesta){
?>
<table id="workers_table" class="table" style="width:100%; ">
<thead>
              <tr>
    <?php
               
               
                echo "<th style=\"border-right: 1px solid #FDFEFE\"> Nombre Estudiante </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE\"> Curso </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE\"> Grado </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE\"> QR </th>";
             
               
    ?>
              </tr>
            </thead>
            <tbody>
              <?php
             
    foreach ($respuesta as $fila) {

      // code...
      echo "<tr style=\"text-align: center; \">";
      echo "<td style=\"border-right: 1px solid #FDFEFE;\"> ";
      echo "{$fila['en']}  {$fila['eap']}
        </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['ec']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['eg']} </td>";
       echo "<td>";
      echo "<form action=\"#\" method=\"post\">";
      ?>
        <button id="openPopup" style="background: #071655; width: 100px; color: white">Ver QR</button>
      <?php
      echo "</td>";
      echo "</form>";
      echo "</tr>";
    }
    ?>
             
            </tbody>
          </table>
<?php
}
?>

<?php
function bandejaDetalleCaf($respuesta){
?>
<table id="workers_table" class="table" style="width:100%; ">
<thead>
              <tr>
    <?php
               
               
                echo "<th style=\"border-right: 1px solid #FDFEFE\"> Nombre Estudiante </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE\"> Curso </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE\"> Grado </th>";
             
               
    ?>
              </tr>
            </thead>
            <tbody>
              <?php
             
    foreach ($respuesta as $fila) {

      // code...
      echo "<tr style=\"text-align: center; \">";
      echo "<td style=\"border-right: 1px solid #FDFEFE;\"> ";
      echo "{$fila['en']}  {$fila['eap']}
        </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['ec']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['eg']} </td>";
      echo "</form>";
      echo "</tr>";
    }
    ?>
             
            </tbody>
          </table>
<?php
}
?>

<?php
function bandejaPadre($respuesta){
?>
<table id="workers_table" class="table" style="width:100%;">
<thead>
              <tr>
    <?php
               
              
                echo "<th style=\"border-right: 1px solid #FDFEFE; text-align: center;\"> Nombre </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE; text-align: center;\"> Apellido </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE; text-align: center;\"> * </th>";
               
    ?>
              </tr>
            </thead>
            <tbody>
              <?php
             
    foreach ($respuesta as $fila) {

      // code...
      echo "<tr style=\"text-align: center; \">";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['pn']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['pap']} </td>";
      echo "<td>";
      echo "<form action=\"#\" method=\"post\">";
      echo "<input type=\"submit\" style=\"background: #071655; width: 100px; color: white\" value=\"Seleccionar\" formaction=\"creacionEstudiante2.php?padre={$fila['pid']}-{$fila['pn']}-{$fila['pap']}\">";
      echo "</td>";
      echo "</form>";
      echo "</tr>";
    }
    ?>
             
            </tbody>
          </table>
<?php
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