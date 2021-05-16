<?php   include_once"../function/include.php";  
       include_once"teacherfunction.php";


	$allcheck =$_POST['check'];
	
$all=count($allcheck);
//echo $all;

	if($all != 0){
//var_dump($allcheck);
	foreach ($allcheck as $value) {
        $check=$value; 
		$no=$check;

		$reg_id=$_POST['reg'][$no];
		
		$student_id=$_POST['student_id'][$no];
		
		$ca=cleansql($_POST['ca'][$no]);
		
		$student_no=$_POST['student_no'][$no];
		
		$exam=cleansql($_POST['exam'][$no]);
		
		$total=cleansql($_POST['total'][$no]);
        
        $subject=$_SESSION['subject_id'];
		
		$class_id=$_SESSION['class_id'];

		$class_category_id=$_SESSION['subclass'];
		
		$term=$_SESSION['term'];

		$session= $_SESSION['session'];
//  select student result function
/*echo $exam;
echo"<br/>";
echo $ca;
exit();*/
		$r = select_result($student_id,$student_no,$class_id,$class_category_id,$reg_id,$subject,$term,$session);

		if(count($r) == 0){
       //   insert result
     $insert = insert_result($student_id,$student_no,$class_id,$class_category_id,$reg_id,$subject,$ca,$exam,$total,$term,$session);
		}else{
     //  update result
      $update = update_result($student_id,$student_no,$class_id,$class_category_id,$reg_id,$subject,$ca,$exam,$total,$term,$session);
		}

		# code...
	}
	if($insert == true || $update == true){
		header('location: resultform.php?s=1');
		exit();
	}else{
		header('location: resultform.php?s=0');
		exit();
	}
}else{
	header('location: resultform.php?s=2');
		exit();
}

?>