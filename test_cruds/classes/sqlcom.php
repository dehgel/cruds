<?php 

/* Database connection preparation */

class SQLQuery extends MySQLConnection{

	// Child construct thrown in db_class.php
	public function __construct() {

		parent::__construct();

		$GLOBALS['sessionid'] = session_id(); 


	}

	// Triggered insert query processing data.
	public function InsertQuery( $totable, $torows, $thevalues ) {

    	$conn = new MySQLConnection();

		// Defined connection strings in config.php
		$ConnStr = $conn->connectMySQL( DB_HOST, DB_USER, DB_PASS, DB_NAME );

		// Set input query
		$sql = 'INSERT INTO '. $totable .' (' . $torows . ') VALUES ('. $thevalues. ')';

		// Trigger selection of data.
        $insertdb =  mysqli_query($ConnStr, $sql );
 		
 		if ( $insertdb ) {

			echo "<span style='width: 97%;background: #a1fda4;padding: 8px 15px;position: absolute;z-index: 999;top: 59px;margin: 0 15px;'>You've added a new contact!</span>";

		 } else {

			echo "Error: " . $sql . " " . mysqli_error($ConnStr);
		 }

		 mysqli_close($ConnStr);

    }

    // Triggered select query
	public function SelectQuery( $query_objects, $query_table, $query_args ) {
		
		$conn = new MySQLConnection();

		// Defined connection strings in config.php
		$ConnStr = $conn->connectMySQL( DB_HOST, DB_USER, DB_PASS, DB_NAME );

		// Trigger selection of data.
        $results =  mysqli_query($ConnStr, 'SELECT '.$query_objects.' FROM '.$query_table .' ' . $query_args );

    	if( $results ) {

 			return $results;

 		} else {

 			echo "<span> Error " . mysqli_error( $ConnStr ) ."</span>";
 		}
    }

    // Update query trigger
    public function UpdateQuery($query_table, $query_values, $query_id) {

    	$conn = new MySQLConnection();

		// Defined connection strings in config.php
		$ConnStr = $conn->connectMySQL( DB_HOST, DB_USER, DB_PASS, DB_NAME );

		// Trigger update query defined WHERE ID clause as static
		$update = mysqli_query($ConnStr, 'UPDATE '. $query_table . ' SET ' . $query_values . ' WHERE ID=' . $query_id );

		if( $update ) {

 			return $update;

 		} else {

 			echo "<span> Error " . mysqli_error( $ConnStr ) ."</span>";
 		}

    }

    // Trigger delete query.
    public function DeleteQuery( $query_table, $query_args ) {

    	$conn = new MySQLConnection();

		// Defined connection strings in config.php
		$ConnStr = $conn->connectMySQL( DB_HOST, DB_USER, DB_PASS, DB_NAME );

		$delete = mysqli_query($ConnStr, 'DELETE FROM '. $query_table .' ' . $query_args);

		if( $delete ) {

 			return $delete;

 		} else {

 			echo "<span> Error " . mysqli_error( $ConnStr ) ."</span>";
 		}
    }

    

}



?>