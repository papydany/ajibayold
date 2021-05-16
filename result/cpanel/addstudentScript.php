<?php
include_once"../function/include.php";  
       include_once"adminFunction.php";

admincheck();
$class=$_POST['class'];
$classcat=$_POST['classcat'];
$class_option=$_POST['school'];
$year=$_POST['year'];
$status='present';
//$surname=$cleansql(strtoupper($_POST['sn']));
//$firstname=$cleansql(strtoupper($_POST['fn']));
//$othername=$cleansql(strtoupper($_POST['on']));
$failed_list=array();
$clean_list = array();
$conn =db();


	foreach( $_POST['mn'] as $k=>$ll ) {
		
		if( isset($clean_list[$ll]) ) {
			$failed_list[] = array( 'fullname'=>cleansql(strtoupper($_POST['sn'][$k])).' '.cleansql(strtoupper($_POST['fn'][$k])).''.cleansql(strtoupper($_POST['on'][$k])), 
												'student_no'=>$ll );			
		} else if( !empty($ll) ) {
			$clean_list[$ll] = array('surname'=>cleansql(strtoupper($_POST['sn'][$k])), 'firstname'=>cleansql(strtoupper($_POST['fn'][$k])), 'othername'=>cleansql(strtoupper($_POST['on'][$k])),'student_no'=>$ll,'gender'=>$_POST['sex'][$k],'student_id'=>'' );
		}
		
	}

	$student_no = array();
	foreach( $clean_list as $kk=>$vv ){
		$student_no[] = $vv['student_no'];
	}

	$checkall = mysqli_query( $conn, 'SELECT student_no FROM student_profile WHERE student_no IN ("'.implode('","', $student_no).'")') or die( mysqli_error($conn) );
	
	if( mysqli_num_rows($checkall)>0 ) {
		while( $f = mysqli_fetch_assoc($checkall) ) {
			// adds to failed_list
			$failed_list[] = array( 'fullname'=>$clean_list[ $f['student_no'] ]['surname'].' '.$clean_list[ $f['student_no'] ]['firstname'].' '.$clean_list[ $f['student_no'] ]['othername'], 
									'student_no'=>$clean_list[ $f['student_no'] ]['student_no'] );
			// deletes it
			unset( $clean_list[ $f['student_no'] ] );
		}
	}


	if(count($clean_list) != 0){


foreach ($clean_list as $key => $value) {
       # code...
      $sn = $clean_list[$key]['student_no'];
      $s = $clean_list[$key]['surname'];
      $f = $clean_list[$key]['firstname'];
      $o = $clean_list[$key]['othername'];
      $g = $clean_list[$key]['gender'];





  $query="INSERT INTO student_profile (student_no,surname,firstname,othername,class_id,class_category_id,class_option_id,gender,year_joined,status) values('".$sn."','".$s."','".$f."','".$o."','".$class."','".$classcat."','".$class_option."','".$g."','".$year."','".$status."')";
  
  
       $e = mysqli_query($conn,$query) or die(mysqli_error($conn, 'error'));
}
       if($e){
              header('Location: addstudent.php?i=1');
   //   $msg="<p class='success'>subject successfully created.</p>";
       }else{
        header('Location: addstudent.php?i=0');
        // $msg="<p class='error'>Failed :Please try again.</p>";
       }
}else{

        header('Location: addstudent.php?i=2');
    //   $msg="<p class='success'>subject successfully created.successfully</p>"; 
}

	?>