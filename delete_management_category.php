<?php include_once"function.php";

if(isset($_GET['category_id']))
{
	$category_id =$_GET['category_id'];

$product=getManagementDetails($category_id);
 if($product == true){
  header('location:management.php');
  }
$conn=db();
$query = 'delete from `management_category` where `id`='.$category_id;

$result=mysqli_query($conn,$query);
	  if($result){
header('location:management.php'); 
	  }
	  exit("something went wrong.please contact you system admin");
}

?>