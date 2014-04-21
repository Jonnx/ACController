<?php
	session_start();
	function EXT($ext) {
		require_once(dirname(__FILE__)."/$ext/_$ext.load.php");
	}
?>