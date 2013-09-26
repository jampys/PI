    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>Encuestas | Sistema SIAS | UNPA</TITLE>
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

    <script type="text/javascript" language="javascript" src="<?php echo Conectar::ruta();?>public/js/ajax.js"></script>
    <link rel="stylesheet" type="text/css" href="public/css/estilos.css">
<link rel="stylesheet" type="text/css" href="public/css/estilos1.css">
<script language="JavaScript" src="public/js/Validar.js" type="text/javascript"></script>
<script type="text/javascript" src="public/js/calendar/calendar.js"></script>
    <script type="text/javascript" src="public/js/calendar/calendar-setup.js"></script>
    <script type="text/javascript" src="public/js/calendar/lang/calendar-es.js"></script>
    <style type="text/css"> @import url("public/js/calendar/calendar-win2k-cold-1.css"); </style>



<style type="text/css">
<!--
.Estilo1 {
	color: #006699
}
.Estilo2 {font-size: 18px}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></HEAD>
<BODY bgcolor = #FFFFFF LEFTMARGIN=0 TOPMARGIN=0 marginwidth=0 marginheight=0 STYLE="margin-top: 0px; margin-left: 0px; color: #006699;">

<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="public/images/enc_fondo.jpg" >&nbsp;</td>
  </tr>
</table>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <td>
                  <p><img src="public/images/sistemaConceptual/logosmall.jpg" width="243" height="83" /></p>
                </td>
    <td><img src="public/images/sistemaConceptual/asignacion.gif" width="60" height="60" align="right" /></td>
    |
  </tr>
</table>
<TABLE cellpadding="0" cellspacing="0" WIDTH="720" border="0" align="CENTER">
<TR>
						<TD WIDTH="8" BGCOLOR="#FFFFFF"></TD>
		<TD WIDTH="720" BGCOLOR="#FFFFFF" align="LEFT"></tr>
<TABLE cellSpacing=0 cellPadding=0 width=720 border=0 >

	<TR height=19>
		<TD height="19" colspan="4" vAlign=top class="TituloPosting"><div align="right">Datos De La Encuesta</div></TD>
		</TR>
    <TR><TD width="13"></TD></TR>
</TABLE>

 <form action="" method="post" name="altaEncuesta" id="altaEncuesta">

<TABLE cellpadding=0 cellspacing=0 border=0 WIDTH="661">
    <TR>
    	<TD CLASS="textobold">
    		Los campos en <span class="Estilo1">AZUL</span> deben completarse en forma obligatoria     	</TD>
    </TR>
</TABLE>

<TABLE cellSpacing=0 cellPadding=0 width=662 border=0>
	<TR height=20>
		<TD height="20" vAlign=top class="AplicantesTituloTab">ENCUESTA</TD>
		</TR>
	<TR height=3><TD></TD></TR>
</TABLE>
<TABLE cellpadding="3" cellspacing=0 border=0 WIDTH="714" BGCOLOR="#FFFFFF">
    <TR height="10"><TD colspan="3"></TD></TR>
    <TR >
    <TD width="327" align="right" valign="top"><FONT class="AplicantesControl">Nombre</FONT><BR>
      <FONT class="AplicantesFooterApagado">Ingrese el nombre de la Encuesta</FONT></TD>

    <TD width="11">&nbsp;</TD>
    <TD valign="top" width="358" align="left">
		<INPUT NAME="NOMBRE" TYPE="TEXT" CLASS="AplicantesInput" id="NOMBRE" onChange="javascript:this.value=this.value.toUpperCase();" value="<?php if (isset($encuesta)) echo $encuesta['nombre'];?>" SIZE="20" MAXLENGTH="40">        </TD>
</TR>
    <TR >
      <TD align="right" valign="top"><FONT class="AplicantesControl">Descripcion</FONT><BR>
        <FONT class="AplicantesExplicacion">Ingrese la Descripcion de la Encuesta</FONT></TD>
      <TD width="11">&nbsp;</TD>
      
      <TD valign="top" width="358" align="left"><textarea name="DESCRIPCION" cols="20" rows="10" class="AplicantesInput" id="DESCRIPCION" onchange="javascript:this.value=this.value.toUpperCase();"><?php if (isset($encuesta))echo $encuesta['descripcion_encuesta'];?>
      </textarea></TD>
</TR>
    <tr >
      <td align="right" valign="top"><font class="AplicantesControl">Fecha</font><br />
        <font class="AplicantesExplicacion">Ingrese la fecha de creacion </font></td>
      <td>&nbsp;</td>
      <td colspan="5" align="left"><input  name="FECHA_CREACION" type="text" id="FECHA_CREACION" value="<?php if(isset($encuesta))echo $enc->cambia_fecha_a_normal($encuesta['fecha_creacion']);
	  else 
	  echo date("d/m/Y");?>" 
      size="10" maxlength="10"  /> 
      <button type="submit" id="cal-button-1">...</button>
        <script type="text/javascript">
            Calendar.setup({
              inputField    : "FECHA_CREACION",
              button        : "cal-button-1",
              align         : "Tr"
            });
          </script>
        
     
        </td>	
    </tr>
    <tr >
      <td align="right" valign="top"><p><font class="AplicantesControl">Comentario </font><br />
        <font class="AplicantesExplicacion">Ingrese algun comentario pertinenete para esta encuesta </font></p></td>
      <td>&nbsp;</td>
      <td valign="top" align="left"><textarea name="COMENTARIO" cols="20" class="AplicantesInput" id="COMENTARIO" onchange="javascript:this.value=this.value.toUpperCase();"><?php if (isset($encuesta)) echo $encuesta['comentario'];?></textarea></td>
    </tr>
    


	<TR height="10"><TD colspan="3"></TD></TR>
	 		
	</TABLE>


     <!-- DARIO codigo para ver las preguntas de cada encuesta-->
     <h3>Preguntas de la encuesta</h3>

     <p><a class="mostrar" href="javascript:void(0);" onclick="viewPregunta('<?php echo $idEncuesta?>', 'ajax', '<?php echo Conectar::ruta()?>controller/preguntaController.php', 'view', null)">
             ver preguntas -
        </a>
         <a href="javascript:void(0);" onclick="oculta('ajax')">
             Ocultar preguntas
         </a>
     </p>
     <div id="ajax">
     </div>

     <!-- DARIO FIN -->

<TABLE WIDTH="722" border=0 background="public/images/enc_fondo.jpg">
		    <BR>
		<TR>
	    <TD width="716" ALIGN="left" valign="bottom" >
	      <p><a href="<?php echo Conectar::ruta();?>?accion=index" class="AplicantesLink2">[Volver al Menu]</a>
	        <label>
	        </p>
	      <div align="center">
	        <p>
	          <input name="guardar" type="submit" id="guardar" value="Guardar" >
	          <input name="restablecer" type="reset" id="restablecer" value="Restablecer">
	          <?php  if (isset($encuesta))  {
				echo " <INPUT TYPE='HIDDEN' NAME='stage' VALUE='modificar'>"; 
				echo " <INPUT TYPE='HIDDEN' NAME='IDENCUESTA' VALUE='" ?> <?php echo $encuesta['id']; echo "'>";
				
			      }
				
				else echo " <INPUT TYPE='HIDDEN' NAME='stage' VALUE='nuevo'>";?>
	          
	          
	          </p>
	        <p><a href="menu.php" class="AplicantesLink2"></a></p>
	        </div>
	      </label></TD>
          </TR>
</TABLE>
</FORM>
<!--VALIDACIONES DEL FORMULARIO-->
	 <script language="JavaScript" type="text/javascript">
 		var frmvalidator = new Validator("altaEncuesta");
		frmvalidator.addValidation("NOMBRE","req");
		frmvalidator.addValidation("NOMBRE","maxlen=100");
		frmvalidator.addValidation("DESCRIPCION","req");
		frmvalidator.addValidation("DESCRIPCION","maxlen=200");
    	frmvalidator.addValidation("FECHA_CREACION","req");
		frmvalidator.addValidation("FECHA_CREACION","date");		
		frmvalidator.addValidation("COMENTARIO","maxlen=500");
	</script>
	 <!--VALIDACIONES DEL FORMULARIO-->



     </TD background="public/images/enc_fondo.jpg">
		<TD WIDTH="8"  background="public/images/enc_fondo.jpg"></TD>
  </TR>

</TABLE>
</div>
</body>
</html>


