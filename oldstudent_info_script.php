<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php

if(check_admin_user()){
	
	
	
	echo'<div class="row nav_rule nomargin bd_padding pad_top">';

	display_admin_menu();
	
	echo'<div class="col-sm-7 col-sm-offset-1">';
        $name=cleansql($_POST['name']);
		$phone=cleansql($_POST['phone']);
		$email=cleansql($_POST['email']);
		$year=cleansql($_POST['year']);
		$institution=cleansql($_POST['institution']);
		$course=cleansql($_POST['course']);	
		
		if(($year)&&($name)&&($institution)){
			
			if(insert_oldstudent_info($year,$name,$email,$phone,$institution,$course)){
			echo'<div class="col-sm-12 oldstudent"><p>Old student infomation has been  added to database successfully.</p></div>';
		}else{
			echo'<div class="col-sm-12 oldstudent"><p>Old student information could not be added to database.</p></div>';
		}
	}else{
	echo'<div class="col-sm-12 oldstudent"><p> you did not fill out the asteric (<span class="rd">*</span>) column.try again.</p></div>';
	}
}else{
	echo"<p>you are not authorised to view this page</p>";
}
echo"</div>
</div>";


foot();
?>