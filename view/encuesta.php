<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Encuestas | Sistema SIAS | UNPA</title>
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

    <script type="text/javascript" language="javascript" src="<?php echo Conectar::ruta();?>public/js/ajax.js"></script>
    <link rel="stylesheet" type="text/css" href="public/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="public/css/estiloMenu.css">
    <script language="JavaScript" src="public/js/Validar.js" type="text/javascript"></script>
    <script type="text/javascript" src="public/js/calendar/calendar.js"></script>
    <script type="text/javascript" src="public/js/calendar/calendar-setup.js"></script>
    <script type="text/javascript" src="public/js/calendar/lang/calendar-es.js"></script>
    <style type="text/css"> @import url("public/js/calendar/calendar-win2k-cold-1.css"); </style>

</head>


<body>

<div id="menu_marco">
    <div id="menu_header">
        <?php include("view/xheader.phtml"); ?>
    </div>

    <div id="menu_contenido">

        <div id="menu_opciones">
            <?php include("view/xopciones.phtml");?>
        </div>

        <div id="menu_cuerpo">



            <div style="float: left; height: 400px; width: 400px">

            <h2 class="titulo">Datos de la encuesta</h2>
            <form class="formi" action="" method="post" name="altaEncuesta" id="altaEncuesta">
                <br/>
                Los campos en AZUL deben completarse en forma obligatoria
                <br/>

                <table>

                    <tr>
                        <td>Nombre</td>
                        <td><input NAME="NOMBRE" type="text" id="NOMBRE" onChange="javascript:this.value=this.value.toLowerCase();" value="<?php if (isset($encuesta)) echo $encuesta['nombre'];?>" SIZE="40px" MAXLENGTH="40px"></td>
                    </tr>
                    <TR >
                        <TD title="Ingrese la Descripcion de la Encuesta">Descripcion</TD>
                        <TD><textarea name="DESCRIPCION" cols="31" rows="8" class="AplicantesInput" id="DESCRIPCION" onchange="javascript:this.value=this.value.toLowerCase();"><?php if (isset($encuesta))echo $encuesta['descripcion_encuesta'];?>
                            </textarea>
                        </TD>
                    </TR>
                    <tr>
                        <td title="Ingrese la fecha de creacion">Fecha</td>
                        <td><input  name="FECHA_CREACION" type="text" id="FECHA_CREACION" value="<?php if(isset($encuesta))echo $enc->cambia_fecha_a_normal($encuesta['fecha_creacion']);
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
                        <td title="Ingrese algun comentario pertinenete para esta encuesta">Comentario</td>
                        <td valign="top" align="left"><textarea name="COMENTARIO" cols="31" class="AplicantesInput" id="COMENTARIO" onchange="javascript:this.value=this.value.toUpperCase();"><?php if (isset($encuesta)) echo $encuesta['comentario'];?></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input name="guardar" type="submit" id="guardar" value="Guardar">
                            <input name="restablecer" type="reset" id="restablecer" value="Restablecer">
                            <?php  if (isset($encuesta)){
                                echo " <INPUT TYPE='HIDDEN' NAME='stage' VALUE='modificar'>";
                                echo " <INPUT TYPE='HIDDEN' NAME='IDENCUESTA' VALUE='" ?> <?php echo $encuesta['id']; echo "'>";
                            }else echo " <INPUT TYPE='HIDDEN' NAME='stage' VALUE='nuevo'>"; ?>

                        </td>
                    </tr>

                </TABLE>

            </FORM>
            </div>

            <div style="float: left; height: 300px; width: 400px">
            <!-- DARIO codigo para ver las preguntas de cada encuesta-->
            <h2 class="titulo">Preguntas de la encuesta</h2>

            <p><a class="mostrar" href="javascript:void(0);" onclick="viewPregunta('<?php echo $idEncuesta?>', 'ajax', '<?php echo Conectar::ruta()?>controller/preguntaController.php', 'view', null)">
                    ver preguntas -
                </a>
                <a class="mostrar" href="javascript:void(0);" onclick="oculta('ajax')">
                    Ocultar preguntas
                </a>
            </p>

            <div id="ajax" style="margin-top: 10px">
            </div>
            </div>
            <!-- DARIO FIN -->


        </div>

        <div id="menu_usuario">
            <?php include("view/xusuario.phtml");?>
        </div>

    </div>
    <div id="menu_footer">
        <?php include("view/xfooter.phtml");?>
    </div>
</div>


</body>

</html>


