<?php include_once"../function/include.php";  
$conn =db();
if( !empty($_GET['absent'] ) ) {
$update ='UPDATE student_profile SET `status` ="absent" WHERE `student_id`='.$_GET['absent'];
$success = mysqli_query($conn,$update) or die(mysqli_error($conn));
if($success){
header('Location:viewregisterstudent.php?up="1"');
}else{
header('Location:viewregisterstudent.php?up="0"');
}
}

?>