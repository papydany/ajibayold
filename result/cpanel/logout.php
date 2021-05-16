<?php error_reporting(E_ALL);
    ini_set("display_errors", 1);
include_once"../function/include.php";  

	if( isset($_SESSION['superadmin'] )) {
		session_unset($_SESSION['superadmin']);
	}
	session_unset();
	session_destroy();

	header('HTTP/1.1 301 Moved Permanantly');
	header('Location:../cpanel/login.php');
	exit( '100% LogOut' );

?>