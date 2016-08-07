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
        <div class="container" style="max-width: 350px;">
        <h3><span class="glyphicon glyphicon-grain"></span> Nuevo Usuario</h3>
        <hr>
           <p style="text-align: right;">
             <a href="javascript:abrirVentanaTutor('tutor/tutor_nuevo_usuario.html')" data-toggle="tooltip" title="Ataques" id="btnAtaque">Ataque <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
             || <a href="javascript:abrirVentanaTutor('tutor/tutor_nuevo_usuario.html#defensa')" data-toggle="tooltip" title="Defensas" id="btnAyuda">Defensa <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a>
          </p>
        <form name="frmLogin" action="nuevoController.php" method="post" class="form-horizontal" role="form">
            <label for="txtCuenta">Celular:<br> </label><input type="text" class="form-control" name="txtCuenta" value="" pattern="^[9|8|7|6]\d{7}$|^[9|8|7|6]\d{8}$" required /><br/>
            <label for="txtClave">Clave:<br> </label><input type="password" class="form-control" name="txtClave" value="" required /><br/>
            <label for="txtNombre">Nombre:<br> </label><input type="text" class="form-control" name="txtNombre" value="" required /><br/>
            <label for="txtDesc">Apellido:<br> </label><input type="text" class="form-control" name="txtDesc" value="" required /><br/>
            
            <!--Seguridad: Captcha para evitar SPAN o Ataques DDoS-->
            <!--<label for="txtCaptcha">Código de Seguridad:<br> </label><img src="captcha.php" /><input type="text" class="form-control" name="txtCaptcha" value="" required="" /><br/>-->
            
            <input type="submit" value="Aceptar" name="btnAceptar" class="btn btn-lg btn-success" />
            <a href="index.php">(Cancelar)</a>
        </form>
        <hr>
        <footer>
            &copy; Ing. Saul Mamani
        </footer>
        </div>
    </body>
    <script type="text/javascript" src="js/jquery-2.1.4.js"></script>

</html>