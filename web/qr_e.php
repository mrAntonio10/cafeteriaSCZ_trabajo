<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="containder-fluid">


	<div class="row justify-content-center align-items-center vh-100">
		<h1 style="text-align: center;">Como Escanear QR usando Instascan de HTML5</h1>
		<div class="col-lg-9">
			<video id="previsualizacion" class="p-1 border" style= "width:100%"></video>
		</div>

	</div>
</div>
<?php
$variable="Hola";
?>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<script type="text/javascript">
//var sonido = new Audio("barcode.wav");

var scanner = new Instascan.Scanner({
	video: document.getElementById('previsualizacion'),
	scanPeriod: 5,
	mirror: false
});

Instascan.Camera.getCameras().then(function(cameras) {
		scanner.start(cameras[0]);
	
}).catch(function(e){
	console.error(e);
	alert("ERROR:" + e);
});

scanner.addListener('scan', function(respuesta){
	//sonido.play();
	window.location.href =  respuesta;
	console.log("CONTENIDO: " + respuesta)
});
	
</script>
</body>
</html>