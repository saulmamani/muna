<?php
    //Seguridad: manteniendo la session del usuario activo
    session_start(); 
    if((!isset($_SESSION['IdUsuario'])))
        header("Location:index.php");
?>
<html>
    <head>
        <title>Mu&ntilde;a</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="css/jumbotron-narrow.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation"><a href="libros.php">Libros</a></li>
                        <li role="presentation" class="active"><a href="aportar.php">Aportar</a></li>
                        <li role="presentation"><a href="perfil.php?id=<?php echo $_SESSION['IdUsuario']; ?>">Mi Perfil</a></li>
                        <li role="presentation"><a href="index.php">Salir</a></li>
                    </ul>
                </nav>
                <h3 class="text-muted"><span class="glyphicon glyphicon-grain"></span> Mu&ntilde;a</h3>
            </div>
            
        <div style="margin: 0 auto; max-width: 350px;">
        <h3>Aportar Libro</h3>
        <p style="text-align: right;">
                     <a href="javascript:abrirVentanaTutor('tutor/tutor_aporte.html')" data-toggle="tooltip" title="Ataques" id="btnAtaque">Ataque <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                     || <a href="javascript:abrirVentanaTutor('tutor/tutor_aporte.html#defensa')" data-toggle="tooltip" title="Defensas" id="btnAyuda">Defensa <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a>
         </p>
         
        <form name="frmLogin" action="aportarController.php" method="post" class="form-horizontal" role="form"  enctype="multipart/form-data">
            <label for="txtCuenta">Titulo:<br> </label><input type="text" class="form-control" name="txtTitulo" value="" required /><br/>
            <label for="txtClave">Autor:<br> </label><input type="text" class="form-control" name="txtAutor" value="" required /><br/>
            <label for="txtNombre">Descripción:<br> </label><textarea name="txtDescripcion" rows="2" cols="20" class="form-control"value="" required ></textarea><br/>
            <label for="txtDesc">Portada: (*.jpg, *.png)<br> </label><input type="file" class="file" name="txtPortada" required /><br/>
            <label for="txtDesc">Archivo (URL):<br> </label><input type="url" class="form-control" value="http://" name="txtArchivo" required />(Escriba la dirección url del archivo *.pdf)<br/><br/>
            <input type="submit" value="Aceptar" name="btnAceptar" class="btn btn-lg btn-success" />
            <a href="libros.php">(Cancelar)</a>
        </form>
        </div>
        
        <hr>
        <footer>
            &copy; Ing. Saul Mamani
        </footer>
        </div>
    </body>
    
<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
</html>