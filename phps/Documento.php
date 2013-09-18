<?php
# FileName="Documento.php"
# Type="php"
# Autor: Karim H
# Notas: 
require('Connections/Conection.php');
//por problemas con register_globals  setea a mano en OFF
//include('phps/funcionesSeciones.php');
//unregister_globals();
////por problemas con register_globals 
class Mercaderia 
{   var $conexion;
	function Cliente()
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
    #Funciones de Cliente
	#Retorna 1 si esta habilitado 0 si no esta habilitado -1 error (el usuario no estaba en la BD
	#esta fue mi primera funcion en php
	
	
	function eliminar($idMercaderia){
		
		
	    $conexion=$this->Conectarse();
		$consulta="DELETE FROM rem_mercaderia WHERE rem_mercaderia.id='$idMercaderia'";
		$resultset=$conexion->query($consulta) or die(mysql_error()); 
		if ($resultset==1)
		return 1;
		else
		return 0;
		
	}
	
	#Funcion que crea un cliente retornaq 1 si lo creo y 0 si no lo creo 
	
	function nuevoMercaderia($codigo,$descripcion,$precio)
	{	
	$conexion=$this->Conectarse();
	$sql = "INSERT INTO `rem_mercaderia` ( `id` , `codigo` , `descripcion` , `precio`)
VALUES (
'', '$codigo', '$descripcion', '$precio');";
	//echo $sql;
	$resultset=$conexion->query($sql); 
	if ($resultset==1)
	return 1;
	else
	return 0;
	}
	
	function getMercaderia($idMercaderia)
	{ 
    $consulta = "SELECT * FROM `rem_mercaderia`WHERE `id` ='$idMercaderia'";
				
    $conexion=$this->Conectarse();
	$resultset=$conexion->query($consulta) or die(mysql_error()); 
	$usuario = mysql_fetch_assoc($resultset);
			if(isset($usuario))
			return $usuario;
	
	}	
	
	
	
	
	
	function modificarMercaderia($idMercaderia,$codigo,$descripcion,$precio)
	{
	    $conexion=$this->Conectarse();
		$consulta="UPDATE `rem_mercaderia` SET 
		`codigo` = '$codigo',
		`descripcion` ='$descripcion',
		`precio` = '$precio'
		WHERE `id` ='$idMercaderia'";
		//echo $consulta;
		$resultset=$conexion->query($consulta) or die(mysql_error()); 
		if ($resultset==1)
		return 1;
		else
		return 0;
	
	}
	
    
	
	
	function getMercaderias() //MUESTRA TODAS Las Mercaderias
	{ 
     
    //$consulta = "SELECT * FROM rem_mercaderia ORDER BY `descripcion` ASC LIMIT 0 , 400";
      $consulta = "SELECT * FROM `rem_mercaderia` ORDER BY `descripcion` ASC LIMIT 0 , 500";    
 
    $conexion=$this->Conectarse();
	$resultset=$conexion->query($consulta) or die(mysql_error()); 
	while ($obj = mysql_fetch_assoc($resultset)) {
		$ord[ ] = $obj;
			}
			if(isset($ord))
			return $ord;
	}
	
	
	
	function estaAsignadaRemito($idMercaderia) //si esta o no asignada a algun remito esa mercaderia y el remito no fue eliminado
	{ 
    $consulta = "SELECT * FROM `rem_remito_mercaderia`, `rem_remito` WHERE rem_remito_mercaderia.id_mercaderia= '$idMercaderia' and rem_remito.estado != -1";
    $conexion=$this->Conectarse();
	
	$resultset=$conexion->query($consulta) or die(mysql_error());
	while ($obj = mysql_fetch_assoc($resultset)) {
		$ord[ ] = $obj;
			}
   if(isset($ord))
	        return 1;
			else return -1;
	}
	
	
	
	
	
	
	
}//clase Mercaderia

?>