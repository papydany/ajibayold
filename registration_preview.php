<?php include_once"function.php";

top(); ?>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />

<?php echo'<div class="row nav_rule nomargin bd_padding">';

if(isset($_POST['submit'])){
	 
	 $school=cleansql($_POST['school']);
	 $intendingclass=cleansql($_POST['intendingclass']);
	 $state=cleansql($_POST['state']);
	 $nationality=cleansql($_POST['nationality']);
	 $religion=cleansql($_POST['religion']);
	 $residential=cleansql($_POST['residential']);
	 $postal=cleansql($_POST['postal']);
	 $schoolname1=cleansql($_POST['schoolname1']);
	 $year1=cleansql($_POST['year1']);
	 $class1=cleansql($_POST['class1']);
	 $schoolname2=cleansql($_POST['schoolname2']);
	 $year2=cleansql($_POST['year2']);
	 $class2=cleansql($_POST['class2']);
	 $parent=cleansql($_POST['parent']);
	 $parentaddress=cleansql($_POST['parentaddress']);
	 $relation=cleansql($_POST['relation']);
     $occupation=cleansql($_POST['occupation']);
     $phone=cleansql($_POST['phone']);
	 $healthstatus=cleansql($_POST['healthstatus']);
 


if($_FILES['file']['error'] > 0){
	echo "<h3>problem</h3><br/>";
	switch ($_FILES['file']['error']){
	case 1: echo "<p class=\"message\">File exceeded upload_max_filesizes.</p>";
	break;
	case 2: echo"<p class=\"message\">File exceeedde max_file_size.</p>";
	break;
	case 3: echo"<p class=\"message\">file onlt partially uploaded.</p>";
	break;
	case 4: echo"<p class=\"message\">no file uploaded<p/>";
	break;
	case 6: echo"<p class=\"message\">can not upload file:no temp directory specified</p>";
	break;
	case 7: echo"<p class=\"message\">upload failed: cannot write to disk</p>";
	break;
	}
	registration_form();
	echo"</div>";
foot();
	exit();
	}
	
	
	
	
	
	// getimagesize() returns false if the file tested is not an image. 
if(@!getimagesize($_FILES['file']['tmp_name'])){
	echo"only image are allowed";
}
  // sample filename: 1140732936-filename.jpg 


  
	$now = time(); 
	$file=cleansql($now.'-'.$_FILES['file']['name']);
	
while(file_exists($upfile='images/'.$file))
	
	
	{ 
    $now++; 
} 

	
	if(is_uploaded_file($_FILES['file']['tmp_name'])){
		
		
		
		if(!move_uploaded_file($_FILES['file']['tmp_name'],$upfile))
		{
			echo'<div class=\"oldstudent\">problem: could not move file to destination directory</div>';
			echo"</div>";
			foot();
			exit();
		}else{
			
		
        
   // var_dump($_SESSION['id']);
			
			$conn=db();
		$query="UPDATE form set school='$school',intendingclass='$intendingclass',state='$state',nationality='$nationality',religion='$religion',residential='$residential',postal='$postal',schoolname1='$schoolname1',year1='$year1',class1='$class1',school2='$schoolname2',year2='$year2',class2='$class2',file='$file',healthstatus='$healthstatus',parent='$parent',parentaddress='$parentaddress',relation='$relation',occupation='$occupation',phone='$phone' WHERE id='".$_SESSION['id']."'";
		$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
		if(!$result){
			echo"<p class=\"rd\">Query failed</p>";
		}else{
			echo"<div class='col-xs-12 col-sm-2'><p><a href='print_out.php' target='_blank' class='btn btn-danger'>Print Out</a></p>

              <p> <a href='sign_out.php' class='btn btn-danger'>Sign Out</a></p>


			</div>
			<div class='col-xs-12 col-sm-5 col-sm-offset-1 oldstudent'>Congratulation.Registrarion successfull.</div>";
		}
		}
		
	}else{
		echo' problem:possible file attack.Filename:';
		echo $_FILES['file']['name'];
		echo"</div>";
		foot();
		exit();
	}

	}

if(isset($_POST['sub'])){


  $u=$_POST['username'];
  $p=$_POST['password'];

if(logf($u,$p)){
	$selet=	selectname($u,$p);
   if($selet){
   		
   		$_SESSION['surname']=ucwords($selet['surname']);
   		$_SESSION['name']=ucwords($selet['name']);
   		$_SESSION['othername']=ucwords($selet['othername']);
   		$_SESSION['id']=$selet['id'];


   		$_SESSION['fullname']=$_SESSION['surname']. '&nbsp; ' .$_SESSION['name']. ' &nbsp;' .$_SESSION['othername'];

   		echo "<div class='col-xs-12 col-sm-8 col-sm-offset-4 rd' style='margin-top:40px;'>WELCOME ".$_SESSION['fullname']."</div>";

   		echo"<div class='col-xs-12 col-sm-2'><p><a href='print_out.php' target='_blank' class='btn btn-danger'>Print Out</a></p>

              <p> <a href='sign_out.php' class='btn btn-danger'>Sign Out</a></p>";


   }
}else{
	echo'<div class="col-sm-12 rd">Invalid Password OR username.
	</div>
	<div class="col-sm-10 col-sm-1 rd"><a href="enter_username.php" class="btn btn-danger">GO back</a></div>';

}


}
echo"</div></div>";


 foot();?>