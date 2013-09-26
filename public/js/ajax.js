/* Desarrollado por www.cesarcancino.com */

function addPregunta(id, ide, url, op, id_pregunta){
    muestra(ide);
    operacion=op;
    numero=document.getElementById("numero").value;
    descripcion_pregunta=document.getElementById("descripcion_pregunta").value;
    //id_pregunta=document.getElementById("id_pregunta").value;
    var parametros='operacion='+operacion+'&numero='+numero+'&descripcion_pregunta='+descripcion_pregunta+'&id_pregunta='+id_pregunta;
    from_post(id, ide, url, parametros);
}

function updatePregunta(id, ide, url, op, id_pregunta){
    muestra(ide);
    operacion=op;
    numero=document.getElementById("num"+id_pregunta).value;
    descripcion_pregunta=document.getElementById("des"+id_pregunta).value;
    //id_pregunta=document.getElementById("id_pregunta").value;
    var parametros='operacion='+operacion+'&numero='+numero+'&descripcion_pregunta='+descripcion_pregunta+'&id_pregunta='+id_pregunta;
    from_post(id, ide, url, parametros);
}

function viewPregunta(id, ide, url, op, id_pregunta){
    muestra(ide);
    operacion=op;
    numero=null;
    descripcion_pregunta=null;
    //numero=document.getElementById("num"+id_pregunta).value;
    //descripcion_pregunta=document.getElementById("des"+id_pregunta).value;
    //id_pregunta=document.getElementById("id_pregunta").value;
    var parametros='operacion='+operacion+'&numero='+numero+'&descripcion_pregunta='+descripcion_pregunta+'&id_pregunta='+id_pregunta;
    from_post(id, ide, url, parametros);
}


function oculta(id){
          var elDiv = document.getElementById(id);
          elDiv.style.display='none';
         }

 function muestra(id){
          var elDiv = document.getElementById(id);
          elDiv.style.display='block';
         }



function obtiene_http_request()
{
var req = false;
try
  {
    req = new XMLHttpRequest(); /* p.e. Firefox */
  }
catch(err1)
  {
  try
    {
     req = new ActiveXObject("Msxml2.XMLHTTP");
  /* algunas versiones IE */
    }
  catch(err2)
    {
    try
      {
       req = new ActiveXObject("Microsoft.XMLHTTP");
  /* algunas versiones IE */
      }
      catch(err3)
        {
         req = false;
        }
    }
  }
return req;
}
var miPeticion = obtiene_http_request();



function from(id,ide,url)
{
		//para que no guarde la página en el caché...
		var mi_aleatorio=parseInt(Math.random()*99999999);
		//creo la URL dinámica
		var vinculo=url+"?id="+id+"&rand="+mi_aleatorio;
		//alert(vinculo);
		//ponemos true para que la petición sea asincrónica
		miPeticion.open("GET",vinculo,true);
		
		
		//ahora procesamos la información enviada
		miPeticion.onreadystatechange=miPeticion.onreadystatechange=
            function()
            {
               //alert("ready_State="+miPeticion.readyState);
               if (miPeticion.readyState==4)
               {
				   //alert(miPeticion.readyState);
                       //alert("status ="+miPeticion.status);
                       if (miPeticion.status==200)
                       {
                                //alert(miPeticion.status);
                               //var http=miPeticion.responseXML;
                               //alert("http="+http);
                               var http=miPeticion.responseText;
                               document.getElementById(ide).innerHTML= http;

                       }
               }
               
       }
       miPeticion.send(null);

}
/********************************************/
function from_post(id,ide,url,parametros)
{
        //para que no guarde la página en el caché...
		var mi_aleatorio=parseInt(Math.random()*99999999);
		//creo la URL dinámica
		var vinculo=url+"?rand="+mi_aleatorio+"&id="+id+"&"+parametros;
		//alert(vinculo);
		//ponemos true para que la petición sea asincrónica
		miPeticion.open("POST",vinculo,true);
		miPeticion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		miPeticion.send(vinculo);
		
		
		//ahora procesamos la información enviada
		miPeticion.onreadystatechange=miPeticion.onreadystatechange=function(){
               //alert("ready_State="+miPeticion.readyState);
               if (miPeticion.readyState==4)
               {
				   //alert(miPeticion.readyState);
                       //alert("status ="+miPeticion.status);
                       if (miPeticion.status==200)
                       {
                                //alert(miPeticion.status);
                               //var http=miPeticion.responseXML;
                               //alert("http="+http);
                               var http=miPeticion.responseText;
                               document.getElementById(ide).innerHTML= http;

                       }
               }
               
       }
       miPeticion.send(null);
	
}

