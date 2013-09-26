<?php

if(isset($_SESSION["ses_id"]))
{
    header("Location: ".Conectar::ruta()."?accion=index");
}

require_once("model/userModel.php");
$u=new Usuarios();


/*if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    $u->logueo();
    exit;
}*/



//agregado ahora
if (isset($_POST['stage']) && 'validaUsuario' == $_POST['stage']&& isset($_POST['USUARIO'])&& isset($_POST['PASWORD'])){
    $id=$u->isAValidUser($_POST['USUARIO'],$_POST['PASWORD']);

    if($id>=1){
        $_SESSION["ses_id"]=$id;
        $_SESSION["foto"]=$_POST["USUARIO"];
        header("Location: ".Conectar::ruta()."?accion=index");
    }
    else
    {
        if($id=0){
            $_SESSION["error"]="USUARIO DESHABILITADO";
            header("Location: ".Conectar::ruta()."?accion=error");
        }
        if($id=-1){
            $_SESSION["error"]="DISCULPE, USUARIO O CONSTRASEÑA INVALIDOS";
            header("Location: ".Conectar::ruta()."?accion=error");
        }
    }

}
//fin agregado ahora

require_once("view/login.phtml");
?>