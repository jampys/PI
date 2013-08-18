<?php
require('Connections/Conection.php');
/*
RETURN
1-n : el ID
0   : DESHABILITADO
-1  : NO ES USUARIO VALIDO
*/
function isAValidUser($USUARIO,$PASS)
{

$conexion = new Conection();
$conexion->connect();
$conexion->select_db();
$PASS=md5($PASS);
//echo $PASS;
//echo "----";
//echo $DNI;
$consulta="SELECT * FROM `administrador` WHERE `NOMBRE` ='$USUARIO' AND `pass`= '$PASS'";
$conexion->connect();
$resultset=$conexion->query($consulta) or die(mysql_error()); 	

//echo mysql_num_rows($resultset);

	if (mysql_num_rows($resultset)>=1)
		{
		 $registro=mysql_fetch_array($resultset);
		 if($registro['habilitado']==1)
			 return $registro['id'];
		 else return 0;
		}
	else
		{ return -1;
		}
}

/*
RETURN
1-n : el ID
0   : DESHABILITADO
-1  : NO ES USUARIO VALIDO
*/
function isAValidAdministratorUser($USER,$PASS)
{

$conexion = new Conection();
$conexion->connect();
$conexion->select_db();
$PASS=md5($PASS);
//echo $PASS;
//echo "----";
//echo $DNI;
$consulta="SELECT * FROM `rem_administrador` WHERE `NOMBRE` ='$USER' AND `pass`= '$PASS'";
$conexion->connect();
$resultset=$conexion->query($consulta) or die(mysql_error()); 	
//echo mysql_num_rows($resultset);

	if (mysql_num_rows($resultset)>=1)
		{
		 $registro=mysql_fetch_array($resultset);
		 if($registro['habilitado']==1)
			 return $registro['id'];
		 else return 0;
		}
	else
		{ return -1;
		}
}



?>