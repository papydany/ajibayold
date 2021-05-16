<?php
include_once"../function/include.php";  
	if( isset($_SESSION['teacherlog'] )) {
		session_unset($_SESSION['teacherlog']);
	}
	session_unset();
	session_destroy();

	header('HTTP/1.1 301 Moved Permanantly');
	header('Location:loginteacher.php');
	exit( '100% LogOut' );

?>