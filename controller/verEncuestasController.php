<?php

require_once('model/encuestaModel.php');

//eliminar encuesta
if (isset($_GET['stage']) && 'eliminar' == $_GET['stage']){
	$id=$_GET['id_encuesta'];
	$enc=new Encuesta();
	//REVISAR CUANDO HAY QUE ELIMINAR y CUANDO NO LA ENCUESTA (SI TIENE ASOCIADO PREGUNTAS O VARIABLES NO SE DEBERIA ELIMINAR
	  
	  if($enc->eliminar($id)){
	    $mensaje='La Encuesta fue ELIMINADA con Exito';
	  }
	  else
		  {
		$_SESSION['error']= "ERROR al Eliminar la Encuesta, por favor verifique el estado del mismo" ; 
		header("Location:error.php"); 
		  }
	  
		
}

$enc=new Encuesta();
$encuestas=$enc->getEncuestas();

require_once("view/verEncuestas.php");

?>






