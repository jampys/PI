<?php
# FileName="Encuesta.php"
# Type="php"
# Autor: Karim H
# Notas: 
require('Connections/Conection.php');
//por problemas con register_globals  setea a mano en OFF
//include('phps/funcionesSeciones.php');
//unregister_globals();
////por problemas con register_globals 
class Encuesta 
{   var $conexion;
	function Encuesta()
	{
	$conexion = new Conection();
	$conexion->connect();
	$conexion->select_db();
	}
	function Conectarse()
	{
	$conexion = new Conection();
	$conexion->connect();
	$conexion->select_db();
	return $conexion;
	}
   
   //REVISAR CUANDO SE PUEDE Y CUANDO NO SE PUEDE ELIMINAR ENCUESTA 
   
   
	function eliminar($idEncuesta){
	    $conexion=$this->Conectarse();
		$consulta="DELETE FROM encuesta WHERE encuesta.id='$idEncuesta'";
		$resultset=$conexion->query($consulta) or die(mysql_error()); 
		if ($resultset==1)
		return 1;
		else
		return 0;
	}
	
	#Funcion que crea un Encuesta retorna 1 si lo creo y 0 si no lo creo 
	
	function nuevaEncuesta($nombre,$descripcion_encuesta,$fecha_creacion,$comentario)
	{	
	$conexion=$this->Conectarse();
	$sql = "INSERT INTO `encuesta` (`id`, `nombre`,`descripcion_encuesta`, `fecha_creacion`, `comentario`) VALUES (NULL, '$nombre','$descripcion_encuesta', '$fecha_creacion', '$comentario');";
	//echo $sql;
	$resultset=$conexion->query($sql); 
	if ($resultset==1)
	return 1;
	else
	return 0;
	}
	
	function getEncuesta($idEncuesta)
	{ 
    $consulta = "SELECT * FROM `encuesta`WHERE `id` ='$idEncuesta'";
				
    $conexion=$this->Conectarse();
	$resultset=$conexion->query($consulta) or die(mysql_error()); 
	$usuario = mysql_fetch_assoc($resultset);
			if(isset($usuario))
			return $usuario;
	
	}	
	
	
	
	
	
	function modificarEncuesta($idEncuesta,$nombre,$descripcion_encuesta,$fecha_creacion,$comentario)
	{
	    $conexion=$this->Conectarse();
		$consulta="UPDATE `encuesta` SET 
		`nombre` = '$nombre',
		`descripcion_encuesta` ='$descripcion_encuesta',
		`fecha_creacion` = '$fecha_creacion',
		`comentario`='$comentario'
		WHERE `id` ='$idEncuesta'";
		//echo $consulta;
		$resultset=$conexion->query($consulta) or die(mysql_error()); 
		if ($resultset==1)
		return 1;
		else
		return 0;
	
	}
	
	///////////////
	function getRemitosCliente($idCliente)
	{ 
    $consulta = "SELECT *
FROM `rem_cliente` , `rem_remito`
WHERE rem_cliente.id=rem_remito.id_cliente AND rem_cliente.id='$idCliente'";
    $conexion=$this->Conectarse();
	$resultset=$conexion->query($consulta) or die(mysql_error()); 
	while ($obj = mysql_fetch_assoc($resultset)) {
		$ord[ ] = $obj;
			}
			if(isset($ord))
			return $ord;
     }
	
    ///////////////
	
	
	function getEncuestas() //MUESTRA TODAS LAS ENCUESTAS
	{ 
    $consulta = "SELECT  * FROM 
			encuesta";
    $conexion=$this->Conectarse();
	$resultset=$conexion->query($consulta) or die(mysql_error()); 
	while ($obj = mysql_fetch_assoc($resultset)) {
		$ord[ ] = $obj;
			}
			if(isset($ord))
			return $ord;
	}
	
	
		function cambia_fecha_a_normal($fecha){ 
    ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha); 
    $lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1]; 
    return $lafecha; 
}

function cambia_fecha_a_mysql($fecha){ 
    ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha); 
    $lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1]; 
    return $lafecha; 
}  
	
	
}//clase Encuesta

?>