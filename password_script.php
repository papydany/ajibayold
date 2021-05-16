<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php
check_admin_user();



if(isset($_POST['newpassword'])&&isset($_POST['newpassword2'])&&isset($_POST['oldpassword'])){
	$newpass=$_POST['newpassword'];
	$newpass2=$_POST['newpassword2'];
	$oldpass=$_POST['oldpassword'];
	
	echo'<div class="row nav_rule nomargin bd_padding">
	<div class="col-sm-8 col-sm-offset-2">'; 
	
	if((!$newpass)&&(!$newpass2)&&(!$oldpass)){
		
		echo"<p class=\"message\">You have not filled the form completely.
		try again.</P>";
		display_change_password();
		admin_do_url('ajibay.php','GO BACK TO ADMIN');
		echo"</div>";
		  foot();;
		exit();
	}else{
		if($newpass != $newpass2){
			echo"<p class=\"message\">the new password entered are not the same.</p>";  
			display_change_password();
		}else if((strlen($newpass) > 16 )|| (strlen($newpass) < 6)){
			echo"<p class=\"message\" >Password must be between 6 and 16 characters.please try again.</p>";
			display_change_password();
		}else{
			//$newpass=sha1($newpass);
			//$oldpass=sha1($oldpass);
		if(changed_password($_SESSION['admin_user'],$oldpass,$newpass))
			{
				echo'<div class="col-sm-8 col-sm-offset-2 oldstudent"><p>Password changed successfull.</p></div>';
			}else{
				echo"<p class=\"message\"> changing of password fail.Try again.</p>";
			}
		}
	}
	admin_do_url('ajibay.php','Go To Admin');
}
echo"</div></div>";



  foot();;
?>