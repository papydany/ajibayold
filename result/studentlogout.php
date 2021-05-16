<?php include_once("function/include.php") ;

$_SESSION = array();
	if( isset($_COOKIE[session_name()]) ) {
		setcookie(session_name(), '', $_SERVER['REQUEST_TIME']-60*60*24*100, '/');
	}
	session_unset();
	session_destroy();

	header('HTTP/1.1 301 Moved Permanantly');
	header('Location:index.php');
	exit( '100% LogOut' );
	?>