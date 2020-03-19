<?php

	if( isset($_SESSION['ip'] ) && $_SESSION['ip'] == $_SERVER['REMOTE_ADDR'] ) {
	
	} else {
		header('Location: ./connexion.php');
	}

?>