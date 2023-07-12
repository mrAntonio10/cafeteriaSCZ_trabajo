<?php
	//CatchDelQr
	
	$var1=$_REQUEST['sent'];
	//idAlumno e idPadre a debitar
	$var=explode("-",$var1);
	$idAlumno=$var[0];
	$debitarPadre = $var[1];
	$idAdmin = $var[2];

	//fecha actual
 $localDateFormat = date('Y-m-d');

echo "Hola: $idAlumno  + $debitarPadre + $idAdmin";
include("../include/dbopen.php");


// Iniciar la transacción
$dblink->begin_transaction(); // Desactivar el modo autocommit

// Ejecutar las operaciones dentro de la transacción
$sql1 = "INSERT INTO transaccion (id_estudiante, id_administrador, monto, fecha) VALUES ($idAlumno, $idAdmin, 20, '$localDateFormat');";
$result1 = $dblink->query($sql1);

$sql2 = "UPDATE padre SET Saldo = Saldo - 20 WHERE id_padre = $debitarPadre;";
$result2 = $dblink->query($sql2);
// Verificar si las operaciones fueron exitosas
if ($result1 && $result2) {
    // Confirmar la transacción
    $dblink->commit();
    echo "Transacción completada exitosamente.";
?>
	<script type="text/javascript">
		alert("Transacción completada exitosamente.");
	</script>
<?php
} else {
    // Deshacer la transacción
    $dblink->rollback();
    echo "Error en la transacción. Se deshicieron los cambios.";
}

// Cerrar la conexión a la base de datos
$dblink->close();

?>

