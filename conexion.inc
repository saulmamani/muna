<?php
	function conectar()
	{
	 	$servidor = "localhost";
		$cuenta = "root";
		$password = "root";
		$database = "malditawebd";
		
		$conexion = mysql_connect($servidor,$cuenta,$password);
		mysql_select_db($database,$conexion);
		return $conexion;	
	}
	
	function cerrar_conexion($cadcon)
	{
           mysql_close($cadcon);
	}