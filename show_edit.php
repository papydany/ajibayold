<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />

<style type="text/css">


.table > tbody > tr > th{
	border-top:none;
}
.table > tbody > tr > td{
border-top: none;
}
</style>
<?php
if(check_admin_user()){
echo'<div class="row nav_rule nomargin bd_padding">';	
$id=$_GET['id'];
$drink=g_oldstudent($id);
display_oldstudent_4admin($drink);
}else{
	echo"<p class=\"rd\">You are not authorised to view this page.</p>";
}
echo"</div>";
foot();
?>
