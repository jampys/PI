<?php

require_once("model/userModel.php");
$u=new Usuarios();
$datos=$u->get_usuarios();
require_once("view/veruser.phtml");

?>