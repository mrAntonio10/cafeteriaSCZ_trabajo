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
}

$_SESSION["id"]=$id;
$_SESSION["funcionario"]=$fun;
$_SESSION["su"]=$su;

//if
if($su=='admin'){
	header("Location: ../adminprofile.php");
}
else if($su=='cafeteria'){
	header("Location: ../cafeteria.php");
}
else{
	unset($_SESSION["id"]);
	unset($_SESSION["funcionario"]);
	unset($_SESSION["su"]);
	header("Location: ../Index.php?alert=El usuario y contrasena no coinciden");
}

?>