<?php include_once('functions.php');

$conn=db();
if(isset($_GET['id'])){
$id=$_GET['id'];

} 
$query="select name from gallery where gallery.id='$id'";
$result=mysqli_query($conn,$query);
if(!$result){
	echo"<p class=\"bl\">Query Failed.</p>";

}
$image=mysqli_fetch_assoc($result);
$ima=$image['name'];
$delete=unlink("images/".$ima);

if($delete){
	
	$query="delete from gallery where id='$id'";
	$result=mysqli_query($conn,$query);
	if(!$result){
		echo"<p class=\"rd\">Query Failed</p>";
	}
	header("location:gallery.php");
}else{
	echo"failed to delete";
}










?>
