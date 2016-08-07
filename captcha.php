<?php
session_start();
/*
Creación de una cadena aleatoria a partir de las funciones de fecha de php.
La función md5() retorna una cadena de 32 caracteres alfanuméricos, mediante el algoritmo de encriptación md5.
*/
$md5 = md5(microtime() * mktime());
/*
Para este ejemplo sólamente necesitamos 5 caracteres de los 32 que genera la función md5() por lo tanto escojemos los 5 primeros caracteres de la cadena.
*/
$string = substr($md5,0,5);
/*
A continuación creamos una imagen a partir de un fondo que hemos subido previamente al servidor. Generalmente este fondo se encuentra distorsionada.
*/
$captcha = imagecreatefrompng("./captcha.png");
/*
Editamos los colores de la imagen, tanto de los caracteres y de las líneas
*/
$color_letras = imagecolorallocate($captcha, 0, 0, 0);
$color_lineas = imagecolorallocate($captcha,100,100,100);

/*
Añadiremos unas cuantas líneas a nuestra imagen para evitar que que los robots lean el contenido de la imagen.
*/
imageline($captcha,rand(0,100),0,rand(0,50),50,$color_lineas);
imageline($captcha,rand(0,100),0,rand(0,50),50,$color_lineas);
imageline($captcha,rand(0,100),0,rand(0,50),50,$color_lineas);
imageline($captcha,rand(0,100),0,rand(0,50),50,$color_lineas);
/*
Ahora escribimos la cadena generada aleatoriamente en la imagen
*/
imagestring($captcha, 5, 20, 10, $string, $color_letras);
/*
Encriptamos la variable de sesión con la función md5() y la establecemos como una variable de sesión, para poder verificarla al enviar el formulario.
*/
$_SESSION['codigo_verificacion'] = md5($string);
/*
Devolvemos la imagen para mostrarla en el formulario.
*/
header("Content-type: image/png");

imagepng($captcha);
?>
