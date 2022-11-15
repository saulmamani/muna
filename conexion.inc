<?php

function conectar()
{
    $servidor = "127.0.0.1";
    $cuenta = "root";
    $password = "rootsaul";
    $database = "malditawebd";

    $conexion = new mysqli($servidor, $cuenta, $password);
    $conexion->select_db($database);

    return $conexion;
}

function cerrar_conexion($cadcon)
{
    mysqli_close($cadcon);
}