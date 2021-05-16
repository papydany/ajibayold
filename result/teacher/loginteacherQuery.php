<?php   include_once"../function/connect.php";  
       //include_once"teacherfunction.php";
  session_start();
 
  ini_set('display_errors', 1);

error_reporting(E_ALL);
  $username=cleansql($_POST['username']);
  $password=cleansql($_POST['password']);

$conn=db();
  
  $query="select * from teacher where username='".$username."' and password='".$password."'";
  $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$result){
    echo"query failed:";
  }
  if(mysqli_num_rows($result) == 1){
    
$r=mysqli_fetch_assoc($result);

$_SESSION['teacherlog'] =2;
$_SESSION['username'] =$username;
$_SESSION['surname'] =$r['surname'];
$_SESSION['firstname'] =$r['firstname'];
$_SESSION['othername'] =$r['othername'];
$_SESSION['class_id'] =$r['class_id'];
$_SESSION['subclass'] =$r['class_category_id'];
$_SESSION['ID'] =$r['Teacher_id'];
$_SESSION['fullname'] =$_SESSION['surname']. '&nbsp;&nbsp;'.$_SESSION['firstname'].'&nbsp;&nbsp;'.$_SESSION['othername'];


header('HTTP/1.1 301 Moved Permanently');
		header('Location:../teacher/index.php' ); 
    exit();
}else{


header('HTTP/1.1 301 Moved Permanently');
		header('Location:../teacher/loginteacher.php?error='.urlencode('invalid login detail'));
		exit();;	
  }


?>