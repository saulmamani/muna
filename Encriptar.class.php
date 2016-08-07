<?php
/*class Encriptar
{
 
    private static $Key = "muna";
 
    public static function encrypt ($input) 
	{
        $output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(Encriptar::$Key), $input, MCRYPT_MODE_CBC, md5(md5(Encriptar::$Key))));
        return $output;
    }
 
    public static function decrypt ($input) 
	{
        $output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(Encriptar::$Key), base64_decode($input), MCRYPT_MODE_CBC, md5(md5(Encriptar::$Key))), "\0");
        return $output;
    }
}

$texto = "29";
 
// Encriptamos el texto
$texto_encriptado = Encriptar::encrypt($texto);
 
// Desencriptamos el texto
$texto_original = Encriptar::decrypt($texto_encriptado);

echo utf8_encode($texto_encriptado)."....".$texto_original;*/

function encryptionKey($username, $password, $ivseed = "!!!") {
    $username = strtolower($username);
    return array(hash("sha1", $password.$username), hash("sha1", $username . $ivseed));
}

function encrypt($data, $key) {
    return
            trim( base64_encode( mcrypt_encrypt(
                    MCRYPT_RIJNDAEL_256,
                    substr($key[0],0,32),
                    $data,
                    MCRYPT_MODE_CBC,
                    substr($key[1],0,32)
            )));
    }

function decrypt($data, $key) {
            return
                    mcrypt_decrypt(
                            MCRYPT_RIJNDAEL_256,
                            substr($key[0],0,32),
                            base64_decode($data),
                            MCRYPT_MODE_CBC,
                            substr($key[1],0,32)
                    );
}


$key = encryptionKey("saul", "mamani", "blahblahblah");
$cipherText = encrypt("26", $key);
$decryptedText = decrypt($cipherText, $key);

echo var_dump($cipherText).".....".$decryptedText;
?>