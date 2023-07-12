<?php
session_start();

unset($_SESSION["id"]);
unset($_SESSION["funcionario"]);
unset($_SESSION["su"]);

header("Location: Index.php");
?>