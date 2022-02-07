<?php

session_start();

if( isset( $_GET['page'] ) ) {

	$out = $_GET['page'];

	unset($_SESSION["user"]);

   	unset($_SESSION["pass"]);

   	unset( $sessionid );
   	unset( session_id() );

	session_destroy();

	ob_end_clean();

	header('Refresh: 2; URL = '.$out );

	exit;  
}


?>
