<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//Seguridad: manteniendo la session del usuario activo
session_start();
if ((!isset($_SESSION['IdUsuario'])))
    header("Location:index.php");

$id = (!isset($_GET['id'])) ? '' : $_GET['id'];

//Seguridad: para evitar ataques XSS, el aseguramos que el $id sea un n�mero y no un c�digo malisioso
//$bool = ( !is_int($id) ? (ctype_digit($id)) : true );
//if(!$bool)
//$id = 0;

include('Usuario.class.php');
$obj = new Usuario();
?>

<html>
<head>
    <title>Mu&ntilde;a</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
    <link href="css/jumbotron-narrow.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="container">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation"><a href="libros.php">Libros</a></li>
                <li role="presentation"><a href="aportar.php">Aportar</a></li>
                <li role="presentation" class="active"><a href="perfil.php?id=<?php echo $_SESSION['IdUsuario']; ?>">Mi
                        Perfil</a></li>
                <li role="presentation"><a href="index.php">Salir</a></li>
            </ul>
        </nav>
        <h3 class="text-muted"><span class="glyphicon glyphicon-grain"></span> Mu&ntilde;a</h3>
    </div>

    <div style="text-align: center; margin-top: 10px">
        <h3><u>Mi Perfil</u></h3>
        <p style="text-align: right;">
            <a href="javascript:abrirVentanaTutor('tutor/tutor_perfil.html')" data-toggle="tooltip" title="Ataques"
               id="btnAtaque">Ataque <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
            || <a href="javascript:abrirVentanaTutor('tutor/tutor_perfil.html#defensa')" data-toggle="tooltip"
                  title="Defensas" id="btnAyuda">Defensa <span class="glyphicon glyphicon-question-sign"
                                                               aria-hidden="true"></span></a>
        </p>
        <p>Identificador: <?php echo utf8_encode($id); ?></p>

        <?php $result = $obj->VerPerfil($id); ?>
        <?php while ($f = mysqli_fetch_array($result)): ?>
            <p><strong>Cuenta: <?php echo utf8_encode($f['Cuenta']); ?></strong></p>
            <p>Clave: <?php echo $f['Clave']; ?></p>

            <p>Nombre: <?php echo utf8_encode((string)$f['Nombre']); ?></p>
            <!--Seguridad: Escapando las salidas para evitar inyecciones SQL XSS-->
            <!--<p>Nombre: <?php //echo htmlentities(utf8_encode($f['Nombre'])); ?></p>-->

            <p>Apellido: <?php echo utf8_encode($f['Apellido']); ?></p>
            <!--Seguridad: Escapando las salidas para evitar SQL inyecciones XSS-->
            <!--<p>Apellido: <?php //echo htmlentities(utf8_encode($f['Apellido'])); ?></p>-->

            <p align="right"><a href="libros.php">Volver...</a></p>
        <?php endwhile; ?>
    </div>
    <footer class="footer">
        <p>&copy; Ing. Saul Mamani M.</p>
    </footer>
</div>
</body>
<script type="text/javascript" src="js/jquery-2.1.4.js"></script>

</html>