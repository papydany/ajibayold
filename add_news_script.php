<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php
echo'<div class="row nav_rule nomargin bd_padding">';
if(check_admin_user()){
	if(filled_out($_POST)){
	if(isset($_POST['news_title'])&& isset($_POST['news_content'])){
		$news_title=cleansql($_POST['news_title']);
		$news_content=cleansql($_POST['news_content']);
		if(insert_news($news_title,$news_content)){
			echo'<div class="oldstudent col-sm-6 col-sm-offset-3"><p>News with Title&nbsp;<b>'.stripslashes($news_title).'</b> &nbsp;has been added to the database.</p></div>';
		}else{
			echo'<div class="oldstudent col-sm-6 col-sm-offset-3"><p>News with Title<b>'.stripslashes($news_title).'</b> could not be added to the database.</p></div>';
		}
	}
	}else{
		echo'<div class="col-sm-7">
		<div class="oldstudent col-sm-6 col-sm-offset-3"><p class="message">You have not filled the form completely.please try again.</p></div>';
		add_news_form();

	}
	admin_do_url("ajibay.php","back to adminstraion menu");
	echo'</div>';
}
echo"</div>";



foot();
?>