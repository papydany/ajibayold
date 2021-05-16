<?php
function db(){
/*$hostname_ajibay = "localhost";
$database_ajibay = "ajibaysc_ajibay";
$username_ajibay = "ajibaysc_root";
$password_ajibay = "ajibay2013@";
*/



$hostname_ajibay = "localhost";
$database_ajibay = "ajibaysc_ajibay";
$username_ajibay = "root";
$password_ajibay = '';

$ajibay = mysqli_connect($hostname_ajibay, $username_ajibay, $password_ajibay,$database_ajibay );
if(!$ajibay){
	 trigger_error(mysql_error(),E_USER_ERROR); 
}else{
return $ajibay;
}
}

function dbresult(){
$hostname_ajibay = "localhost";
$database_ajibay = "ajibaysc_result";
$username_ajibay = "ajibaysc_root1";
$password_ajibay = "ajibay1234@";




/*$hostname_ajibay = "localhost";
$database_ajibay = "ajibaysc_result";
$username_ajibay = "root";
$password_ajibay = '';*/

$ajibay = mysqli_connect($hostname_ajibay, $username_ajibay, $password_ajibay,$database_ajibay );
if(!$ajibay){
	 trigger_error(mysql_error(),E_USER_ERROR); 
}else{
return $ajibay;
}
}



function cleansql($strg)
{

	$conn=db();
	$dresult = "";
	
	if(get_magic_quotes_gpc())
	{
		 $dresult = mysqli_real_escape_string(stripslashes($conn,$strg));
		 $dresult = trim($dresult);
		 $dresult = htmlspecialchars($dresult);
	}
	else
	{
	
		$dresult =  mysqli_real_escape_string($conn,$strg);
		$dresult = trim($dresult);
		$dresult = htmlspecialchars($dresult);
	}
	
	return $dresult;
} 
?>
