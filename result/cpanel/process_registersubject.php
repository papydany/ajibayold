<?php include_once"../function/include.php";

$allcheck =$_POST['check'];
$all=count($allcheck);
if($all != 0){
	$year = $_POST['year'];
	$term = $_POST['term'];
	$class_option=$_POST['class_option'];
	$status ="C";
foreach ($allcheck as $value) {
        $check=$value; 
		$no=$check;
		$subject_id=$_POST['sub'][$no];

		$s = select_compulsary_subject($subject_id,$class_option,$status,$term,$year);
		if(count($s) == 0){
     $insert =  insert_compulsary_subject($subject_id,$class_option,$status,$term,$year);
		}else{
     $update = update_compulsary_subject($subject_id,$class_option,$status,$term,$year);
		}
	}
if($insert == true || $update == true){
		header('location: registersubject.php?s=1');
		exit();
	}else{
		header('location: registersubject.php?s=0');
		exit();
	}
}else{
	header('location: registersubject.php?s=2');
		exit();
}
?>