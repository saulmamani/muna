<?php 
     //Seguridad: destruyendo todas las sessiones del usuario en la Logout
    session_start();
    session_destroy();
?>
<html>
    <head>
        <title>Mu&ntilde;a</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="icono.ico" />
        
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="css/signin.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
        	.acercaDe a {
				text-decoration:none;
				color:#BBB;
				background-color:
			}
        </style>
    </head>
    <body> 
        <div class="container">
            <div class="row">
              <div class="col-lg-3"></div>
              <div class="col-lg-6" style="text-align: center; top: 30px;">
                  <p style="text-align: right;">
                     <a href="javascript:abrirVentanaTutor('tutor/tutor_login.html')" data-toggle="tooltip" title="Ataques" id="btnAtaque">Ataque <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                     || <a href="javascript:abrirVentanaTutor('tutor/tutor_login.html#defensa')" data-toggle="tooltip" title="Defensas" id="btnAyuda">Defensa <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a>
                  </p>
                   <h2><span class="glyphicon glyphicon-grain"></span> MU&Ntilde;A<span class="glyphicon glyphicon-grain"></span></h2> 
                   <h5> v0.9 beta</h6> 
                    <form class="form-signin" data-example-id="input-group-multiple-buttons">

                    <label for="txtCuenta" class="sr-only">Usuario</label>
                    <input type="text" id="txtCuenta" class="form-control" placeholder="Cuenta o Numero de Celular" required autofocus> 
                    
                    <label for="txtClave" class="sr-only">Password</label>
                    <input type="password" id="txtClave" class="form-control" placeholder="Password" required>
                    
                    <button id="btnAceptar" class="btn btn-lg btn-primary btn-block" type="button">Ingresar</button>
                    <div id='res' style="margin-top: 10px"></div>
                    
                    <p><a href="nuevo.php">(Regístrate para obtener una cuenta)</a></p>
                                        
                    <div class="alert alert-warning" role="alert" style="margin-top: 25px;">
                        <span class="sr-only">Mu&ntilde;a</span>
                        <strong>Bienvenidos: <br/>
                      </strong>Esta es una aplicación vulnerable para practicar seguridad y hacking de aplicaciones y servicios web.
                        <p><br/>
                        </p>
                    </div>
                    
                    <div class="acercaDe">
                    <p align='center' style="color: #ccc"><a href="http://www.somosdas.com" target="_blank" >&copy; Ing. Saul Mamani</a><br/>
                    <a href="https://twitter.com/kanito777" target="_blank" >@kanito777</a><br/>
                     <a href="tel:76137269">+591 76137269</a><br/>
                     <a href="mailto:luas0_1@yahoo.es">luas0_1@yahoo.es</a></p>
                    </div>
                  </form>
              </div>
              <div class="col-lg-3"></div>
            </div>
        </div>
        
    </body>
    <script src="js/jquery-2.1.4.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
           $("#btnAceptar").click(function(){
              var cuenta = $("#txtCuenta").val(); 
              var clave = $("#txtClave").val();
              
              $("#res").html('<img src="images/ajax.gif" alt=""/>');
              $.get('autenticar.php', {txtCuenta:cuenta, txtClave:clave}, function(datos){
                 $("#res").html(datos); 
              });
           });
        });        
    </script>
</html>