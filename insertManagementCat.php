<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php
echo'<div class="row nav_rule nomargin bd_padding">';

	
if(isset($_SESSION['admin_user'])){
	
	
	display_admin_menu();
	
	
echo'<div class="col-sm-7 col-sm-offset-1">';
	
echo'<div class="col-sm-12 admin_header"<p>Create Management Position</p></div>';
?>
<div class="col-sm-8">
<form action="insertmanagementCatScript.php" method="post">
  <div class="form-group">
    <label>Management Position</label>
   <input type="text" name="position" value="" class="form-control"/>
    </div>
    <div class="form-group">
    <td><input type="submit" value="Enter" class="btn btn-success"/>
  </div>
</form>
</div>

<?php
}else{
	echo"<p class=\"rd\">You are noy authorized to view this page</p>";
}
echo"</div>
</div>";
foot();
?>