<?php
	error_reporting(E_ALL ^E_NOTICE ^E_WARNING ^E_DEPRECATED);
	
	function conectar()
	{
		$servidor = "127.0.0.1";
		$cuenta = "root";
		$password = "root";
		$database = "malditawebd";

		$conexion = new mysqli($servidor, $cuenta, $password);
		$conexion->select_db($database);

		return $conexion;
	}

	function cerrar_conexion($cadcon)
	{
		mysqli_close($cadcon);
	}
?>
