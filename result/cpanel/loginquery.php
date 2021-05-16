<?php   
       include_once"../function/include.php";  
       include_once"adminFunction.php";
  
if( isset($_SESSION['superadmin']) && 0== $_SESSION['superadmin'] ) {
		
	header('HTTP/1.1 301 Moved Permanently');
	header('Location:../cpanel/index.php');
	exit();
	
}

  $username=cleansql($_POST['username']);
  $password=cleansql($_POST['password']);

$conn=db();
  
  $query="select * from teacher where username='".$username."' and password='".$password."' and status1=0";
  $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$result){
    echo"query failed:";
  }
  if(mysqli_num_rows($result) == 1){
    
$r=mysqli_fetch_assoc($result);

$_SESSION['superadmin'] = 0;

$_SESSION['admin_surname'] =$r['surname'];

$_SESSION['admin_id'] =$r['Teacher_id'];



header('HTTP/1.1 301 Moved Permanently');
		header('Location:../cpanel/index.php');
    exit(); 
}else{


header('HTTP/1.1 301 Moved Permanently');
	header('Location:../cpanel/login.php?error='.urlencode('invalid login detail'));
		exit();	
  }


?>