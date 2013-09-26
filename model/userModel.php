<?php

class Usuarios extends Conectar{
    private $user;

    public function __construct(){
        $this->user=array();
    }

    public function get_usuarios(){
        $sql="select id, nombre, pass, foto from administrador;";
        $res=mysql_query($sql, parent::con());
        while($reg=mysql_fetch_assoc($res)){
            $this->user[]=$reg;
        }
        return $this->user;
    }

    public function delete_user(){
        //print_r($_GET);
        if(isset($_GET["v"])){
            //echo "si existe";
            //1ro eliminamos la foto del directorio fotos
            parent::con();
            $query=sprintf("select foto from usuarios2 where id_usuario=%s",parent::comillas_inteligentes($_GET['v']) );
            $res=mysql_query($query);
            if($reg=mysql_fetch_array($res)){
                unlink("public/fotos/".$reg["foto"]);
            }

            //2do eliminamos el usuario
            parent::con();
            $sql=sprintf("delete from usuarios2 where id_usuario=%s",
                         parent::comillas_inteligentes($_GET['v']));
            mysql_query($sql);
            header("Location: ".Conectar::ruta()."?accion=veruser");

        }else{
            //echo "no existe";
            header("Location: ".Conectar::ruta()."?accion=veruser");
            //echo "<script type='text/javascript'>window.location='".Conectar::ruta()."?accion=veruser'</script>";
            exit;
        }
    }

    public function add_user(){
        //print_r($_POST);
        if(empty($_POST["nom"]) or empty($_POST["correo"]) or empty($_POST["login"]) or empty($_POST["pass"])
            or empty($_FILES["foto"]["name"]) or parent::valida_correo($_POST["correo"]==false)  ){
            //header("Location: ".Conectar::ruta()."?accion=adduser");
            //exit;
            echo"faltan datos";
        }

        //validar que el archivo de la foto solo sea jpg
        if($_FILES["foto"]["type"]=="image/jpeg"){

            //validar que el user no exista en la bd
            parent::con();
            $sql=sprintf("select login from usuarios2 where login=%s", parent::comillas_inteligentes($_POST["login"]));
            $res=mysql_query($sql);
            if(mysql_num_rows($res)==0){
                //insertamos el registro en la BD
                //1ro tratamiento de la foto
                $foto=$_POST["login"].".jpg";
                copy($_FILES["foto"]["tmp_name"],"public/fotos/$foto");
                //2do hacemos el insert
                $query=sprintf("insert into usuarios2 values (null, %s, %s, %s, %s, '$foto', now())",
                        parent::comillas_inteligentes($_POST["nom"]),
                        parent::comillas_inteligentes($_POST["correo"]),
                        parent::comillas_inteligentes($_POST["login"]),
                        parent::comillas_inteligentes($_POST["pass"])

                    );
                mysql_query($query);
                header("Location: ".Conectar::ruta()."?accion=adduser");
                exit;


            }else{
                header("Location: ".Conectar::ruta()."?accion=adduser");
                exit;

            }


        }else{
            //header("Location: ".Conectar::ruta()."?accion=adduser");
            //exit;
            echo "la imagen no es jpg";
        }
    }

    public function get_usuarios_por_id(){
        parent::con();
        $sql=sprintf("select * from usuarios2 where id_usuario=%s", parent::comillas_inteligentes($_GET["v"]));
        $res=mysql_query($sql, parent::con());
        /*while($reg=mysql_fetch_assoc($res)){
            $this->user[]=$reg;
        }
        return $this->user;*/    //No conviene usar porque devuelve un array de arrays.. cada registro es un array

        return $reg=mysql_fetch_assoc($res);
    }

        public function edit_user(){

            if(empty($_POST["nom"]) or empty($_POST["correo"]) or empty($_POST["pass"])
                or parent::valida_correo($_POST["correo"]==false)  ){
                header("Location: ".Conectar::ruta()."?accion=edituser&v=".$_POST["id_usuario"]."");
                exit;
                //echo"faltan datos";
            }

            if(empty($_FILES["foto"]["name"])){ //el usuario no cambio la foto
                //echo"el usuario no cambio la foto";
                $foto=$_POST["archivo"];
                parent::con();
                $sql=sprintf("update usuarios2 set nombre=%s, correo=%s, pass=%s where id_usuario=%s",
                    parent::comillas_inteligentes($_POST["nom"]),
                    parent::comillas_inteligentes($_POST["correo"]),
                    parent::comillas_inteligentes($_POST["pass"]),
                    parent::comillas_inteligentes($_POST["id_usuario"])
                );
                mysql_query($sql);
                header("Location: ".Conectar::ruta()."?accion=veruser");
                exit;

            }else{
                //el usuario coloco una nueva foto, hay que hacer todas las validaciones
                //echo"el usuario cambio la foto";
                if($_FILES["foto"]["type"]=="image/jpeg"){
                    $foto=$_POST["login"].".jpg"; //ojo porque el login no lo trae por post. Pero lo agregare como hidden
                    copy($_FILES["foto"]["tmp_name"],"public/fotos/$foto");
                    parent::con();
                    $sql=sprintf("update usuarios2 set nombre=%s, correo=%s, pass=%s, foto='$foto' where id_usuario=%s",
                        parent::comillas_inteligentes($_POST["nom"]),
                        parent::comillas_inteligentes($_POST["correo"]),
                        parent::comillas_inteligentes($_POST["pass"]),
                        parent::comillas_inteligentes($_POST["id_usuario"])
                    );
                    mysql_query($sql);
                    header("Location: ".Conectar::ruta()."?accion=veruser");
                    exit;

                }else{
                    header("Location: ".Conectar::ruta()."?accion=edituser&v=".$_POST["id_usuario"]."");
                    exit;
                }


            }

        }

    public function salir()
    {
        session_destroy();
        header("Location: ".Conectar::ruta()."?accion=index&m=3");exit;
    }

    public function logueo(){

        parent::con();
        $sql=sprintf
        (
            "select id_usuario, foto from usuarios2 where login=%s and pass=%s",
            parent::comillas_inteligentes($_POST["login"]),parent::comillas_inteligentes($_POST["pass"])
        );
        $res=mysql_query($sql);
        if(mysql_num_rows($res)==0)
        {
            header("Location: ".Conectar::ruta()."?accion=login&m=2");exit;
        }else
        {
            if($reg=mysql_fetch_array($res))
            {
                $_SESSION["ses_id"]=$reg["id_usuario"];
                $_SESSION["ses_login"]=$_POST["login"];
                $_SESSION["foto"]=$reg["foto"];
                header("Location: ".Conectar::ruta()."?accion=index");exit;
            }
        }
    }

    function isAValidUser($USUARIO,$PASS){

        parent::con();
        $PASS=md5($PASS);

        $consulta="SELECT * FROM `administrador` WHERE `NOMBRE` ='$USUARIO' AND `pass`= '$PASS'";
        $resultset=mysql_query($consulta) or die(mysql_error());

        if (mysql_num_rows($resultset)>=1)
        {
            $registro=mysql_fetch_array($resultset);
            if($registro['habilitado']==1)
                return $registro['id'];
            else return 0;
        }
        else
        { return -1;
        }
    }




    }
?>