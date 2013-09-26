<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<html>
<head>
    <title>Todas Las Encuestas |Sistema SIAS | UNPA</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="public/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="public/css/estiloMenu.css">
    <script language="JavaScript" src="public/js/Validar.js" type="text/javascript"></script>
</head>

<body>
<div id="menu_marco">
    <div id="menu_header">
        <?php include("view/xheader.phtml");?>
    </div>

    <div id="menu_contenido">

        <div id="menu_opciones">
            <?php include("view/xopciones.phtml");?>
        </div>

        <div id="menu_cuerpo">

           <h2Listado de TODAS las Encuestas en el Sistema</h2>
           <p><?php if(isset($mensaje)) echo $mensaje;?></p>

            <table class="tablaPrueba">

                <col class="colAngosta"/>
                <col class="colNormal"/>
                <col class="colAncha"/>
                <col class="colAncha"/>
                <col class="colAncha"/>
                <col class="colAngosta"/>
                <col class="colAngosta"/>
                <col class="colAngosta"/>
                <tr>
                    <th>Numero</th>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Comentario</th>
                    <th>Detalle</th>
                    <th>Imprimir</th>
                    <th>Eliminar</th>
                </tr>

                <?php if( count($encuestas)>0)
                    foreach ($encuestas as $encuesta) {
                        ?>
                        <tr>
                            <td><?php echo $encuesta['id'] ?></td>
                            <td><?php if(isset($encuesta))echo $enc->cambia_fecha_a_normal($encuesta["fecha_creacion"])?></td>
                            <td><?php echo $encuesta['nombre'] ?></td>
                            <td><?php echo $encuesta['descripcion_encuesta'] ?></td>
                            <td><?php echo $encuesta['comentario'] ?></td>
                            <td align="middle"><a href="<?php echo Conectar::ruta();?>?accion=encuesta&amp;stage=detalle&amp;id_encuesta=<?php echo $encuesta['id']?>"><img src="public/images/iconos/detalle.png" alt="Detalle" width="30" height="30" border="0" longdesc="Ver en detalle del aviso" /></a></td>
                            <td align="middle"><a href="encuestaImprimible.php?stage=detalle&amp;id_encuesta=<?php echo $encuesta['id']?>"><img src="public/images/iconos/imprimir.gif" width="30" height="30" border="0" /></a></td>
                            <?php if($_SESSION["usuario"]!=3){ //el id 3 no puede eliminar remito?>
                                <td align="middle"><a href="<?php echo Conectar::ruta();?>?accion=verEncuestas&amp;stage=eliminar&amp;id_encuesta=<?php echo $encuesta['id']?>"><img src="public/images/iconos/borrar.png" alt="Eliminar" name="deshabilitar" width="30" height="30" border="0" id="deshabilitar" /></a></td>
                            <?php }?>
                        </tr>
                    <?php
                    }//for each
                ?>
            </table>



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

















