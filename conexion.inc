<?php
	error_reporting(E_ALL ^E_NOTICE ^E_WARNING ^E_DEPRECATED);
	
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
