<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php
echo'<div class="row nav_rule nomargin bd_padding">';

	if(isset($_SESSION['admin_user'])){
	
	$conn=db();
	if(!filled_out($_POST)){
	echo"<div class=\"oldstudent col-sm-8 col-sm-offset-2\"><p>
	You did not filled the form completely.try again.</p></div>";
	managementTeamForm();
	admin_do_url("ajibay.php","Go back to Admin");
		echo"</div>";
		  foot();;
		exit();
	}else{
		
		
	if(isset($_POST['surname']) && isset($_POST['name'])
	 && isset($_POST['title']) &&  isset($_POST['qualification'])){
		  $surname=cleansql($_POST['surname']);
		  $name=cleansql($_POST['name']);
		  $title=cleansql($_POST['title']);
		  $position=cleansql($_POST['position']);
		  $qualification=cleansql($_POST['qualification']);
	  }
	  if($_FILES['file']['error'] > 0){
	echo '<div class="col-sm-8 cols-sm-0ffset-2"> <h3 class=\"rd\">Problem</h3>';
	switch ($_FILES['picture']['error']){
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

	managementTeamForm();
	admin_do_url("ajibay.php","Go back to Admin");
	echo"</div>";
	  foot();;
	exit();
	}
	// getimagesize() returns false if the file tested is not an image. 

  // sample filename: 1140732936-filename.jpg 


  
	$now = time(); 
	$picture=cleansql($now.'-'.$_FILES['file']['name']);
	
	
while(file_exists($upfile='images/post-images/team/'.$picture))
	
	
	{ 
    $now++; 
} 

	
	if(is_uploaded_file($_FILES['file']['tmp_name'])){
		
		
		
		if(!move_uploaded_file($_FILES['file']['tmp_name'],$upfile))
		{
			echo'<p>problem: could not move file to destination directory</p>';
			admin_do_url("admin.php","Go back to Admin");
			exit();
		}else{
			
		 $query="insert into management value('','$picture','$title','$surname','$name',
		'$position','$qualification')";
		$result=mysqli_query($conn,$query);
		if(!$result){
			echo"Query failed";
		}else{
			echo'<div class="col-sm-8 col-sm-offset-2 oldstudent">
			Congratulation.&nbsp;'.$surname.'&nbsp; successfull uploaded.</p></div>';
		}
		}
		
	}else{
		echo' <p>problem:possible file attack.Filename:</p>';
		echo $_FILES['file']['name'];
		admin_do_url("admin.php","Go back to Admin");
		exit();
	}
	echo"<br/>&nbsp;";
	admin_do_url("ajibay.php","Go back to Admin");
	}
}else{
	echo"<p class=\"rd\">You are not authorized to view this page</p>";
}
	echo"</div></div>";


  foot();;
?>
		