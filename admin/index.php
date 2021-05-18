
<?php 
	session_start();

	include_once('config/connect.php');
	if(isset($_SESSION['account']) && isset($_SESISON['pass'])){
		include_once('admin.php');
		echo $_SESSION['CREATED'];
		if (isset($_SESSION['CREATED']) && (time() - $_SESSION['CREATED'] > 60)) {
			// last request was more than 30 minutes ago
			session_unset();     // unset $_SESSION variable for the run-time 
			session_destroy();   // destroy session data in storage
		}
	}else include_once('login.php');
?>