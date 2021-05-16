<?php include_once"../function/include.php";  
include_once"../teacher/teacherfunction.php";
set_time_limit(0);

if(isset($_POST['s'])){
$s =$_POST['year'];
$c =$_POST['c'];
$sc=$_POST['classcat'];
if($c == 6 ||  $c == 3)
{
$term ="Second Term";
}else{
	$term ="Third Term";
}

$class_option=$_POST['school'];
$conn =db();
/*$query="SELECT DISTINCT student_id from student_result where class_id='$c' && class_category_id='$sc' && result_term='$term' && result_year='$s'";
$result =mysqli_query($conn,$query) or die(mysqli_error($conn));
if(mysqli_num_rows($result) != 0){
	while($r=mysqli_fetch_assoc($result)){
		$std_id[] =$r['student_id'];
	}
}*/
$avg = position_first($c,$sc,$s,$term,$class_option);
if(!$avg){
	header('HTTP/1.1 301 Moved Permanently');
		header('Location:promotion.php?e=2'); 
	
	exit();
}
foreach ($avg as $k => $v) {
	if($v['average'] >= 40){
		$id[] = $v['student_id'];
		
	}
}
if($c == 6 ||  $c == 3)
{
$promote = 77;
}else{
$promote = $c+1;
}

foreach ($id as $key => $value) {

	$update ="UPDATE student_profile SET class_id ='$promote' where student_id ='$value'";
	$result =mysqli_query($conn,$update) or die(mysqli_error($conn));
}

if($update){
header('HTTP/1.1 301 Moved Permanently');
		header('Location:../cpanel/promotion.php?e=0'); 
}else{


header('HTTP/1.1 301 Moved Permanently');
		header('Location:../cpanel/promotion.php?e=1');
		exit;	
}
	
}
else{
	echo "submit failed";
}
?>