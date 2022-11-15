<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('Seguridad.class.php');

class Libro extends Seguridad
{
    var $conexion;

    public function __construct()
    {
        //realizando la conexion
        include("conexion.inc");
        $this->conexion = conectar();
    }

    public function BuscarPorId($id)
    {
        //Seguridad: Filtrado de datos papra evitar ataques del tipo inyección sql, xss, etc.
        //$bool = ( !is_int($id) ? (ctype_digit($id)) : true );
        //if(!$bool)
        //$id = 0;

        $sql = "Select * from libro where IdLibro = '$id'";
        return $this->MyQuery($sql);
    }

    public function Listar()
    {
        $sql = "Select * from libro Order By IdLibro Desc";
        return $this->MyQuery($sql);
    }

    public function Insertar($titulo, $autor, $descripcion, $portada, $url, $fkUsuario)
    {
        //Seguridad: Filtrado de datos papra evitar ataques del tipo inyección sql, xss, etc.
        //$titulo = $this->sanatizar($titulo);
        //$autor = $this->sanatizar($autor);
        //$descripcion = $this->sanatizar($descripcion);

        $descripcion = utf8_encode($descripcion);
        $sql = "Insert into libro values (null, '$titulo', '$autor', '$descripcion', '$portada','$url', '$fkUsuario')";
        return $this->MyQuery($sql);
    }

    public function Eliminar($id)
    {
        //Seguridad: Filtrado de datos papra evitar ataques del tipo inyección sql, xss, etc.
        //$id = $this->sanatizar($id);

        $sql = "Delete from libro IdLibro = '$id'";
        return $this->MyQuery($sql);
    }
}
