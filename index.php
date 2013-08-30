<?php
//escapar caracteres espciales.. 
session_start();
include('phps/acceso.php');

if (isset($_POST['stage']) && 'validaUsuario' == $_POST['stage']&& isset($_POST['USUARIO'])&& isset($_POST['PASWORD']))
  { 
    $id=isAValidUser($_POST['USUARIO'],$_POST['PASWORD']);
	//echo $id;
	if($id>=1)
	   {
	   $_SESSION["usuario"]=$id;
	   header("Location:menu.php");
	   }
	else
	    {
	   if($id=0)
			{ $_SESSION["error"]="USUARIO DESHABILITADO";
			  header("Location:error.php");
			}
		if($id=-1)
			{ 
			  $_SESSION["error"]="DISCULPE, USUARIO O CONSTRASEÑA INVALIDOS";
			  header("Location:error.php");
			}
		}

  }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Acceso |Sistema Conceptual | UNPA UARG </title>
<style type="text/css">
<!--
.texto {
	font-family: Verdana, Arial;
	font-size: 9pt;
	font-weight: bold;
	color: #666666;
	text-decoration: none;
	text-align: center;
}
.encabezado {
	text-align: center;
}
.encabezado {
	text-align: center;
}
-->
</style>
</head>

<body>
<form id="FormularioAcceso" name="FormularioAcceso" method="post" action="">
  <p align="left" class="texto">&nbsp;</p>
  <p align="left" class="texto">Ingresa tus datos para acceder al sistema </p>
  <table width="432" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="f7f6f3">
    <tr>
      <td width="203" class="AplicantesTituloTab"><div align="left" class="texto">
        <div align="right"><strong>USUARIO:</strong></div>
      </div></td>
      <td width="6" class="AplicantesTituloTab">&nbsp;</td>
      <td width="223"><label>
        <input name="USUARIO" type="text" id="USUARIO" size="25" maxlength="20" class="texto"/>
      </label></td>
    </tr>
    <tr>
      <td class="AplicantesTituloTab"><div align="left" class="texto">
        <div align="right"><strong>PASWORD:</strong></div>
      </div></td>
      <td class="AplicantesTituloTab">&nbsp;</td>
      <td><label>
        <input name="PASWORD" type="password" id="PASWORD" size="25" maxlength="20" class="texto" />
        <input type="hidden" name="stage" value='validaUsuario' />
      </label></td>
    </tr>
    <tr>
      <td colspan="3"><label>
        <div align="center">
          <input type="submit" name="Submit" value="Ingresar"  class="texto"/>
        </div>
        </label></td>
    </tr>
  </table>
</form>
</body>
</html>