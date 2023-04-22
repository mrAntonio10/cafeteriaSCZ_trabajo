<?php

//DATOS EXTRAS
include("../include/conf.phpinc");
include("../include/func.phpinc");
include("../include/dbopen.php");

session_start();

//$usuario=$_POST['USER'];
//$contrasena=$_POST['PASS'];
$contador=0;


$str = "SELECT id_admin,Usuario,Tipo FROM admin where Usuario ='$user' and contrasena = '$pass';";
$res = query($str);
foreach($res as $fila){
	$id=$fila['id_admin'];
    $fun=$fila['Usuario'];
	$su=$fila['Tipo'];
	$contador=1;
}

$_SESSION["id"]=$id;
$_SESSION["funcionario"]=$fun;
$_SESSION["su"]=$su;
//usuario si tipo es admin
	//admin accede a todo el control
if ($su=='admin'){
	header("Location: ../cafeteria.php");
}
//usuario tipo cafeteria
else if($su=='cafeteria'){
	header("Location: ../cafeteria.php");
}
else if($contador==1){
	header("Location: MenuUsuario.php");
}
//En caso de no coincidir, volver a loguear
else {
	unset($_SESSION["id"]);
	unset($_SESSION["funcionario"]);
	unset($_SESSION["su"]);

	echo "<script language=\"JavaScript\">

	alert(\"El usuario y contrasena no coinciden\");
	window.location= '../Index.php';
	</script>";
}
include("dbclose.php");
?>