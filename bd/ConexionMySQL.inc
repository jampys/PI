<?php
require ("ConexionGenerica.inc");
class ConexionMySQL extends ConexionGenerica {

	function ConexionMySQL() {}

	function connect($servidor="localhost", $usuario="administrador", $clave="administrador") {
		return $this->link = mysql_connect($servidor, $usuario, $clave);
	}

	function close() {
		return mysql_close($this->link);
	}

	function select_db($base_datos="gca") {
		return mysql_select_db($base_datos, $this->link);
	}

	function query($query) {
		return mysql_query($query, $this->link)  ;
	}

	function fetch_array($resultado) {
		return mysql_fetch_array($resultado);
	}

	function free_result($resultado) {
		return mysql_free_result($resultado);
	}}	
?>