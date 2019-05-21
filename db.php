<?php 
	// polaczenie z baza

	$dbServername = "localhost";
	$dbUsername = "WSB1";
	$dbPassword = "Poznan123";
	$dbName = "wsb_k28";
	$dbConn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
	$dbConn->set_charset("utf8_polish_ci");
?>