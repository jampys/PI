
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<HEAD>
    <TITLE>Todas Las Encuestas |Sistema SIAS | UNPA</TITLE>
    <link rel="stylesheet" type="text/css" href="public/css/estilos1.css">
    <script language="JavaScript" src="public/js/Validar.js" type="text/javascript"></script>
    <style type="text/css">
        <!--
        .Estilo2 {color: #FF0000}
        table {
            text-align: center;
        }
        .texto table {
            text-align: center;
        }
        -->
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></HEAD>
<BODY marginwidth=0 marginheight=0 STYLE="margin-top: 0px; margin-left: 0px" TOPMARGIN=0 LEFTMARGIN=0 bgcolor = #FFFFFF>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td background="public/images/enc_fondo.jpg" >&nbsp;</td>
    </tr>
</table>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td><p><img src="public/images/sistemaConceptual/logosmall.png" alt="PANADERIA" width="243" height="83" /></p></td>
        <td><img src="public/images/iconos/remito.gif" alt="REMITOS" width="60" height="60" align="right" /></td>
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
                    <TD height="45" CLASS="AplicantesTituloTab"><p>Listado de TODAS las Encuestas en el Sistema</p>
                        <p class="TextoObligatorio"><?php if(isset($mensaje)) echo $mensaje;?></p></TD>
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
                                <td width="80" height="40" rowspan="2" bgcolor="#666666" class="caf_titulo2"><strong class="textoblanco">NUMERO </strong></td>
                                <td width="68" height="40" rowspan="2" bgcolor="#666666" class="caf_titulo2"><strong class="textoblanco">FECHA </strong></td>
                                <td width="94" rowspan="2" bgcolor="#666666" class="caf_titulo2"><strong class="textoblanco">NOMBRE</strong></td>
                                <td width="94" rowspan="2" bgcolor="#666666" class="caf_titulo2"><strong class="textoblanco">DESCRIPCION</strong></td>
                                <td width="177" rowspan="2" bgcolor="#666666" class="caf_titulo2"><strong class="textoblanco">COMENTARIO</strong></td>
                                <td width="61" rowspan="2" bgcolor="#666666" class="caf_titulo2">&nbsp;</td>
                                <td width="39" height="40" rowspan="2" bgcolor="#666666" class="caf_titulo2"><strong class="textoblanco">Detalle</strong></td>
                                <td width="46" height="40" rowspan="2" bgcolor="#666666" class="caf_titulo2"><strong class="textoblanco">Imprimir</strong></td>

                            </tr>
                            <tr align="center" bgcolor="#FF4040" class="textoblanco">
                                <td width="57" height="40" bgcolor="#666666" class="caf_titulo2"><div align="center"><strong class="textoblanco">Eliminar</strong></div></td>
                            </tr>
                            <?php if( count($encuestas)>0)
                                foreach ($encuestas as $encuesta) {
                                    ?>
                                    <tr align="center" valign="middle">
                                        <td bgcolor="#FFFFFF" class="AplicantesLinkPanelTexto"><strong><?php echo $encuesta['id'] ?></strong> </td>
                                        <td bgcolor="#FFFFFF" class="AplicantesLinkPanelTexto"> <?php if(isset($encuesta))echo $enc->cambia_fecha_a_normal($encuesta["fecha_creacion"])?></td>
                                        <td bgcolor="#FFFFFF" class="AplicantesLinkPanelTexto"><strong><?php echo $encuesta['nombre'] ?></strong> </td>
                                        <td bgcolor="#FFFFFF" class="AplicantesLinkPanelTexto"><strong><textarea name="DESCRIPCION_ENCUESTA" cols="20" rows="5" readonly="readonly" id="DESCRIPCION_ENCUESTA"><?php echo $encuesta['descripcion_encuesta'] ?></textarea></strong></td>
                                        <td bgcolor="#FFFFFF" class="AplicantesLinkPanelTexto"><strong>
                                                <textarea name="COMENTARIO" cols="45" rows="5" readonly="readonly" id="COMENTARIO"><?php echo $encuesta['comentario'] ?></textarea></strong></td>
                                        <td bgcolor="#FFFFFF" class="AplicantesLinkPanelTexto">&nbsp;</td>
                                        <td bgcolor="#FFFFFF" class="AplicantesLinkPanelTexto"><a href="<?php echo Conectar::ruta();?>?accion=encuesta&amp;stage=detalle&amp;id_encuesta=<?php echo $encuesta['id']?>"><img src="public/images/iconos/detalle.gif" alt="Detalle" width="36" height="36" border="0" longdesc="Ver en detalle del aviso" /></a></td>
                                        <td bgcolor="#FFFFFF" class="AplicantesLinkPanelTexto"><a href="encuestaImprimible.php?stage=detalle&amp;id_encuesta=<?php echo $encuesta['id']?>"><img src="public/images/iconos/imprimir.gif" width="36" height="36" border="0" /></a></td>
                                        <?php if($_SESSION["usuario"]!=3){ //el id 3 no puede eliminar remito?>
                                            <td bgcolor="#FFFFFF" class="caf_titulo4Copia" ><a href="<?php echo Conectar::ruta();?>?accion=verEncuestas&amp;stage=eliminar&amp;id_encuesta=<?php echo $encuesta['id']?>"><img src="public/images/iconos/borrar.gif" alt="Eliminar" name="deshabilitar" width="36" height="36" border="0" id="deshabilitar" /></a></td>
                                        <?php }?>
                                    </tr>
                                <?php
                                }//for each
                            ?>
                        </table></TD>
                </TR>
            </TABLE>

            <p><a href="<?php echo Conectar::ruta();?>?accion=index" class="AplicantesLink2">[Volver al Menu]</a></p>
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
