<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Didesweb</title>
	<style type="text/css"> 
		* { text-align: center;}
		#aside {
		  float: left;
		  width: 23%;
		  margin: 1%;
		  padding: 1%;
		  border: 1px solid #000;
		}
		#section {
		  float: left;
		  width: 72%;
		  font-size: 1.6em;
		  margin: 1% 0;
		  background-color: #ffffff;
		   border: 1px solid #000;
		}
		h2, h3 { text-transform:capitalize;}
		.box { 
			border:1px solid #000;
			width: 80%;
			margin: 1% 10%;
		}
	</style>
			<script type="text/javascript" src="../../../static/js/jquery-3.2.1.js"></script>
</head>
<body>
	<h1><a href="http://juanset.com">Juanset</a>
	<br>Bases disponibles en Segment</h1>
	<div id="main">
		<div id="aside">
			<?php include 'listado_tablas.php';?>
		</div>
		<div id="section">
			<div id="contenido"></div>
		</div>
		<script>
			$(document).ready(function(){	
				$(".enlaceajax").on("click", function(e){
					e.preventDefault();
					$("#contenido").load("traertablas.php");
				});
			});
			$(".f1").on("submit", function(e){
				e.preventDefault();
				$.post("traertablas.php", $(this).serialize(), function(respuesta){
					$("#contenido").html(respuesta);
				});
			});
		</script>
	</div>
		<script src="../../../static/js/materialize.js"></script>
	</body>
</html>