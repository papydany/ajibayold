<?php include_once('functions.php');

$conn=db();
if(isset($_POST['id'])){
$id=$_POST['id'];

} 
$query="select pictureName from management where id='$id'";
$result=mysqli_query($conn,$query);
if(!$result){
	echo"<p class=\"bl\">Query Failed.</p>";

}
$image=mysqli_fetch_assoc($result);
$ima=$image['pictureName'];
$delete=unlink("images/post-images/team/".$ima);

if($delete){
	
	$query="delete from management where id='$id'";
	$result=mysqli_query($conn,$query);
	if(!$result){
		echo"<p class=\"rd\">Query Failed</p>";
	}
	header("location:management.php");
}else{
	echo"failed to delete";
}
?>