/**
 * Created with JetBrains PhpStorm.
 * User: Titan
 * Date: 01/09/13
 * Time: 21:51
 * To change this template use File | Settings | File Templates.
 */

function eliminar(ruta){
    if(confirm("Realmente desea eliminar este registro?")){
        window.location=ruta;
    }
}

function limpiar(){
    document.form.reset();
    document.form.nom.focus();
}