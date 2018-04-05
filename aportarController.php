<?php
    session_start();
    $titulo= (!isset($_POST['txtTitulo']))?'':$_POST['txtTitulo'];
    $autor = (!isset($_POST['txtAutor']))?'':$_POST['txtAutor'];
    $desc = (!isset($_POST['txtDescripcion']))?'':$_POST['txtDescripcion'];
	$nombreArchivo = (!isset($_POST['txtArchivo']))?'':$_POST['txtArchivo'];
    $fkUsuario = $_SESSION['IdUsuario'];
    
    //datos de la portada
    $nombrePortada = basename($_FILES['txtPortada']['name']);
    $tipoPortada = $_FILES['txtPortada']['type'];
    $tamanoPortada = $_FILES['txtPortada']['size'];
    $dirPortada = $_FILES['txtPortada']['tmp_name'];
    
    //Seguridad: Controlando que no se suban archivos distintos a una imagen y eviantando ataques DDoS subiendo archivos de gran tamano
    /*if((!strpos($tipoPortada, "jpg") && !strpos($tipoPortada, "JPEG") && !strpos($tipoPortada, "png")) || ($tamanoPortada > 102400))
    {
        echo '<script type="text/javascript">alert("Error!!! Solo imagenes JPG o PNG y menores a 100KB!!")</script>';
        echo "<script type='text/javascript'>window.location.href = 'aportar.php';</script>";
        return;
    }
    else*/
    {
        //subiendo archivos al servidor
        if (!move_uploaded_file($dirPortada, "portadas/".$nombrePortada))
        {
            echo '<script type="text/javascript">alert("Ha ocurrido un error al guardar la portada!!")</script>';
            echo "<script type='text/javascript'>window.location.href = 'aportar.php';</script>";
            return;
        }
    }
        
    include('Libro.class.php');
    $obj = new Libro();
    
    if ($obj->Insertar($titulo,$autor, $desc, "portadas/".$nombrePortada, $nombreArchivo, $fkUsuario)) 
    {
        echo '<script type="text/javascript">alert("Registrado Correctamente!!!")</script>';
        echo "<script type='text/javascript'>window.location.href = 'aportar.php';</script>";
    } 
    else 
    {
        echo '<script type="text/javascript">alert("Error!!!")</script>';
        echo "<script type='text/javascript'>window.location.href = 'aportar.php';</script>";
    }