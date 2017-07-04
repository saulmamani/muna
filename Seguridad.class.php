<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Seguridad
 *
 * @author SAUL
 */
abstract class Seguridad {
    //put your code here
        
    protected function sanatizar($dato)
    {
        // limpiando espacion en blanco
        $dato = trim($dato);
        // aplicando stripslashes si magic_quotes_gpc esta permitido
        if(get_magic_quotes_gpc())
        {
            $dato = stripslashes($dato);
        }
        // un mySQL connection es requerido antes de usar esta funcion
        $dato = mysqli_real_escape_string($this->conexion,$dato);
        return $dato;
    }	
	 
    protected function MyQuery($query)
    {
		//$res = mysqli_query($query, $this->conexion);
		$res = $this->conexion->query($query);
        cerrar_conexion($this->conexion);
		mysqli_free_result($result);
        return $res;
    }
}
