<?php


if(isset($_POST["grabar"])and $_POST["grabar"]=="si"){
    require_once("model/userModel.php");
    $u=new Usuarios();
    $u->add_user();
    exit;
}

require_once("view/adduser.phtml");
?>