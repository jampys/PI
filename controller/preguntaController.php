<?php
require_once("../lib/config.php");
require_once("../lib/Conection.php");
require_once("../model/encuestaModel.php");
$e=new Encuesta();



if($_POST['operacion']=='add'){ //insertar nueva pregunta
    $e->insert_pregunta($_POST['id'], $_POST['numero'], $_POST['descripcion_pregunta']);
}

if($_POST['operacion']=='delete'){ //eliminar una pregunta
    $e->delete_pregunta($_POST['id_pregunta']);
    //echo $_POST['id_pregunta'];
}

if($_POST['operacion']=='update'){ //modificar una pregunta
    $e->update_pregunta($_POST['id_pregunta'], $_POST['numero'], $_POST['descripcion_pregunta']);
    //echo $_POST['id_pregunta'];
}



$datos=$e->get_preguntas_por_encuesta($_POST['id']);
require_once("../view/pregunta.phtml");

?>