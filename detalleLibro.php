<?php
//Seguridad: manteniendo la session del usuario activo
session_start(); 
if((!isset($_SESSION['IdUsuario'])))
    header("Location:index.php");

$idLibro = (!isset($_GET['idLibro'])) ? '' : $_GET['idLibro'];

include('Libro.class.php');
$obj = new Libro();
$result = $obj->BuscarPorId($idLibro);
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
                        <li role="presentation" class="active"><a href="libros.php">Libros</a></li>
                        <li role="presentation"><a href="aportar.php">Aportar</a></li>
                        <li role="presentation"><a href="perfil.php?id=<?php echo $_SESSION['IdUsuario']; ?>">Mi Perfil</a></li>
                        <li role="presentation"><a href="index.php">Salir</a></li>
                    </ul>
                </nav>
                <h3 class="text-muted"><span class="glyphicon glyphicon-grain"></span> Mu&ntilde;a</h3>
            </div>

            <div style="text-align: center; margin-top: 10px">
				<p style="text-align: right;">
                     <a href="javascript:abrirVentanaTutor('tutor/tutor_detallelibro.html')" data-toggle="tooltip" title="Ataques" id="btnAtaque">Ataque <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                     || <a href="javascript:abrirVentanaTutor('tutor/tutor_detallelibro.html#defensa')" data-toggle="tooltip" title="Defensas" id="btnAyuda">Defensa <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a>
                </p>
                
                <?php while ($f = mysql_fetch_array($result)): ?>
                 <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <img src="<?php echo $f['Portada']; ?>" width="160px" height="217px"   alt="Portada" /><br/><br/>
                        <a href="<?php echo utf8_encode($f['Url']);?>" class="btn btn-success"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Descargar</a>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Titulo: <?php echo utf8_encode($f['Titulo']); ?></strong></p>
                        <p>Autor: <?php echo utf8_encode($f['Autor']); ?></p>
                        
						<p>Descripcion: <?php echo utf8_encode($f['Descripcion']); ?></p>
						<!--Seguridad: Escapando las salidas para evitar SQL inyecciones XSS-->
						<!--<p>Descripcion: <?php echo htmlentities(utf8_encode($f['Descripcion'])); ?></p>-->
						
                        <p>Gentileza de: <?php echo ($f['FkUsuario']); ?></p>
                        <p align="right"><a href="libros.php">Volver...</a></p>
                    </div>
                    <div class="col-md-2"></div>
                 </div>
                <?php endwhile; ?>
            </div>
      <footer class="footer">
        <p>&copy; Ing. Saul Mamani M.</p>
      </footer>
        </div>
    </body>
<script type="text/javascript" src="js/jquery-2.1.4.js"></script>

</html>