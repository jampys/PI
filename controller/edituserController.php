<?php

require_once("model/userModel.php");
$u=new Usuarios();

if(isset($_POST["grabar"])and $_POST["grabar"]=="si"){
    $u->edit_user();
    exit;
}

$datos=$u->get_usuarios_por_id();
require_once("view/edituser.phtml");
?>