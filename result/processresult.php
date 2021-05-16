<?php  include_once"function/include.php";  
       
$_SESSION['session'] = $_GET['session'];

 $std_id =$_SESSION['S_ID'];
        //$c =$_SESSION['S_class_id'];
       // $sc =$_SESSION['S_subclass'];
        $no=$_SESSION['S_student_no'];

        $term = $_GET['term'];
        $year = $_GET['year'];
        $c =$_GET['c'];
        $sc =$_GET['classcat'];

//;
//exit();

header("location:viewstudentresult.php?t=$term&year=$year&class=$c&subclass=$sc");

 exit('<span style="font-family:tahoma; font-size:13px;">Loading Result Report Environment ..</span>');

?>