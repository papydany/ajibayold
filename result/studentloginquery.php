<?php session_start();
 include"function/connect.php";  
 
if( isset($_SESSION['studentlogin']) && 1 == $_SESSION['studentlogin'] ) {
		
	header('HTTP/1.1 301 Moved Permanently');
	header('Location:student.php');
	exit;

}
 $reg_no=cleansql($_POST['reg_no']);
  $pin=cleansql($_POST['pin']);
	

$conn=db();
  
  $query="SELECT *  from student_profile where student_no='".$reg_no."' and pin='".$pin."'";
  $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$result){
    echo"query failed:";
  }
if(mysqli_num_rows($result) == 1){
  $r=mysqli_fetch_assoc($result);

$_SESSION['studentlogin'] =1;
$_SESSION['S_student_no'] =$reg_no;
$_SESSION['S_surname'] =$r['surname'];
$_SESSION['S_firstname'] =$r['firstname'];
$_SESSION['S_othername'] =$r['othername'];
$_SESSION['S_class_id'] =$r['class_id'];
$_SESSION['S_subclass'] =$r['class_category_id'];
$_SESSION['S_class_option'] =$r['class_option_id'];
$_SESSION['S_ID'] =$r['student_id'];
$_SESSION['S_fullname'] =$_SESSION['S_surname']. '&nbsp;'.$_SESSION['S_firstname'].'&nbsp;'.$_SESSION['S_othername'];
$_SESSION['gender'] = $r['gender'];
	


	header("Location:student.php"); 

		exit();
}else{
header("Location:studentlogin.php?error=".urlencode('invalid login detail'));

//header('HTTP/1.1 301 Moved Permanently');
		
		exit();	
}
 
  ?>
