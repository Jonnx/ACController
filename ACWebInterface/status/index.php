<?php 
	require_once("../_system/classes/ACController.start.php");
	EXT("DB");
	EXT("ACStatus");
	echo ACStatus::getStatus();
?>