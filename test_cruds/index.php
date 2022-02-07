<?php 

ob_start();

session_start();

if(!defined('ABSPATH'))  define('ABSPATH', getcwd() );

require_once( ABSPATH . '/head.php');

if( isset($_POST['login']) ) {

    

	// Set login credentials variables
	$u = $_POST['user'];  
	$p = $_POST['pass'];  



	// Avoid injections on login request
	$username = stripcslashes($u);  
	$password = stripcslashes($p);  
	$username = mysqli_real_escape_string($ConnStr, $username);  
	$password = mysqli_real_escape_string($ConnStr, $password);  

	$querylogin = "SELECT * FROM accounts WHERE USERNAME = '$username' and PASSWORD = SHA1('$password')"; 

	$result = mysqli_query( $ConnStr, $querylogin );

    $row = $result->fetch_assoc();

	// Session begins. Return string.
	if( $result ){ 

        $_SESSION['user'] = $u;
        $_SESSION['pass'] = $p;

        if( isset($_SESSION['user']) ) {

            header('Location: admin/');  

        }
   

	}  

	else {  

	    echo "<h1> Login failed. Invalid username or password.</h1>";  
	} 

}

?>

<?php require_once('loader.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
    <link rel="stylesheet" href="include/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="include/assets/css/styles.css">
    <link rel="stylesheet" href="include/assets/css/Hero-Technology.css">
    <link rel="stylesheet" href="include/assets/css/Google-Style-Login.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-card">

                    <img src="include/assets/img/avatar_2x.jpg" class="profile-img-card">
                    <p class="profile-name-card"> </p>
                    <form class="form-signin" method="POST">

                    	<span class="reauth-email"> </span>
                        <input class="form-control" id="user" name="user" type="email" required="" placeholder="Email address" autofocus="" id="inputEmail" >
                        <input class="form-control" id="pass" name="pass" type="password" required="" placeholder="Password" id="inputPassword">
                        <div class="checkbox">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">Remember me</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg btn-signin" name="login" type="submit">Sign in</button>
                    </form>
                    <!-- Removed for local test purpose: <a href="register.php" class="forgot-password">Create An Account</a> | <a href="#" class="forgot-password">Forgot Password</a></div>-->
                    
            </div>
        </div>
    </div>
    <script src="include/assets/js/jquery.min.js"></script>
    <script src="include/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>