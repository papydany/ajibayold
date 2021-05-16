<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php
if(check_admin_user()){
	
	$oldnews_id=cleansql($_POST['oldnews_id']);
	$news_title=cleansql($_POST['news_title']);
	$news_content=cleansql($_POST['news_content']);
	if(($oldnews_id)&&($news_title)&&($news_content)){
		echo'<div class="row nav_rule nomargin bd_padding">
		<div class="col-sm-12">';
		
		
		if(update_news($oldnews_id,$news_title,$news_content)){
			echo'<div class="col-sm-8 col-sm-offset-2 oldstudent">update of news page successfull.</div>';
		}else{
			echo'<div class="col-sm-8 col-sm-offset-2 message"><p>News page could not be updated now.please try again.</p></div>';
		}
		
	}else{
		echo'<div class="col-sm-8 col-sm-offset-2 message"><p>You have not filled the form completely</p></div>';
	}
	
	admin_do_url('ajibay.php','Go Back To Adminstration');
}else{
	echo"<p class=\"message\">You are not autorised to view these page.</p>";
}

echo"</div></div>";



foot();
?>