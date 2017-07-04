<?php
 
	error_reporting(E_ALL ^E_NOTICE ^E_WARNING ^E_DEPRECATED);

	function conectar()
	{
		$servidor = "localhost";
		$cuenta = "id1404838_das";
		$password = "malditaweb123";
		$database = "id1404838_malditawebd";

		$conexion = new mysqli($servidor, $cuenta, $password);
		$conexion->select_db($database);

		return $conexion;
	}

	function cerrar_conexion($cadcon)
	{
		mysqli_close($cadcon);
	}
?>