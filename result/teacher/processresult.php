<?php
      include_once"../function/include.php";  
       include_once"teacherfunction.php";
$_SESSION['session'] = $_GET['session'];

$class_id =$_SESSION['class_id'];

$subclass =$_SESSION['subclass'];
$term=$_GET['term'];


//;
//exit();

header("location:displayresult.php?ses=".$_SESSION['session']."&class_id=$class_id&subclass=$subclass&term=$term");

 exit('<span style="font-family:tahoma; font-size:13px;">Loading Result Report Environment ..</span>');

?>