<?php
class ConectionsGenerica {
	var $link;

	function ConectionsGenerica() {}

	function connect($servidor, $usuario, $clave) {
		//       echo "<h1>El m&eacute;todo <i>connect</i> no est&aacute; " .
		//       "implementado en la clase <i>" . get_class($this) . "</i></h1>";
		return FALSE;
	}


	function close() {
		//      echo "<h1>El m&eacute;todo <i>close</i> no est&aacute; " .
		//    "implementado en la clase <i>" . get_class($this) . "</i></h1>";
		return FALSE;
	}

	function select_db($base_datos) {
		//  echo "<h1>El m&eacute;todo <i>select_db</i> no est&aacute; " .
		//"implementado en la clase <i>" . get_class($this) . "</i></h1>";
		return FALSE;
	}

	function query($query) {
		//echo "<h1>El m&eacute;todo <i>query</i> no est&aacute; " .
		//"implementado en la clase <i>" . get_class($this) . "</i></h1>";
		return FALSE;
	}

	function fetch_array($resultado) {
		//echo "<h1>El m&eacute;todo <i>query</i> no est&aacute; " .
		//"implementado en la clase <i>" . get_class($this) . "</i></h1>";
		return FALSE;
	}

	function free_result($resultado) {
		// echo "<h1>El m&eacute;todo <i>free_result</i> no est&aacute; " .
		// "implementado en la clase <i>" . get_class($this) . "</i></h1>";
		return FALSE;
	}
}
?>