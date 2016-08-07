<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Seguridad
 *
 * @author SAUL
 */
abstract class Seguridad {
    //put your code here
        
    protected function sanatizar($dato)
    {
        // limpiando espacion en blanco
        $dato = trim($dato);
        // aplicando stripslashes si magic_quotes_gpc esta permitido
        if(get_magic_quotes_gpc())
        {
            $dato = stripslashes($dato);
        }
        // un mySQL connection es requerido antes de usar esta funcion
        $dato = mysql_real_escape_string($dato);
        return $dato;
		
	//$miCampoDeFormulario = strip_tags($_POST["nombreDeMiCampoDeFormulario"]);
    }
	
	  protected function sanatizarParam($parametro)
	  {
	  	  if(is_string($parametro))
		  {
		  	// Si el parámetro es una cadena retorna cadena
		  	return "'".mysql_scape_string($parametro)."'";
		  }
		  else if(is_array($parametro))
		  {
			  // Si es un array devolvemos una lista de los parámetros
			  // separados por comas.
			  $devolver = '';
			  foreach($parametro as $par)
			  {
				  // Cuando retorno es vacio ('') quiere decir que no
				  // tenemos que añadir la coma.
				  if($devolver == '')
				  {
				  	$devolver .= prepararParametro($par);
				  }
				  else
				  {
				  	$devolver .= ','.prepararParametro($par);
				  }
			  }
			  return $devolver;
		  }
		  else if($parametro == NULL)
		  {
			  // Si es nulo devolvemos la cadena 'NULL'
			  return 'NULL';
		  }
		  else
		  {
			  // Devolvemos el parametro.
			  return $parametro;
		  }
	  }
	  
	protected function preparedStatement($cons_sql, $param = array())
	{
		// Partimos la consulta por los símbolos de interrogación
		$partes = explode("?", $cons_sql);
		 
		$devolver = '';
		$num_parametros = count($param);
		 
		// Recorremos los parametros
		for($i = 0; $i < $num_parametros; $i++)
		{
		// Juntamos cada parte con el parametro correspondiente preparado
		//con la función antes creada.
		$devolver .= $partes[$i].prepareParam($param[$i]);
		}
	 
		$num_partes = count($partes);
		// Si hay más partes que parametros quiere decir que hay una parte final que hay que concatenar
		if($num_partes > $num_parametros)
		{
			$devolver.= $partes[$num_partes -1];
		}
		 
		// Devolvemos la consulta preparada
		return $devolver;
	}
	  
    protected function MyQuery($query)
    {
		$res = mysql_query($query, $this->conexion);
        cerrar_conexion($this->conexion);
		mysql_free_result($result);
        return $res;
    }
}
