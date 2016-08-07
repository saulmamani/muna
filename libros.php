<?php
    //Seguridad: manteniendo la session del usuario activo
    session_start(); 
    if((!isset($_SESSION['IdUsuario'])))
        header("Location:index.php");
    
    include('Libro.class.php');
    $obj = new Libro();
    $result = $obj->Listar();
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
        <h3>Lista de Libros</h3>
		<p style="text-align: right;">
                     <a href="javascript:abrirVentanaTutor('tutor/tutor_libros.html')" data-toggle="tooltip" title="Ataques" id="btnAtaque">Ataque <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                     || <a href="javascript:abrirVentanaTutor('tutor/tutor_libros.html#defensa')" data-toggle="tooltip" title="Defensas" id="btnAyuda">Defensa <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a>
         </p>
        
        <table  class="table table-bordered table-responsive table-striped">
            <tr>
            <td width="80%"><input type="text" name="txtBuscar" id="txtBuscar" value="" onkeyup="doSearch()"  placeholder="Buscar libro..." style="width: 100%" />
            <td><a href="aportar.php"> (+)Aportar</a> - <a href="aportarCifrado.php">(+)Encrypt</a></td>
            </tr>
        </table>
          
        <table  class="table table-bordered table-responsive table-striped" id="tListaLibros">
            <thead>
                <th>Codigo</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Descripción</th>
                <th></th>
            </thead>
            <tbody>
                <?php while($f = mysql_fetch_array($result)): ?>
                <tr>
                    <td><?php echo utf8_encode($f['IdLibro']); ?></td>
                    <td><?php echo htmlentities(utf8_encode($f['Titulo'])); ?></td>
                    <td><?php echo htmlentities(utf8_encode($f['Autor'])); ?></td>
                    <!--Seguridad: Escapando las salidas para evitar SQL inyecciones XSS-->
                    <td><?php echo utf8_encode($f['Descripcion']); ?></td>
                    <td><a href="detalleLibro.php?idLibro=<?php echo $f['IdLibro']; ?>">descargar</a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        </div>
      <footer class="footer">
        <p>&copy; Ing. Saul Mamani M.</p>
      </footer>
        </div>
    </body>
    <script src="js/jquery-2.1.4.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
           $('[data-toggle="tooltip"]').tooltip();  
        });
        function doSearch()
        {
                var tableReg = document.getElementById('tListaLibros');
                var searchText = document.getElementById('txtBuscar').value.toLowerCase();
                var cellsOfRow="";
                var found=false;
                var compareWith="";

                // Recorremos todas las filas con contenido de la tabla
                for (var i = 1; i < tableReg.rows.length; i++)
                {
                        cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                        found = false;
                        // Recorremos todas las celdas
                        for (var j = 0; j < cellsOfRow.length && !found; j++)
                        {
                                compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                                // Buscamos el texto en el contenido de la celda
                                if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
                                {
                                        found = true;
                                }
                        }
                        if(found)
                        {
                                tableReg.rows[i].style.display = '';
                        } else {
                                // si no ha encontrado ninguna coincidencia, esconde la
                                // fila de la tabla
                                tableReg.rows[i].style.display = 'none';
                        }
                }
        }
    </script>
</html>