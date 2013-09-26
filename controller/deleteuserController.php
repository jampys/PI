<?php
//este controlador no tendra vista asociada. Ya que se encarga solo de eliminar el usuario.

require_once("model/userModel.php");
$u=new Usuarios();
$u->delete_user();

?>