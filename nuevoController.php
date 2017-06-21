<?php

    $cuenta = (!isset($_POST['txtCuenta']))?'':$_POST['txtCuenta'];
    $clave = (!isset($_POST['txtClave']))?'':$_POST['txtClave'];
    $nombre = (!isset($_POST['txtNombre']))?'':$_POST['txtNombre'];
    $desc = (!isset($_POST['txtDesc']))?'':$_POST['txtDesc'];
    
    include('Usuario.class.php');
    $obj = new Usuario();
    
	//Comentar esta condicion y habilitar la condicion de abajo (Seguridad) para evitar ataques SPAN o DDoS
    if ($obj->Insertar($cuenta, $clave, $nombre, $desc)) 
    {
        echo '<script type="text/javascript">alert("Registrado Correctamente!!!")</script>';
        echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
    } 
    else 
    {
        echo '<script type="text/javascript">alert("Error!!!")</script>';
        echo "<script type='text/javascript'>window.location.href = 'nuevo.php';</script>";
    }

    
    //Seguridad: Aplicacion de Captcha para evitar SPAN o Ataques DDoS y nos llenen la base de datos con registros basura
    /*session_start();
    if (md5((!isset($_POST['txtCaptcha'])) ? '' : $_POST['txtCaptcha']) == $_SESSION['codigo_verificacion']) 
    {
        if ($obj->Insertar($cuenta, $clave, $nombre, $desc)) 
        {
            echo '<script type="text/javascript">alert("Registrado Correctamente!!!")</script>';
            echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
        } 
        else 
        {
            echo '<script type="text/javascript">alert("Error!!!")</script>';
            echo "<script type='text/javascript'>window.location.href = 'nuevo.php';</script>";
        }
    }
    else
    {
        echo '<script type="text/javascript">alert("Error!!! el código de seguridad no coinciden")</script>';
        echo "<script type='text/javascript'>window.location.href = 'nuevo.php';</script>";
    }*/
