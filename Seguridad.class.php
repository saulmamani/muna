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
        return $res;
    }
/*
    protected function MyQueryParametrizado($query)
    {
        $stmt = $this->conexion->prepare($sql);
        // si la consulta $sql tiene parametros, debe colocarlos aqui, con su tipo de dato
        // ->bind_param('iss', $id, $par1. $par2);
        $stmt->bind_param('s', $par);

        $stmt->execute();
        $res = $stmt->get_result();
        $stmt->close();
        cerrar_conexion($this->conexion);

        return $res;

    }
    */
}
