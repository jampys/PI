<?php
require ("ConectionsGenerica.inc");
class Conection extends ConectionsGenerica {

	function Conection() {}

	function connect($servidor="localhost", $usuario="root", $clave="admin") {
	
	return $this->link = mysql_connect($servidor, $usuario, $clave);
		
			
	}

	function close() {
		return mysql_close($this->link);
	}

	function select_db($base_datos="pi") {

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
	}
}	
?>