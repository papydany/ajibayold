<?php
    
function login($username,$password){
	$conn=db();
	
	$query="select * from admin where username='".$username."' and password='".$password."'";
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
//==========================================================
 function check_admin_user(){
	 
	if(isset($_SESSION['admin_user'])){
		return true;
	}else{
		
		echo'<div class="col-sm-5 col-sm-offset-3 col-md-3 col-md-offset-4 loginPage">';
		echo"<h3>login first.</h3>";
		display_admin_login();
		echo"</div></div>";
		  foot();
		exit();
	}
}
//===============================================================

function display_admin_login(){
	?>
    <form action="ajibay.php" method="post">
    
  <div class="form-group">
    <label>Username:</label>
    <input class="form-control" type="text" name="username" value=""/>
  </div>
  <div class="form-group">
    <label>Password:</label>
    <input class="form-control" type="password" name="password"/>
</div>
<div class="form-group">
    <button type="submit" value="LOGIN" class="btn btn-success"/>LOGIN</button>
  </div>
    </form>
    <?php
}
//===============================================================


function display_admin_menu(){
?>
<div class="col-sm-3 ">
<ul class="list-group">
 <li class="list-group-item"> <a href="admin_account.php" >ACCOUNT</a></li>
  
  <li class="list-group-item">  <a href="add_news.php" >ADD NEWS</a></li>
  
  <li class="list-group-item"><a href="password_form.php" >CHANGE PASSWORD</a></li>
 <li class="list-group-item"> <a href="insert_oldstudent_year.php" >INSERT OLD STUDENT SET</a></li>
 <li class="list-group-item"> <a href="oldstudent_info.php" >INSERT OLD STUDENT INFORMATION</a></li>
   <li class="list-group-item"> <a href="insertManagementCat.php" >MANAGEMENT CATEGORY</a></li>
  <li class="list-group-item">  <a href="managementPage.php">MANAGEMENT PAGE</a></li>
   <li class="list-group-item"> <a href="upload.php" >UPLOAD GALLERY PICTURE</a></li>
  <li class="list-group-item"><a href="logout.php" >Logout</a></li>
  </ul>
</div>
<?php
}
//=================================================================
function add_news_form($news=''){
	$edit=is_array($news);
	?>
  <div class="col-sm-12">
    <form action="<?php echo $edit?'update.php':'add_news_script.php';?>" method="post">
    
  <div class="form-group">
    <label>NEWS TITLE:</label>
    <input class="form-control" type="text" name="news_title" size="30" value="<?php echo $edit? $news['title']:''; ?>"/>
  </div>
   <div class="form-group">
    <label>CONTENT</label>
    <textarea class="form-control" name="news_content" rows="5" cols="20">
    <?php echo $edit? $news['content']:'';?>
    </textarea>
  </div>

   <?php if(!$edit){
	 
  }
  ?> 
  <?php
  if($edit)
	  echo'<div class="col-sm-6"><input type="hidden" name="oldnews_id" value="'.$news['id'].'"/>';
	  ?>
	  <input class="btn btn-default" type="submit" value="<?php echo $edit?'UPDATE':'SUBMIT';?>&nbsp;NEWS"/>
      </form>
  
  <?php
  if($edit){
	  echo'</div><div class="col-sm-6">
	  <form method="post" action="delete_news.php"/>
	  <input type="hidden" name="news_id" value="'.$news['id'].'"/>
	  <input class="btn btn-danger" type="submit" value=" DELETE NEWS"/>
	  </form></div>';
  }
  ?>
  

   
  </div>
    <?php
}
//================================================================

function display_change_password(){
	?>
  <div class="col-sm-10 col-md-6">
      <form method="post" action="password_script.php" role="form">
    <div class="form-group">
    <label>Old Password</label>
    <input class="form-control" type="password" name="oldpassword"/></td>
  </div>
  <div class="form-group">
    <label>New Password<br/><em class="rd">between 6 and 16 char.</em></label>
    <input class="form-control" type="password" name="newpassword"/>
  </div>
    <div class="form-group">
    <label>Confirm Password</label>
    <input class="form-control" type="password" name="newpassword2"/>
  </div>
  
    <div><input class="btn btn-success" type="submit" value="Change Password"/>
  </div>
</form>
</div>
<?php
}
//===============================================================

function changed_password($username,$oldpass,$newpass){
	if(login($username,$oldpass)){
	$conn=db();
	$query="update admin set password='$newpass' where username='$username'";
	$result=mysqli_query($conn,$query);
	if(!$result){
		echo" changed of password fail";
	}else{
		return true;
	}
	}
}
//===============================================================

function insert_news($news_title,$news_content){
	  $conn=db();
	  $date=date("Y-m-d");
	  
	  
	  	$query="insert into news values('','$news_title','$news_content','$date')";
		$result=mysqli_query($conn,$query);
		if(!$result){
			echo"Query Failed:News can not be inserted now";
		}
		return true;
	}

//===============================================================

 // function to update news table
 function  update_news($oldnews_id,$news_title,$news_content){
	$conn=db();
	$query="update news set title='$news_title',content='$news_content' where id='$oldnews_id'";
	$result=mysqli_query($conn,$query);
	if(!$result){
		echo" Query Failed:News can not be updated";
	}else{
		return true;
	}
}
//=====================================================================
// function to delete news 

  
  function delete_news($news_id){
	$conn=db();
	$query="delete  from news where id='$news_id'";
	$result=mysqli_query($conn,$query);
	if(!$result){
		echo"Query Failed:News can not be deleted";
	}else{
		return true;
	}
}
//=================================================================
function display_year_form(){
	
	?>
  <div class="col-sm-8">
    <form method="post" action="insert_oldstudent_script.php">
<div class="form-group">
    <label>Old students set (year)<br/>
    <em>enter year  in  this formart. 2013</em></label>
    <input name="year" type="text" class="form-control" placeholder="enter year of graduation" />
    
  </div>
  
  <div class="form-group">
  <input class="btn btn-default" type="submit" value="Submit"/></td>
  </div>
  </form>
</div>


<?php
}
//================================================================

function insert_year($catname){
	$conn=db();
	$query="select * from year_category where year ='$catname'";
	$result=mysqli_query($conn,$query);
	if(!$result){
		echo"select query fails";
	}
	if(mysqli_num_rows($result) >0){
		echo'<div class="col-sm-12 oldstudent"><p>you have inserted year '. $catname.' sets before.</p></div>';
		
    echo'</div></div></div>';
      foot();
		exit();
		}else{
		
	
	$query="insert into year_category values('','$catname')";
	$result=mysqli_query($conn,$query);
	if(!$result){
		echo "can not insert it in to database";
	}else{
		return true;
	}
			
}
}
//==============================================================



function insert_position($catname){
	$conn=db();
	$query="select * from management_category where managementCategory
	 ='$catname'";
	$result=mysqli_query($conn,$query);
	if(!$result){
		echo"select query fails";
	}
	if(mysqli_num_rows($result) >0){
		echo"<p>you have inserted ".$catname." position  before.</p>";
		admin_do_url('admin.php','Go Back To Adminstration');
		exit();
		}else{
		
	
	$query="insert into management_category values('','$catname')";
	$result=mysqli_query($conn,$query);
	if(!$result){
		echo "can not insert it in to database";
	}else{
		return true;
	}
			
}
}




//===============================================================
function display_oldstudent_info(){
	
	?>
    
   <div class="col-sm-12">
<form method="post" action="oldstudent_info_script.php">

  <div class="form-group col-sm-6">
    <label>NAME<span class="rd">*</span></label>
  <input type="text" name="name" class="form-control"/>
  </div>

  <div class="form-group col-sm-6">
    <label>PHONE</label>
    <input type="text" name="phone" class="form-control"/>
  </div>

  <div class="form-group col-sm-6">
    <label>EMAIL</label>
    <input type="text" name="email" value=""class="form-control"/>
  </div>

   <div class="form-group col-sm-6">
    <label>INSTITUTION<span class="rd">*</span></label>
    <input type="text" name="institution" value="" class="form-control"/></div>

  <div class="form-group col-sm-6">
    <label>YEAR<span class="rd">*</span></label>
    <select name="year" class="form-control">
    <?PHP
    //list of possible categories comes from database
	$cat_array=get_oldstudent_year();
	foreach ($cat_array as $thiscat){
		echo'<option value="'.$thiscat['id'].'">';
		echo $thiscat['year'].'</option>';
	}
	?></select></div>
  
 
  
  <div class="form-group col-sm-6">
    <label>COURSE</label>
    <input type="text" name="course" value="" class="form-control"/> </div>
  
  <div class="form-group col-sm-12">
    
    <input type="submit" value="submit" class="btn btn-success"/>
   
  </div>
</form>
</div>

<?php    
}

//=================================================================

function insert_oldstudent_info($year,$name,$email,$phone,$institution,$course){
	$conn=db();
	$query="select * from old_student_info where year_id='$year' and name='$name' and email='$email' and phone='$phone' and institution='$institution' and course='$course'";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result) > 0){

		echo"<p>OLD student information have been  added before.</p>";
		
	}else{
		$query="insert into old_student_info values('','$year','$name','$email','$phone','$institution','$course')";
		$result=mysqli_query($conn,$query);
		if(!$result){
			echo"can not be inserted now";
		}else{
		return true;
	}
	
	}
}
//===============================================================
function managementTeamForm(){
	?>
  <div class="col-sm-12">
	<form action="managementPageScript.php" method="post"
     enctype="multipart/form-data">
  
  <input type="hidden" name="MAX_FILE_SIZE" value="100000" />

  <div class="form-group col-sm-6">
  <label for="picture">Upload pictures</label>
  <input type="file" name="file"/>
    </div>
     <div class="form-group col-sm-6">
    <label>Title</label>
    <input type="text" name="title" value="" class="form-control"/>
    </div>
     <div class="form-group col-sm-6">
    <label>Surname</label>
  <input type="text" name="surname" value="" class="form-control"/>
  </div>
   <div class="form-group col-sm-6">
    <label>Name</label>
    <input type="text" name="name" value="" class="form-control"/>
    </div>
     <div class="form-group col-sm-6">
    <label>Position</label>
    <select name="position" class="form-control">
    <?PHP
    //list of possible categories comes from database
	$cat_array=getmanagementCat();
	foreach ($cat_array as $thiscat){
		echo"<option value=\"".$thiscat['id']."\"";
		echo">".$thiscat['managementCategory']."</option>";
	}
	?></select>
</div>
   <div class="form-group col-sm-6">
  <label>Qualification</label>
  <input type="text" name="qualification" value="" class="form-control"/>
  </div>
   <div class="form-group col-sm-6">
  <input type="submit" value="Enter" class="btn btn-success"/>
  </div>
</form>
</div>
<?php
}


function admin_do_url($url,$title){
  ?>
  <div  class="admin_achor" style="margin-top:36px;">
   <a class="btn btn-default btn-xs" href="<?php echo $url; ?>"><?php echo"&nbsp;&nbsp;&nbsp;".$title.'&nbsp;&nbsp;&nbsp;'; ?></a></div>
    <?php
}
?>