<?php include_once"function.php";

top(); ?>


<?php
if(isset($_GET['id'])){
	
	$newsID=$_GET['id'];
}
echo'<div class="row nav_rule nomargin bd_padding">';
	
	
$newscontent=@get_news_content($newsID);
display_content($newscontent);
if(isset($_SESSION['admin_user'])){
	
	admin_do_url("edit_news.php?id=".$newsID,"EDIT NEWS");
		
		
		

	}

echo"</div>";

foot();
?>