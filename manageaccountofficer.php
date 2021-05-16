<?php include_once"function.php";

top(); ?>
 
<?php echo'<div class="nav_rule nomargin bd_padding" style="padding-top:10%;">';
if(check_admin_user()){


	$conn =dbresult();

	$manageaccount_query ="SELECT * FROM account_admin";
	$result = mysqli_query($conn, $manageaccount_query) or die(mysqli_error($conn));

	if(mysqli_num_rows($result) > 0){

		$row=mysqli_fetch_assoc($result);

		?>

		<table class="table">
			<tr><th>Username</th>
			<th>password</th>
			<th>Action</th></tr>
			<tr><td><?php echo $row['username']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><?php admin_do_url("manageaccount_edit.php?edit=".$row['account_admin_id'],"Change"); ?></td></tr>
		</table>

		<?php

	}





	admin_do_url("admin_account.php","back to account menu");} echo"</div>";
foot();?>