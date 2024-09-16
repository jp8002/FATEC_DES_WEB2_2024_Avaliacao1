<?php
	session_start();
	$_POST = array();
	session_destroy();
	header("location:index.php")

?>