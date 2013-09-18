<?php
session_start();
if(!isset($_SESSION["usuario"])){
		$_SESSION["error"]="No tiene permiso para ver esto!!!!";
        header("Location:error.php");		   
}
require_once('phps/Mercaderia.php');

if(isset($_GET['stage'])&&$_GET['stage']=='detalle')//viene de la tabla de administracion de avisos
  {
  $idMercaderia=$_GET['id_mercaderia'];
  $mer=new Mercaderia();
  $mercaderia=$mer->getMercaderia($idMercaderia);
  }



if (isset($_POST['stage']) && 'nuevo' == $_POST['stage'])
  { 
  $mercaderia=new Mercaderia();
  $conexion=$mercaderia->conectarse();
  $codigo=$_POST['CODIGO'];
  $descripcion=$_POST['DESCRIPCION'];
  $precio=$_POST['PRECIO'];
 
if($mercaderia->nuevoMercaderia($codigo,$descripcion,$precio))
  {
	  header("location:menu.php");
	  
  }
  
	  else
	  {
	   $_SESSION['error']="ERROR al Crear la Mercaderia"; 
	 header("Location:error.php"); 
	  }
	  
}//creo un nuevo Cliente

if (isset($_POST['stage']) && 'modificar' == $_POST['stage'])//modificar aviso!!!
  {
  
  $mercaderia=new Mercaderia();
  $conexion=$mercaderia->conectarse();
  $idMercaderia=$_POST['IDMERCADERIA'];
  $codigo=$_POST['CODIGO'];
  $descripcion=$_POST['DESCRIPCION'];
  $precio=$_POST['PRECIO'];
  

  
  if($mercaderia->modificarMercaderia($idMercaderia,$codigo,$descripcion,$precio))
  {  
       header("Location:verMercaderias.php"); 
	 
	  
  }
  
	  else
	  {
	 $_SESSION['error']="ERROR al MODIFICAR la Mercaderia"; 
	 header("Location:error.php"); 
	  }
	  
}//modificar aviso!!
  

  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>Mercaderia | Remitos | PANADERIA SANTA CRUZ</TITLE>
<script languaje = "javascript">
<!--

function Mensaje(MSG)
{
   alert(" "+MSG);
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>

<link rel="stylesheet" type="text/css" href="/estilos.css">
<link href="estilos.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="java_script/Validar.js" type="text/javascript"></script>
<style type="text/css">
<!--
.Estilo1 {color: #FF0000}
.Estilo2 {font-size: 18px}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></HEAD>
<BODY bgcolor = #FFFFFF LEFTMARGIN=0 TOPMARGIN=0 marginwidth=0 marginheight=0 STYLE="margin-top: 0px; margin-left: 0px">

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagenes/enc_fondo.jpg" >&nbsp;</td>
  </tr>
</table>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><p><img src="imagenes/iconos/logosmall.jpg" alt="" width="243" height="83" /></p></td>
    <td><img src="imagenes/iconos/repuestos.gif" alt="" width="60" height="60" align="right" /></td>
    | </tr>
</table>
<TABLE cellpadding="0" cellspacing="0" WIDTH="720" border="0" align="CENTER">
<TR>
						<TD WIDTH="8" BGCOLOR="#FFFFFF"></TD>
		<TD WIDTH="720" BGCOLOR="#FFFFFF" align="LEFT">
<TABLE cellSpacing=0 cellPadding=0 width=720 border=0 >

	<TR height=19>
		<TD height="19" colspan="4" vAlign=top class="TituloPosting"><div align="right">Datos de la Mercadeira</div></TD>
		</TR>
    <TR><TD width="13"></TD></TR>
</TABLE>

 <form action="" method="post" name="MERCADERIA" id="MERCADERIA">

<TABLE cellpadding=0 cellspacing=0 border=0 WIDTH="661">
    <TR>
    	<TD CLASS="textobold">
    		Los campos en <span class="Estilo1">rojo</span> deben completarse en forma obligatoria     	</TD>
    </TR>
</TABLE>

<TABLE cellSpacing=0 cellPadding=0 width=662 border=0>
	<TR height=20>
		<TD height="20" vAlign=top class="AplicantesTituloTab">Mercaderia </TD>
		</TR>
	<TR height=3><TD></TD></TR>
</TABLE>
<TABLE cellpadding="3" cellspacing=0 border=0 WIDTH="714" BGCOLOR="#FFFFFF">
    <TR height="10"><TD colspan="3"></TD></TR>
    <TR >
    <TD width="327" align="right" valign="top"><FONT class="AplicantesControl">Codigo</FONT><BR>
      <FONT class="AplicantesFooterApagado">Ingrese su codigo unico</FONT></TD>

    <TD width="11">&nbsp;</TD>
    <TD valign="top" width="358" align="left">
		<INPUT NAME="CODIGO" TYPE="TEXT" CLASS="AplicantesInput" id="CODIGO" onChange="javascript:this.value=this.value.toUpperCase();" value="<?php if (isset($mercaderia)) echo $mercaderia['codigo']?>" SIZE="20" MAXLENGTH="40">        </TD>
</TR>
    <TR >
      <TD align="right" valign="top"><FONT class="AplicantesControl">Descripcion</FONT><BR>
        <FONT class="AplicantesExplicacion">Ingrese la descripcion de la mercaderia</FONT></TD>
      <TD width="11">&nbsp;</TD>
      
      <TD valign="top" width="358" align="left">
        <INPUT NAME="DESCRIPCION" TYPE="TEXT" CLASS="AplicantesInput" id="DESCRIPCION" onChange="javascript:this.value=this.value.toUpperCase();" value="<?php if (isset($mercaderia))echo $mercaderia['descripcion']?>" SIZE="20" MAXLENGTH="40">	    </TD>
</TR>
    <tr >
      <td align="right" valign="top"><font class="AplicantesControl">Precio</font><br />
        <font class="AplicantesExplicacion">Precio en Pesos ($) de la mercaderia </font></td>
      <td>&nbsp;</td>
      <td valign="top" align="left"><span class="AplicantesInputTra">
          <input name="PRECIO" type="text" class="AplicantesInput" id="PRECIO" value="<?php if (isset($mercaderia))echo $mercaderia['precio']?>" size="10" maxlength="15" valign="MIDDLE" />
      </span></td>
    </tr>
    
    
    
    
    
	<TR height="10"><TD colspan="3"></TD></TR>
	 		
	</TABLE>
<TABLE WIDTH="722" border=0 background="imagenes/enc_fondo.jpg">
		    <BR>
		<TR>
	    <TD width="716" ALIGN="left" >
	      <a href="menu.php" class="AplicantesLink2">[Volver al Menu]</a>
	      <label>
	      <div align="center">
	        <input name="guardar" type="submit" id="guardar" value="Guardar" >
	        <input name="restablecer" type="reset" id="restablecer" value="Restablecer">
            <?php  if (isset($mercaderia))  {
				echo " <INPUT TYPE='HIDDEN' NAME='stage' VALUE='modificar'>"; 
				echo " <INPUT TYPE='HIDDEN' NAME='IDMERCADERIA' VALUE='" ?> <? echo $mercaderia['id']; echo "'>";
				
			      }
				
				else echo " <INPUT TYPE='HIDDEN' NAME='stage' VALUE='nuevo'>";?>

            
	        </div>
	      </label></TD>
          </TR>
</TABLE>
</FORM>
<!--VALIDACIONES DEL FORMULARIO-->
	 <script language="JavaScript" type="text/javascript">
 		var frmvalidator = new Validator("MERCADERIA");
		frmvalidator.addValidation("CODIGO","req");
		frmvalidator.addValidation("CODIGO","maxlen=100");
		frmvalidator.addValidation("DESCRIPCION","req");
		frmvalidator.addValidation("DESCRIPCION","maxlen=100");
		frmvalidator.addValidation("PRECIO","req");
		frmvalidator.addValidation("PRECIO","regexp=([0-9])*.[0-9]$");
		
	</script>
	 <!--VALIDACIONES DEL FORMULARIO-->
     </TD background="imagenes/enc_fondo.jpg">
		<TD WIDTH="8"  background="imagenes/enc_fondo.jpg"></TD>
  </TR>

</TABLE>
</div>
</body>
</html>
