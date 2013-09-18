<?php
session_start();
if(!isset($_SESSION["usuario"])){
		$_SESSION["error"]="No tiene permiso para ver esto!!!!";
        header("Location:error.php");		   
}
require_once('phps/Mercaderia.php');

	
if (isset($_GET['stage']) && 'eliminar' == $_GET['stage'])//preciono eliminar Mercaderia
{     ;
	$id=$_GET['id_mercaderia'];
	$merc=new Mercaderia();
	
	 if($merc->estaAsignadaRemito($id)==-1)
	        if($merc->eliminar($id))
	           {
		    
			 $deshabilitada=1;
			 
		       }
			   else
			   { 
       $_SESSION['error']="ERROR al Eliminar la mercaderia, la misma esta asignada a algun REMITO"; 
	 header("Location:error.php"); 
		      }
		else
	  {
	 $_SESSION['error']="ERROR al Eliminar la mercaderia, la misma esta asignada a algun REMITO"; 
	 header("Location:error.php"); 
	  }
		
		
}//preciono cancelar orden	

$mercaderia=new Mercaderia();
$mercaderias=$mercaderia->getMercaderias();

?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<HEAD>
<TITLE>Administracion de Mercaderia | PANADERIA SANTA CRUZ</TITLE>
<link rel="stylesheet" type="text/css" href="/estilos.css">
<link href="estilos.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="java_script/Validar.js" type="text/javascript"></script>
<style type="text/css">
<!--
.Estilo2 {color: #FF0000}
strong {
	text-align: center;
}
.texto table {
	text-align: center;
}
td {
	text-align: center;
}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></HEAD>
<BODY marginwidth=0 marginheight=0 STYLE="margin-top: 0px; margin-left: 0px" TOPMARGIN=0 LEFTMARGIN=0 bgcolor = #FFFFFF>
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
<TABLE WIDTH="720" border="0" align="CENTER" cellpadding="0" cellspacing="0" bgcolor="f7f6f3">
<TR>
						<TD WIDTH="8" BGCOLOR="#FFFFFF"></TD>
		<TD WIDTH="720" align="LEFT">
<TABLE width=720 border=0 cellPadding=0 cellSpacing=0 bgcolor="e8e6e3">

	<TR height=19>
		<TD width=13 height="1" vAlign=top></TD>
		</TR>
</TABLE>

<TABLE WIDTH="680" border=0 cellpaddin g=0 cellspacing=0>
    <TR>
    	<TD width="45" height="45" CLASS="texto">
    		<p>&nbsp;</p>    		</TD>
        <TD height="45" CLASS="AplicantesTituloTab">Listado de Mercaderia en el Sistema</TD>
    </TR>
    <TR>
      <TD height="1" CLASS="texto"></TD>
      <TD height="1" bgcolor="dadbd7" CLASS="texto"></TD>
    </TR>
    <TR>
      <TD CLASS="texto"></TD>
      <TD CLASS="texto"><div align="left"></div>
        <table width="640" border="1" align="left" cellpadding="0" cellspacing="0" valign="middle">
          <tr align="center" class="AplicantesTituloTab">
            <td width="119" height="40" rowspan="2" bgcolor="#666666" class="caf_titulo2"><strong class="textoblanco">Codigo</strong></td>
            <td width="309" height="40" rowspan="2" bgcolor="#666666" class="caf_titulo2"><strong class="textoblanco">Descripcion </strong></td>
            <td width="70" height="40" rowspan="2" bgcolor="#666666" class="caf_titulo2"><b class="textoblanco">Precio</b></td>
            
            </tr>
          <tr align="center" bgcolor="#FF4040" class="textoblanco">
            <td width="59" height="40" bgcolor="#666666" class="caf_titulo2"><strong class="textoblanco">Detalle </strong></td>
            
            <td width="71" height="40" bgcolor="#666666" class="caf_titulo2"><div align="center"><strong class="textoblanco">Eliminar</strong></div></td>
            </tr>
          <?php if( count($mercaderias)>0)
  foreach ($mercaderias as $mercaderia) {
	?>
          <tr align="center" valign="middle">
            <td bgcolor="#FFFFFF" class="AplicantesLinkPanelTexto"><strong><?php echo $mercaderia['codigo'] ?></strong> </td>
            <td bgcolor="#FFFFFF" class="AplicantesLinkPanelTexto"><strong><?php echo $mercaderia['descripcion'] ?></strong></td>
            <td bgcolor="#FFFFFF" class="AplicantesLinkPanelTexto">$<?php echo $mercaderia['precio'] ?> </td>
            <?php if($_SESSION["usuario"]!=3){ //el id 3 no puede ver mercaderia?> 
            
            <td bgcolor="#FFFFFF" class="caf_titulo4Copia" ><a href="mercaderia.php?stage=detalle&amp;id_mercaderia=<?php echo $mercaderia['id']?>"><img src="imagenes/iconos/detalle.gif" alt="Detalle" width="36" height="36" border="0" longdesc="Ver en detalle de la mercaderia" /></a></td>
            <?php }?>
            <?php if($_SESSION["usuario"]!=3){ //el id 3 no puede borrar mercaderia?>
            <td bgcolor="#FFFFFF" class="caf_titulo4Copia" ><a href="verMercaderias.php?stage=eliminar&amp;id_mercaderia=<?php echo $mercaderia['id']?>"><img src="imagenes/iconos/borrar.gif" alt="Eliminar" name="Eliminar" width="36" height="36" border="0" id="deshabilitar" /></a></td>
			<?php }?>
            </tr>
          <?php 
  }//for each
  ?>
          </table></TD>
    </TR>
</TABLE>

<p><a href="menu.php" class="AplicantesLink2">[&lt;&lt;Volver al Menu</a><a href="menu.php" class="AplicantesLink2">]&nbsp;</a></p>
<TABLE WIDTH="661" border=0>
		    <BR>
		<TR>
	    <TD ALIGN="RIGHT"></TD>
        </TR>
</TABLE>	  </TD>
		<TD WIDTH="8" BGCOLOR="#FFFFFF"></TD>
  </TR>
</TABLE> 
	</div>

</BODY>

</html>
