<?php
    require "start.php";
    require "head.html";
    if( $_SESSION['user'] != "tecnico"){
    	header("location:index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>
	<h1>Área do Técnico</h1>
	<a href="mostrar.php"><button type="button" class="btn btn-success">Visualizar solicitações</button></a>
	<a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
</body>
</html>