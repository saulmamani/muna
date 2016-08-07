<?php
    session_start();
    
    $cuenta = (!isset($_GET['txtCuenta']))?'':$_GET['txtCuenta'];
    $clave = (!isset($_GET['txtClave']))?'':$_GET['txtClave'];
    
    include('Usuario.class.php');
    $obj = new Usuario();
    $res = $obj->Autenticar("$cuenta", "$clave");

    if($res)
    {
		//Seguridad: Variables de session para evitar que tengan acceso directo desde la url a usuario no autenticados
        $_SESSION['Cuenta'] = $cuenta;
        $_SESSION['IdUsuario'] = $res;
        echo "<script type='text/javascript'>window.location.href = 'libros.php';</script>";
    }
    else
    {
        echo "<p>Cuenta o Clave Incorrectos!!!</p>";
    }