<?php
	//CatchDelQr
	
	$var1=$_REQUEST['sent'];
	//idAlumno e idPadre a debitar
	$var=explode("-",$var1);
	$idAlumno=$var[0];
	$debitarPadre=$var[1];

echo "hola :D $idAlumno $debitarPadre";

?>