<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php

echo'<div class="row nav_rule nomargin bd_padding">';
$conn=db();	
	
if(isset($_POST['name'])){
	$write=cleansql($_POST['name']);
}




echo'<div class="col-sm-12">';
if($_FILES['picture']['error'] > 0){
	echo '<div class="col-sm-12"><h3 class="rd">problem</h3></div>
	<div class="col-sm-8 col-sm-offfset-2 oldstudent">';
	switch ($_FILES['picture']['error']){
	case 1: echo "<p>File exceeded upload_max_filesizes.</p>";
	break;
	case 2: echo"<p>File exceeedde max_file_size.</p>";
	break;
	case 3: echo"<p>file onlt partially uploaded</p>";
	break;
	case 4: echo"<p>no file uploaded</p>";
	break;
	case 6: echo"<p>can not upload file:no temp directory specified</p>";
	break;
	case 7: echo"<p>upload failed: cannot write to disk</p>";
	break;
	}
	echo'</div>';
	upload_form();
	echo'<div class="col-sm-12">';
	admin_do_url("ajibay.php","Go back to Admin");
	echo"</div></div></div>";
	foot();
	exit();
	}
	$now = time(); 
	$name=cleansql($now.'-'.$_FILES['picture']['name']);
	
	
while(file_exists($upfile='images/'.$name))
	
	
	{ 
    $now++; 
} 

	
	if(is_uploaded_file($_FILES['picture']['tmp_name'])){
		
	/*	 $manipulator = new ImageManipulator($_FILES['picture']['tmp_name']);
        // resizing to 200x200
        $newImage = $manipulator->resample(200, 200);
        // saving file to uploads folder
        $manipulator->save($upfile);
        echo 'Done ...';*/
		
		if(!move_uploaded_file($_FILES['picture']['tmp_name'],$upfile))
		{
			echo'problem: could not move file to destination directory';
			exit();
		}else{
$query="insert into gallery value('','$name','$write')";
		$result=mysqli_query($conn,$query);
		if(!$result){
			echo"Query failed";
		}else{
			echo'<div class="col-sm-8 col-sm-offset-2 oldstudent"><p>Congratulation.Picture successfull uploaded.</p></div>';
		}
		}
		
	}else{
		echo' problem:possible file attack.Filename:';
		echo $_FILES['picture']['name'];
		exit();
	}
	echo"<br/>&nbsp;";
	admin_do_url("ajibay.php","Go back to Admin");
	echo"</div></div>";


foot();
?>

