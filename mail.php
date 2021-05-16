<?php include_once"function.php";

top(); 
echo'<div class="row nav_rule nomargin bd_padding">';
	if(!filled_out($_POST)){
		echo"<p class=\"message\">
		You did not filled the form completely.<br/>try again.</p>
		</div>";
		foot();
		exit();
	}else{
		
		
	if(isset($_POST['name']) && isset($_POST['email']) &&
	
	 isset($_POST['message'])){
	$name=cleansql($_POST['name']);
	$email=cleansql($_POST['email']);
	
	$message=cleansql($_POST['message']);
	
	 }
		$subject= "Message for you"; 
 $from ='From '.$name.'('.$email.')'; //enter your email address
 $to = "info@ajibayschools.com.ng"; 
$text =wordwrap($message,70);
$mail=mail($to,$subject,$text,$from);
if($mail){
	echo'<div class="alert alert-success" ><p>Message successfully sent!</p></div>';
}else{
	echo'<div class="alert alert-danger" ><p>Message sending failed!</p></div>';

}
  }
  
  
  
  
  


  echo"</div>";
  foot();
 ?>



