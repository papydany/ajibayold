<?php 
// function to get news title from its database
function get_news($offset,$rowperpage){
	$conn=db();
	//=================================================
	
	
 // get info from db
$query="select * from news order by id desc limit $offset,$rowperpage";
	$result=mysqli_query($conn,$query);
	if(!$result){
		return false;
	}
	$num_row=mysqli_num_rows($result);
	if($num_row==0){
		return false;
		
		
		
	}
	
	$result=db_result_to_array($result);
	return $result;
}
//=====================================================================
// function to turn result in to array
  function db_result_to_array($result){
	  $res_array= array();
	   for($count=0; $row=mysqli_fetch_assoc($result); $count++){
		   $res_array[$count] = $row;
	   }
	   return $res_array;
  }
  //==================================================================
  // function to get news content
  function get_news_content($newsID){
	  $conn=db();
	  $query="select * from news where id='$newsID'";
	  $result=mysqli_query($conn,$query);
	  if(!$result){
		  return false;
	  }
	  $num_row=mysqli_num_rows($result);
	  
	  if($num_row == 0){
		  return false;
	  }
	  $row=mysqli_fetch_assoc($result);
	  return $row;
  }
  //=============================================================
 function filled_out($form){
	foreach ($form as $key=>$value){
		if((!isset($key))|| ($value=='')){
			return false;
		}
	}
return true;
}
//=================================================================

function do_url($url,$title){
	?>
   <a href="<?php echo $url; ?>"><?php echo$title; ?></a>
    <?php
}


function edit_do_url($url,$title){
	?>
   <a href="<?php echo $url; ?>" class="btn btn-danger btn-xs"><?php echo"&nbsp;".$title; ?></a>
    <?php
}
//=================================================================
function get_oldstudent_year(){
	$conn=db();
	$query="select id,year from year_category";
	$result=mysqli_query($conn,$query);
	if(!$result){
		return false;
	}
	$num_cat=mysqli_num_rows($result);
	if($num_cat==0){
		return false;
	}
	$result=db_result_to_array($result);
	return $result;
}
//=================================================================

function getManagementCat(){
	$conn=db();
	$query="select id,managementCategory from management_category";
	$result=mysqli_query($conn,$query);
	if(!$result){
		return false;
	}
	$num_cat=mysqli_num_rows($result);
	if($num_cat==0){
		return false;
	}
	$result=db_result_to_array($result);
	return $result;
}
//==============================================================
function getManagementDetails($catid){
	  if((!$catid) || ($catid==0)){
		  return false;
	  }
	  $conn=db();
	  $query="select * from management where position='".$catid."'";
	  $result=mysqli_query($conn,$query);
	  if(!$result){
		  return false;
	  }
	  $num_book=mysqli_num_rows($result);
	  if($num_book==0){
		  return false;
	  }
	  $result=db_result_to_array($result);
	return $result;
	  
  }

//===============================================================
function get_old_year($catid){
	 $conn=db();
	 $query="select year from year_category where id='".$catid."'";
	 $result=mysqli_query($conn,$query);
	 if(!$result){
		 return false;
	 }
	 $num_cat=mysqli_num_rows($result);
	if($num_cat==0){
		return false;
	}
	$row=mysqli_fetch_assoc($result);
	return $row['year'];
  }
 
//=================================================================
function get_oldstudent($catid){
	  if((!$catid) || ($catid==0)){
		  return false;
	  }
	  $conn=db();
	  $query="select * from old_student_info where year_id='".$catid."' order by name asc";
	  $result=mysqli_query($conn,$query);
	  if(!$result){
		  return false;
	  }
	  $num_book=mysqli_num_rows($result);
	  if($num_book==0){
		  return false;
	  }
	  $result=db_result_to_array($result);
	return $result;
	  
  }
  //================================================================
  function g_oldstudent($catid){
	  if((!$catid) || ($catid==0)){
		  return false;
	  }
	  $conn=db();
	  $query="select * from old_student_info where id='".$catid."'";
	  $result=mysqli_query($conn,$query);
	  if(!$result){
		  return false;
	  }
	  $num_book=mysqli_num_rows($result);
	  if($num_book==0){
		  return false;
	  }
	  $result=db_result_to_array($result);
	return $result;
	  
  }
	  
  //=============================================================-==
  function update_oldstudent($id,$name,$email,$phone,$institution,$course){
	  
	  $conn=db();
	$query="update old_student_info set  name='$name',email='$email',phone='$phone',
	institution='$institution',course='$course' where id='$id'";
	$result=mysqli_query($conn,$query);
	if(!$result){
		echo" Query Failed:Students records can not be updated now<br/>";
	}else{
		return true;
	}
  }
  //===================================================================
  function updateManagement($id,$title,$surname,$name,$qualification){
	  
	  $conn=db();
	$query="update management set  Title='$title',Surname='$surname',
	Name='$name',Qualification='$qualification' where id='$id'";
	$result=mysqli_query($conn,$query);
	if(!$result){
		echo" Query Failed:Management records can not be updated now<br/>";
	}else{
		return true;
	}
  }
  


  //=============================================================

function updateManagement2($id,$picture,$title,$surname,$name,$qualification){
	  
	  $conn=db();
	$query="update management set pictureName='$picture',Title='$title',Surname='$surname',
	Name='$name',Qualification='$qualification' where id='$id'";
	$result=mysqli_query($conn,$query)or die(mysqli_error($conn));
	if(!$result){
		echo" Query Failed:Management records can not be updated now<br/>";
	}else{
		return true;
	}
  }

  //==============================================================
  function delete_oldstudent($isbn){
	$conn=db();
	$query="delete  from old_student_info where id='$isbn'";
	$result=mysqli_query($conn,$query);
	if(!$result){
		echo"can not be deleted";
	}else{
		return true;
	}
}


function insertreg($pass,$surname,$name,$other,$date,$sex,$email){
	$conn=db();
	$query="SELECT * FROM form WHERE email='".$email."'";
	$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
	if(mysqli_num_rows($result) == 0){
	$query=" INSERT INTO form (username,surname,name,othername,dob,sex,email)
	VALUES('".$pass."','".$surname."','".$name."','".$other."','".$date."','".$sex."','".$email."')";
	$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

	if(!$result){
		echo"can not be inserted";
	}else{
		return true;
	}
}else{
	echo"<div class='col-sm-6 col-sm-offset-3 oldstudent'>you are already registered for <b>STAGE I</b>.continue with the Second stage.Thank you.</div>";
	//echo "<div  class='col-xs-12 rd' style='margin-top:40px;'>".selectname($email,$pass).'</div>';
	registration_form();
}
}

function logf($username,$password){
	$conn=db();
	
	$query="select * from form where username='".$password."' and email='".$username."'";
	$result=mysqli_query($conn,$query);
	if(!$result){
		echo"query failed:";
	}
	if(mysqli_num_rows($result) > 0){
		return true;
	}else{
	 return false;
	}
}



function selectname($email,$pass){
	$conn=db();
	$query="SELECT id,surname,name,othername FROM form WHERE email='".$email."' and username='".$pass."'";
	$result=mysqli_query($conn,$query)or die(mysqli_error($conn));
	if(mysqli_num_rows($result) !=0){
		$row=mysqli_fetch_assoc($result);

		

		return $row;

	}else{
		return false;
	}
}

?>