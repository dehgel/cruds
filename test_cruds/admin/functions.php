<?php 

/*
 * Admin functions. 
 * Avoid future redundancy or use of the same function name.
 * Return NULL if false.
 */

// Insert new data
if(!function_exists('savedata')) {

	function savedata() {

		// Upload image 
	    // File upload path
		$targetDir = 'uploads/';

		// File name
		$fileName = basename($_FILES["file"]["name"]);

		// URL path of the filename
		$targetURL = $targetDir . $fileName;

		// Reset database Query
		$sqlcom = new SQLQuery();	

	    $email = $_POST['email'];
	    $fname = $_POST['firstname'];
	    $lname = $_POST['lastname'];
	    $bio = $_POST['bio'];
	    $photo = $targetURL;
	    $sex = $_POST['gender'];
	    $date = 'CURRENT_TIMESTAMP';
	    $phone = $_POST['phone'];

	    // Get url as reference data table. @Return string.
	    $totable = 'contacts';

	    // Declare arguments
	    $therows = "EMAIL, FIRST_NAME, LAST_NAME, BIO, PHOTO, GENDER, PHONE";

	    // Input values 
	    $thevalues = "'$email', '$fname', '$lname', '$bio', '$photo', '$sex', '$phone'";

	    if(!empty($_FILES["file"]["name"])) {

		    // Copy image file to $targetDir
		    if( move_uploaded_file($_FILES["file"]["tmp_name"], $targetURL) ) {
		    	
		    	echo 'New contact has been added to the database.';

		    } else {

		    	echo 'Failed upload image. New data cannot be added';
		    }
		} else {

			echo 'Cannot find file to be uploaded. ';
		}

		$sqlcom->InsertQuery( $totable, $therows, $thevalues );

	}
}

// Remove data based on selected ID.

if(!function_exists('remove_from_data')) {

	function remove_from_data() {

		$cid = $_GET['rid'];

		// Reset database Query
		$sqlcom = new SQLQuery();

		// Select data table
		$table = 'contacts';

		// Declare arguments
		$args = 'WHERE ID =' . $cid;

		if( isset( $cid ) ) {

		    $sqlcom->DeleteQuery($table, $args);

		    echo 'You have successfully deleted the data.';

		    header('Location: index.php');

		}

	}

}

if(!function_exists('updateData')) {

	function updateData() {

		// Upload image 
	    // File upload path
		$targetDir = 'uploads/';

		// File name
		$fileName = basename( $_FILES["file"]["name"] );

		// URL path of the filename
		$targetURL = $targetDir . $fileName;

		// Get id
		$cid = $_GET['id'];

		// Reset database Query
		$sqlcom = new SQLQuery();

		// Select data table
		$table = 'contacts';

		// Variables 
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$mail = $_POST['email'];
		$phone = $_POST['phone'];
		$photo = $targetURL;
		$bio = $_POST['bio'];
		$sex = $_POST['sex'];

		// Declare values
		$values = "FIRST_NAME='$fname', LAST_NAME='$lname', BIO='$bio', PHOTO='$photo', EMAIL='$mail', GENDER='$sex', PHONE='$phone'";

		if( move_uploaded_file($_FILES["file"]["tmp_name"], $targetURL) ) {	

			echo 'You have successfully updated the data.';

		} 

		$sqlcom->UpdateQuery( $table, $values, $cid );

	}

}

if(!function_exists('meta_head')) {

	function meta_head() {
		echo '<head>
			    <meta charset="utf-8">
			    <meta name="viewport" content="width=device-width, initial-scale=1.0">
			    <title>Test App</title>
			    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
			    <link rel="stylesheet" href="assets/css/styles.css">
			</head>';

	}
}

if(!function_exists('getSelectedData')) {

	function getSelectedData( $val ) {

		$sqlcom = new SQLQuery();

		$cid = $_GET['id'];

		$obj = '*';

		$table = 'contacts';

		$args = 'WHERE ID='. $cid;

		$query = $sqlcom->SelectQuery( $obj, $table, $args );

		$row = $query->fetch_assoc();

		return $row[ $val ];			

	}

}


if(!function_exists('UserAccountSettings')) {


	function UserAccountSettings($input_new, $input_confim) {

		$sqlcom = new SQLQuery();

		$cid = $_GET['id'];

		// Select data table
		$table = 'accounts';

		$values = "PASSWORD='$input_confirm'";

		// Curent user
		if( $_POST[$input_new] === $_POST[$input_confirm] ) {

			$sqlcom->UpdateQuery( $table, $values, $cid );

			echo "You've changed your password successfully.";

		} else {

			echo '<span>Password mistmatched!</span>';
		}

		

	}
}

if(!function_exists('is_user_logged_in')) {

	function is_user_logged_in() {

		session_start();

		if(!isset($_SESSION['login'])){ //if login in session is not set

		    header("Location: /index.php");

		}

		
	}

}
