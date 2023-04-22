<?php

//DATOS EXTRAS
include("../include/func.phpinc");
include("../include/dbopen.php");


//variables usadas antes
$user=$_POST['USER'];
$pass=$_POST['PASS'];
session_start();

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

//if
if($su=='admin'){
	header("Location: ../cafeteria.php");
}

else{
echo $_SESSION['funcionario'];
echo $_SESSION['su'];
}

?>