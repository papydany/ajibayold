<?php include_once"function.php";

top(); 
echo'<div class="row nav_rule nomargin bd_padding">
<div class="col-sm-12">';
if(check_admin_user()){
	if(isset($_POST['news_id'])){
		$news_id=$_POST['news_id'];
		if(delete_news($news_id)){
			echo'<div class="col-sm-8 col-sm-offset-2 oldstudent">NEWS succefully deleted.</div>';
		}else{
			echo'<div class="col-sm-8 col-sm-offset-2 message"><p>News can not be deleted.</p></div>';
		}
	}else{
		echo"<p class=\"message\">we need an NEWS ID of a news to be able to delete news.</p>";
	}
	admin_do_url('ajibay.php','Go Back To Adminstration');
}else{
	echo"<p class=\"message\" >You are not authorised to view this page.</p>";
}
echo"</div></div>";



foot();
?>