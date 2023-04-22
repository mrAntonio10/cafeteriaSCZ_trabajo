<?php
function bandejaEntrada($respuesta){
?>
<table id="workers_table" class="table table-dark" style="width:100%">
<thead>
              <tr>
    <?php
               
                echo "<th style=\"border-right: 1px solid #FDFEFE\"> # </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE\"> Nombre Estudiante </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE\"> Nombre Padre </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE\"> Curso </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE\"> Grado </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE\"> Saldo </th>";
                echo "<th style=\"border-right: 1px solid #FDFEFE\">  Ver Detalles </th>";
               
    ?>
              </tr>
            </thead>
            <tbody>
              <?php
             
    foreach ($respuesta as $fila) {

      // code...
      echo "<tr style=\"text-align: center; \">";
      echo "<td style=\"border-right: 1px solid #FDFEFE\">{$fila['eid']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE;\"> ";
      echo "{$fila['en']}  {$fila['eap']}
        </td>";


      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['pn']} {$fila['pap']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['ec']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['eg']} </td>";
      echo "<td style=\"border-right: 1px solid #FDFEFE\"> {$fila['ps']} </td>";
      
      echo "<form action=\"#\" method=\"post\">";
      $descripcion = "{$fila['descripcion_doc']}";
      $id_origen = "{$fila['oop']}";
      echo "<input name=\"desc\" type=\"hidden\" value=\"$descripcion\">";
      echo "<input name=\"id_o\" type=\"hidden\" value=\"$id_origen\">";
      echo "<input name=\"point\" type=\"hidden\" value=\"10\">";
      echo "<td style=\"border-right: 1px solid #FDFEFE\">";
      echo "<input type=\"submit\" value=\"+\">";
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

  
            