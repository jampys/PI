<?php

require_once('model/encuestaModel.php');

//ver detalle de la encuesta
if(isset($_GET['stage'])&&$_GET['stage']=='detalle'){
    $idEncuesta=$_GET['id_encuesta'];
    $enc=new Encuesta();
    $encuesta=$enc->getEncuesta($idEncuesta);

}

//nueva encuesta
if (isset($_POST['stage']) && 'nuevo' == $_POST['stage']){
    $encuesta=new Encuesta();
    $conexion=$encuesta->conectarse();
    $nombre=$_POST['NOMBRE'];
    $descripcion_encuesta=$_POST['DESCRIPCION'];
    $fecha_creacion=$encuesta->cambia_fecha_a_mysql($_POST['FECHA_CREACION']);
    $comentario=$_POST['COMENTARIO'];
    if($encuesta->nuevaEncuesta($nombre,$descripcion_encuesta,$fecha_creacion,$comentario)){
        header("Location: ".Conectar::ruta()."?accion=verEncuestas");
    }
    else{
        $_SESSION['error']="ERROR al Crear la Encuesta";
        header("Location:error.php");
    }
}


//modificar encuesta
if (isset($_POST['stage']) && 'modificar' == $_POST['stage']){

    $encuesta=new Encuesta();
    $conexion=$encuesta->conectarse();
    $idEncuesta=$_POST['IDENCUESTA'];
    $nombre=$_POST['NOMBRE'];
    $descripcion_encuesta=$_POST['DESCRIPCION'];
    $fecha_creacion=$encuesta->cambia_fecha_a_mysql($_POST['FECHA_CREACION']);
//  $fecha_creacion=$_POST['FECHA_CREACION'];
    $comentario=$_POST['COMENTARIO'];


    if($encuesta->modificarEncuesta($idEncuesta,$nombre,$descripcion_encuesta,$fecha_creacion,$comentario))
    {
        header("Location: ".Conectar::ruta()."?accion=verEncuestas");


    }

    else
    {
        $_SESSION['error']="ERROR al MODIFICAR la  Encuesta";
        header("Location:error.php");
    }

}



require_once("view/encuesta.php");
?>
