<?php
      include_once"../function/include.php";  
       include_once"adminFunction.php";
$_SESSION['session'] = $_GET['session'];

$class_id =$_GET['class_id'];

$subclass =$_GET['subclass'];
$term=$_GET['term'];

//echo $class_id.$subclass;
//;
//exit();

header("location:c_displayresult.php?ses=".$_SESSION['session']."&class_id=$class_id&subclass=$subclass&term=$term");

 exit('<span style="font-family:tahoma; font-size:13px;">Loading Result Report Environment ..</span>');

?>