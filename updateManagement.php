<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php
if(check_admin_user()){
echo'<div class="row nomargin nav_rule bd_padding">
<div class="col-sm-12">';
 if(isset($_POST['id']) && isset($_POST['title']) 
&& isset($_POST['surname']) && isset($_POST['name']) 
&& isset($_POST['qualification'])){
	
	$id=cleansql($_POST['id']);
	$title=cleansql($_POST['title']);
	$surname=cleansql($_POST['surname']);
	$name=cleansql($_POST['name']);
	$qualification=cleansql($_POST['qualification']);
	$file=cleansql($_FILES['file']['name']);
	
}

if(empty($file)){
	
			
			if(updateManagement($id,$title,$surname,$name,$qualification)){
				echo'<div class="col-sm-6 col-sm-offset-3 oldstudent"><p>update successfull</p></div>';
				
			}else{
				echo"<p class=\"rd\">update not successsfull now.try again.</p>";
			}
				admin_do_url('ajibay.php','Go TO ADMIN');
		}else{

     if($_FILES['file']['error'] > 0){
	echo '<div class="col-sm-8 cols-sm-0ffset-2"> <h3 class=\"rd\">Problem</h3>';
	switch ($_FILES['file']['error']){
	case 1: echo "<p class=\"rd\"File exceeded upload_max_filesizes.</p>";
	break;
	case 2: echo"<p class=\"rd\">File exceeedde max_file_size.</p>";
	break;
	case 3: echo"<p class=\"rd\">file onlt partially uploaded</p>";
	break;
	case 4: echo"<p class=\"rd\">no file uploaded</p>";
	break;
	case 6: echo"<p class=\"rd\">can not upload file:no temp directory specified</p>";
	break;
	case 7: echo"<p class=\"rd\">upload failed: cannot write to disk</p>";
	break;
	}

echo'</div>';

admin_do_url("ajibay.php","Go back to Admin");
	echo"</div></div>";
	foot();
	exit();
	}


	$now = time(); 
	$picture=$now.'-'.$_FILES['file']['name'];
	
	
while(file_exists($upfile='images/post-images/team/'.$picture))
	
	
	{ 
    $now++; 
} 

	
	if(is_uploaded_file($_FILES['file']['tmp_name'])){
		
		
		
		if(!move_uploaded_file($_FILES['file']['tmp_name'],$upfile))
		{
			echo'<p>problem: could not move file to destination directory</p>';
			admin_do_url("ajibay.php","Go back to Admin");
			exit();
		}else{


if(updateManagement2($id,$picture,$title,$surname,$name,$qualification)){
				echo'<div class="col-sm-6 col-sm-offset-3 oldstudent"><p>update successfull2</p></div>';
			}else{
				echo"<p class=\"rd\">update not successsfull now.try again.</p>";
			}



		}
	}

		}
			
	}else{
	echo"<p class=\"rd\">You are not authorised to view this page.</p>";
}

			
	echo"</div></div>";

foot();
?>
