<?php include_once"function.php";

top(); 
if(check_admin_user()){
	
	$id=$_GET['edit'];
	
	echo'<div class="row nav_rule nomargin bd_padding">';


	$conn =dbresult();

	$manageaccount_query ="SELECT * FROM account_admin WHERE `account_admin_id`='$id'";
	$result = mysqli_query($conn, $manageaccount_query) or die(mysqli_error($conn));

	if(mysqli_num_rows($result) > 0){

		$row=mysqli_fetch_assoc($result);

		?>
<form action="manageaccount_update.php" method="post">
		<table class="table">
			<tr><th>Username</th>
			<th>password</th>
			<th>Action</th></tr>
			<tr><td><input type="hidden" name="id" value="<?php echo $row['account_admin_id']; ?>"/>
			<input type="text" name="username" value="<?php echo $row['username']; ?>"/></td>
			<td><input type="text" name="password" value="<?php echo $row['password']; ?>"/></td>
			<td><input type="submit" value="update"/></td></tr>
		</table>
		</form>

		<?php

	}

	admin_do_url('manageaccountofficer.php','Go back ');
}else{
	echo"<p class=\"message\">You are not authorized to view this page</p>";
}
echo"</div>";

foot();
?>