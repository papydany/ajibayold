<?php  include_once"../function/include.php";  
      // include_once"adminFunction.php";

$conn =db();
if( !empty($_GET['i'] ) ) {
		mysqli_query( $conn, 'DELETE FROM teacher WHERE Teacher_id = '.$_GET['i'].' LIMIT 1');
		mysqli_query( $conn, 'OPTIMIZE table teacher');
	
		header('HTTP/1.1 301 Moved Permanently');
		header('Location:ViewTeacher.php');
		
}

		if( !empty($_GET['s'] ) ) {
		mysqli_query( $conn, 'DELETE FROM subject WHERE subject_id = '.$_GET['s'].' LIMIT 1');
		mysqli_query( $conn, 'OPTIMIZE table teacher');
	
		header('HTTP/1.1 301 Moved Permanently');
		header('Location:subject.php');
	}