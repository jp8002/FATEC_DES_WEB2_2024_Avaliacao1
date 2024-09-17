<?php
	session_start();

	if (isset($_SESSION['user']) and $_SESSION['user'] == "coordenacao") {
		header("location:dash_coor.php");
	}

	elseif (isset($_SESSION['user']) and $_SESSION['user'] == "tecnico") {
		header("location:dash_tec.php");
	}

	else{
		header("location:index.php");
	}
?>