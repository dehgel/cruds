<?php 

/* Database connection preparation */

class MySQLConnection {

	/* 
	* NULL properties that can be inherited by the extended classes.
	*
	*/
	protected  $host = null;
	protected  $user = null;
	protected  $pass = null;
	protected  $db = null;
	public $ConnStr = null;

	public function __construct() {


	}

	/*
	* Returning the database connection.
	* Return Boolean
	*
	*/
  	public static function connectMySQL( $input_host, $input_user, $input_pass, $input_db ){

		$conn = @mysqli_connect( $input_host, $input_user, $input_pass, $input_db);

		if ( !mysqli_connect_errno() ) {

			return $conn;

		} else {

			die('Connection error <b>'. mysqli_connect_errno() .'</b>. Unknown database. ');
		}
		

	}

}

/* 
 * Begin database connections 
 */

$conn = new MySQLConnection();

// Defined connection strings in config.php
$ConnStr = $conn->connectMySQL( DB_HOST, DB_USER, DB_PASS, DB_NAME );

?>