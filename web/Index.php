<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
//INCLUDES PARA UTILIZAR EN LA PAGINA
include_once("include/conf.phpinc");
include("include/func.phpinc");
include("include/dbopen.php");
$default_style = "style_form";
//Cookies 
$USER = $_POST['USER'];
$PASS = $_POST['PASS'];
$fijo= $_POST['FIJO'];
setcookie("USER", $USER);
setcookie("PASS", $PASS);

//HEADER
?>
<head>
  <title>
    .: Cafeteria SCIS :.
  </title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100"  style="background-color:#030428;">

<form action="query/VerificacionLogIn" method="post">
 
  <div class="bg-white p-5 rounded-5 text-secondary shadow" style= "width: 25rem">

  <div class="d-flex justify-content-center">
  <img src="include/logo.png" alt="login-icon" style= "height: 15rem" >
  </div>
  
  <div class="text-center fs-1 fw-bold">
  Cafeteria SCIS
  </div>

  <div class="input-group mt-4">
  <input  class="form-control bg-light" placeholder="User"  name="USER" required style="text-align:" type="text"> 
  </div>

  <div class="input-group mt-1">
  <input class="form-control bg-light" type="password" placeholder="Password"  name="PASS" required style="text-align:">
  </div>

  <div>
  <input type="hidden"  class="btn d-grid gap-2 col-12 mx-auto" name="FIJO" value="1">
  </div>


  <div class="btn btn-warning w-100 mt-4 fw-bold shadow">
  <input type="submit"  class="btn d-grid gap-2 col-12 mx-auto" name="accion" value="Log in" >
  </div>

  </div>  

  </form>
</body>