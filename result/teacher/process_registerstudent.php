<?php
  include_once"../function/include.php";  
   include_once"teacherfunction.php";

if(isset($_POST['submit'])){
       $term=$_POST['term'];
       $year=$_POST['year'];
       $date = date('Y-m-d');

     $check_student_exixt =  select_student_reg($year, $_SESSION['class_id'], $_SESSION['subclass'],$term);

     $profile_id =select_student_profile_id($_SESSION['class_id'], $_SESSION['subclass']);
$p = array();
$pr =array();

if(count($profile_id) == 0){


header('location:registerstudent.php?r=0');
exit();
}


  foreach ($check_student_exixt as $k => $v) {
     	$p[] = $v['student_id'];

     
}  
     if(count($check_student_exixt) != 0){
     
     	foreach ($profile_id as $key => $value) {
 

     		if(!in_array($value['student_id'], $p)){
          $pr[] = $value['student_id'];
        }
     	}
   
}else{

foreach ($profile_id as $key => $value) {

  $pr[] =$value['student_id'];
}

}

if(count($pr) != 0){

foreach ($pr as $key => $value) {


  $profile =select_student_profile_to_reg($value, $_SESSION['class_id'], $_SESSION['subclass']);

foreach ($profile as $k => $v) {

     $insert =  insert_student_reg($v['student_id'],$v['student_no'],$_SESSION['subclass'],$_SESSION['class_id'],$term,$year,$date);
     

        }
  # code...
}

     //else{
     

            if($insert == true){
            header('location:registerstudent.php?r=1');
             exit();
            }else{
            	header('location:registerstudent.php?r=2');
              exit();
            }
          }else{
          header('location:registerstudent.php?r=1');
              exit();

          }
       }




?>