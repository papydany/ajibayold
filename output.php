<?php 




function news(){
	
 $conn=db();
  $query="select count(*) from news";
  $result=mysqli_query($conn,$query);
if(!$result){
	echo"query failed 1";
}
$r=mysqli_fetch_row($result);

$numrow=$r[0];

// number of row per page
$rowperpage=5;
//find out total page
$totalpages=ceil($numrow/$rowperpage);
 //get current or set a fault
 if(isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])){
	// cast vas as int
	$currentpage= (int )$_GET['currentpage'];
 }else{
	 // defaut page
	 $currentpage= 1;
 }
 //if current page is greater than total page
 if($currentpage > $totalpages){
	 // set page to last
	 $currentpage =$totalpages;
 }
 // if currentpage is less than first page
 if($currentpage < 1){
 //set page to first page
 $currentpage = 1;
 }
 //offset of the list,based on current page
 $offset=($currentpage - 1) * $rowperpage;

//====   ======   =======   ======   ======   ===========

$news_array=get_news( $offset,$rowperpage);
display_news($news_array);

//=====   ======   ======   ========     ==========    =========
$range=4;
 //if not on page 1,dont show this link
 
 
if($currentpage > 1){
	 //show << link to go back 1
	 echo"<div class='col-sm-6'><a href='{$_SERVER['PHP_SELF']}?currentpage=1' class='btn btn-default'>First page</a></div>";
	 // get previous page num
	 $prevpage=$currentpage - 1;
	 // show < link to go back to page 1
	 
echo"<div class='col-sm-6'><a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage' class='btn btn-default'>previous</a></div>";
 }
 
 if($currentpage != $totalpages){
	 // get next page
	 $nextpage= $currentpage + 1;
	 //echo forward link for next page
	  echo"<div class='col-sm-6'><a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage' class='btn btn-default'>Next</a></div>";
	  //echo forward link for lastpage
	  echo"<div class='col-sm-6'><a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages' class='btn btn-default'>Last page</a></div>"; 
	 
 }



	
}

//==============================================================

// function to display news title
 function display_news($news_array){
	 if(!is_array($news_array)){
		 echo "";
	 }
	if($news_array == 0){
		echo"";
	}else{

   
	 //echo'<div class="news">';
	 
	 
	 
	 foreach($news_array as $row){
		
   $url="show_news.php?id=".$row['id'];
   
	 $title ='<p class="news-bgcolor">';
   $title.=ucwords($row['title']).'</p>';
	 
 
   echo'<div class="ico-content  type5">';
	do_url($url,$title);

    echo"</div>";
	 }
   
	// echo"</div>";
		 
	}
 }
 //=================================================================
 
 function display_content($row){
	 ?>
     <div class="col-sm-12">
  
    <div class="col-sm-12 admin_header"><?php echo $row['title']; ?></div>
  
  
  <div class="col-sm-3 txt_b">Posted on:</div>
  <div class="col-sm-3 txt_b"><?php echo $row['date']; ?></div>

  <div class="col-sm-12 txt_a">
    <?php echo $row['content'];?></div>
    
</div>
<?php
 }





//===============================================================
function upload_form(){
?>
<div class="col-sm-8">
<form action="upload_script.php" method="post" enctype="multipart/form-data">

 <div class="form-group">
  <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
  <label>upload pictures <em>Max of 1M</em></label>
  
  <input type="file" name="picture"/>
  </div>
  <div class="form-group">
  <label>write something</label>
  <input type="text" name="name" value="" class="form-control"/>
  </div>
  
   <div class="form-group">
    
    <input type="submit" value="SEND" class="btn btn-success"/>
  </div>




   </form>
 </div>
<?php
}




function basic_form(){
  ?>
<form role="form" action="process.php" method="post" id="basic" name="basic">

<div class="col-xs-12 admin_header" style="text-align:center;padding:5px;"><label>ADMISSION FORM</label></div>
<div class="col-xs-12 form">

 <label>PERSONAL INFORMATION</label>
</div>
<div class="form-group form col-xs-12 ">
  <div class="col-sm-4">
    <label><span class="rd">*</span>Surname</label>
    <input type="text" name="surname" value=""  id="surname" class="form-control" placeholder="enter your surname"/>
    <span id="surinfo">please fill surname</span>
  </div>
  <div class="col-sm-4">
    <label><span class="rd">*</span>Name</label>
    <input type="text" name="name" value="" id="name" class="form-control" placeholder="enter your name"/>
    <span id="nameinfo">please fill name</span>
  </div>
  <div class="col-sm-4">
    <label>Other Name:</label>
    <input type="text" name="other" value="" id="other" class="form-control" placeholder="enter your Othename"/>
  </div>
</div>

<div class="form-group form col-xs-12">
  <div class="col-sm-2">
    <label><span class="rd">*</span>Date Of Birth</label>
    <input type="text" name="dob" value="" size="30" id="datepicker" class="form-control" placeholder=" DOB"/>
    <span id="dateinfo">please fill date of birth</span>
  </div>
  <div class="col-sm-3 ">
    <label><span class="rd">*</span>Sex</label>
    <div class="form-inline">
    <div class="radio " id="sex">
  <label>
    <input type="radio" name="sex" id="male" value="male">
    Male
  </label>
</div>
<div class="radio form-inline">
  <label>
    <input type="radio" name="sex" id="female" value="female" >
    Female
  </label>
</div>
</div>
<span id="sexinfo">please choose your sex</span>
</div>
<div class="col-sm-4">
    <label><span class="rd">*</span>email</label>
    <input type="email" name="email" value="" id="email" class="form-control" placeholder="enter your email"/>
    <span id="emailinfo">please fill in your Email</span>
  </div>
  <div class="col-sm-3">
    <label><span class="rd">*</span>password</label>
    <input type="password" name="password" value=""  class="form-control" placeholder="enter your password" id="password"/>
    <span id="passinfo">password is compulsary</span>
  </div>
</div>
<div class="form-group form col-xs-12">
<div class="col-sm-4">
<button id="dd" class="btn btn-default" name="submit">Continue</button>
</div>
</div>
  </div>
</form>

<?php
}
//================================================================
function registration_form(){
	?>
	<form role="form" action="registration_preview.php" method="post" enctype="multipart/form-data">

  <div class="col-xs-12 admin_header" style="text-align:center;"><h3>ADMISSION FORM</h3></div>
    
   <div class="col-xs-12 admin_header" style="text-align:center;"><p>STAGE II</p>
    
  </div>
  <div class="col-xs-12 thumbnail">
  <div class="form-group form col-sm-4">
<div class="col-sm-12 form-group"><span class="rd">*</span>
   <label>Select The School Form Type</label>
   <select name="school" class="form-control" id="school">
   <option value="">Select School Type</option>
   <option value="AJIBAY GARDEN SCHOOL">AJIBAY GARDEN SCHOOL</option>
   <option value="AJIBAY NUR & PRY SCHOOL">AJIBAY NUR & PRY SCHOOL</option>
   <option value="AJIBAY ACADEMY">AJIBAY ACADEMY</option>
   </select>
   <span class="stage" id="sch">select type of school</span>
</div>
    


<div class="col-sm-12 form-group">

  <label><span class="rd">*</span>Class In To Which Applicant Is Seeking Admission:</label>
  

  <select name="intendingclass" class="form-control" id="intendingclass">
    <option value="">select</option>  
    <option value="S S 3">S S 3</option>
   <option value="S S 2">S S 2</option>
    <option value="S S 1">S S 1</option>
   <option value="J S 3">J S 3</option>
   <option value="J S 2">J S 2</option>
   <option value="J S 1">J S 1</option>
   <option value="Basic 5">Basic 5</option>
   <option value="Basic 4">Basic 4</option>
   <option value="Basic 3">Basic 3</option>
   <option value="Basic 2">Basic 2</option>
   <option value="Basic 1">Basic 1</option>
   <option value="Nur 2">Nur 2</option>
   <option value="Nur 1">Nur 1</option>
<option value="KG Class">KG Class</option>
    </select>
 <span class="stage" id="intclass">Enter class apllicant is seeking</span>
</div>
 <div class="col-sm-12 form-group">
    <label><span class="rd">*</span>State Of Origin:</label>
    <input type="text" name="state" value="" size="30" class="form-control" id="state"/>
    <span class="stage" id="st">enter your state of origin</span>
  </div>
  <div class="col-sm-12 form-group">
  
    <label><span class="rd">*</span>Nationality:</label>
    <select name="nationality" class="form-control" id="nationality">
      <option value="">select</option>
      <option value="NIGERIAN">NIGERIAN</option>
      <option value="OTHER">OTHER</option>
    </select>
    <span class="stage" id="nat">select your nationality</span>
  </div>
</div>

 

  
 <div class="form-group form col-sm-4">


  <div class="col-sm-12 col-md-12 form-group"><span class="rd">*</span>
    <label>Religion:</label>
    <select name="religion" class="form-control" id="religion">
      <option value="">select</option>
      <option value="CHRISTIAN">CHRISTIAN</option>
      <option value="ISLAM">ISLAM</option>
       <option value="OTHER">OTHER</option>
    </select>
    <span class="stage" id="rel">select your religion</span>
  </div>
  <div class="col-sm-12 form-group">
      <label><span class="rd">*</span>Residential Address:</label>
      <textarea type="text" name="residential" row="3" class="form-control" id="residential"></textarea> 
      <span class="stage" id="res">enter your residential address</span>
  </div>
  <div class="col-sm-12 form-group">
      <label><span class="rd">*</span>Postal Address:</label>
      <textarea type="text" name="postal" row="3" class="form-control" id="postal"></textarea>
      <span class="stage" id="pst">enter your postal address</span>
  </div>
</div>
   


<div class="form-group form col-sm-4">
  <div class="col-xs-12 form-group" style="text-align:center;"><label>School Attended</label></div>
  <div class="col-sm-12 form-group">
    <label>Name Of School</label>
    <input type="text" name="schoolname1" value="" size="30" class="form-control" id="schoolname1"/>
  </div>
  <div class="col-sm-6 form-group">
    <label>Year</label>
    <select name="year1" class="form-control" id="year1">
      <option value="">select year</option>
      <?php
      
      $chosen = '';
            for ($year = (date('Y')); $year >= 2010; $year--) {
        $chosen = $_GET['year1'] == $year ? 'selected="selected"' : '';
            echo "<option value='$year' $chosen>$year</option>\n";
  
        }     
        ?> 
    </select>
    <span class="stage" id="yr1">select  year</span>
  </div>
  <div class="col-sm-6 form-group">
    <label>Class</label>
    <select name="class1" class="form-control" id="class1">
    <option value="">select</option>  
    <option value="S S 3">S S 3</option>
   <option value="S S 2">S S 2</option>
    <option value="S S 1">S S 1</option>
   <option value="J S 3">J S 3</option>
   <option value="J S 2">J S 2</option>
   <option value="J S 1">J S 1</option>
   <option value="Basic 5">Basic 5</option>
   <option value="Basic 4">Basic 4</option>
   <option value="Basic 3">Basic 3</option>
   <option value="Basic 2">Basic 2</option>
   <option value="Basic 1">Basic 1</option>
   <option value="Nur 2">Nur 2</option>
   <option value="Nur 1">Nur 1</option>
<option value="KG Class">KG Class</option>



   <option value=""></option>
    </select>
    <span class="stage" id="cls1">select class</span>
  </div>
<!--</div>


<div class=" form-group form col-sm-4">-->
  <div class=" form-group col-sm-12">
    <label>Name Of School</label>
    <input type="text" name="schoolname2" value="" size="30" class="form-control" id="schoolname2"/>
  </div>
  <div class="col-sm-6 form-group"><label>Year</label>
    <select name="year2" class="form-control" id="year2">
      <option value="">select year</option>
      <?php
      
      $chosen = '';
            for ($year = (date('Y')); $year >= 2010; $year--) {
        $chosen = $_GET['year2'] == $year ? 'selected="selected"' : '';
            echo "<option value='$year' $chosen>$year</option>\n";
  
        }     
        ?> 
    </select>
     <span class="stage" id="yr2">select  year</span>
  </div>
  <div class="col-sm-6 form-group"><label>Class</label>
    <select name="class2" class="form-control" id="class2">
   <option value="">select</option>
   <option value="S S 3">S S 3</option>
   <option value="S S 2">S S 2</option>
    <option value="S S 1">S S 1</option>
   <option value="J S 3">J S 3</option>
   <option value="J S 2">J S 2</option>
   <option value="J S 1">J S 1</option>
   <option value="Basic 5">Basic 5</option>
   <option value="Basic 4">Basic 4</option>
   <option value="Basic 3">Basic 3</option>
   <option value="Basic 2">Basic 2</option>
   <option value="Basic 1">Basic 1</option>
   <option value="Nur 2">Nur 2</option>
   <option value="Nur 1">Nur 1</option>
<option value="KG Class">KG Class</option>

    </select>
    <span class="stage" id="cls2">select class</span>
  </div>
</div>  
</div> 
   
<div class="col-xs-12 thumbnail">

<div class="col-xs-12 form"><label>PARENT/GUARDIAN SECTION</label></div>
<div class="form-group form col-xs-12">
  <div class="col-sm-5 form-group">
  <label><span class="rd">*</span>Name</label>
  <input type="text" name="parent" value="" size="30" class="form-control" id="parent"/>
   <span class="stage" id="pn">parent name compulsary</span>
</div>
<div class="col-sm-7 form-group">
<label><span class="rd">*</span>Home Address:</label>
<textarea name="parentaddress"class="form-control"row="3" id="parentaddress"></textarea>
 <span class="stage" id="pa">parent address compulsary</span>
</div>
</div>
<div class="form-group form col-xs-12">
  <div class="col-sm-3">
  <label><span class="rd">*</span>Relationship</label>
  <input type="text" name="relation" value="" size="30" class="form-control" id="relation"/>
   <span class="stage" id="pr">enter relation to the applicant</span>
</div>
<div class="col-sm-3 form-group">
  <label><span class="rd">*</span>Occupation:</label>
  <input type="text" name="occupation" value="" size="30" class="form-control" id="occupation"/>
   <span class="stage " id="pc">parent occupation is empty</span>
</div>
 <div class="col-sm-3 form-group">
 <label><span class="rd">*</span>Tel:</label>
  <input type="text" name="phone" value="" size="30" class="form-control" id="phone"/>
   <span class="stage" id="phn">parent phone number</span>
</div>
<div class="col-sm-3 form-group">
 <label><span class="rd">*</span>Child's Health / Complaints:</label>
  <input type="text" name="healthstatus" value="" size="30" class="form-control" id="healthstatus"/>
   <span class="stage" id="ch">Any health challenge</span>
</div>
</div>
</div>
<div class="form-group form col-xs-12 thumbnail">
  <div class="col-sm-3 ">
    <label><span class="rd">*</span>Upload Passport</label>
 <em class="rd">max of 50kb</em><input type="hidden" name="MAX_FILE_SIZE" value="50000" class="form-control" />
    <input type="file" name="file" value="" id="file"/>
     <span class="stage" id="pport">Applicant passport</span>
  </div>
<div class="col-sm-3 col-sm-offset-6">
<button name="submit" class="btn btn-success" id="stage2">Submit</button>
</div>
</div>
</form>



<?php
}
//================================================================
function username_form(){
	?>
    <form action="registration_preview.php" method="post" role="form">
    
    <div class="form-group col-sm-12">
    <label>Enter Your Username</label>
    <input type="text" name="username" value="" class="form-control"/>
    </div>

    <div class="form-group col-sm-12">
    <label>password</label>
    <input type="password" name="password" value="" class="form-control"/>
    </div>
    <div class="form-group col-sm-12">
    <input type="submit" name="sub" value="Send" class="btn btn-success"/>
  </div>
    </form>
    
    <?php
	
	
    
}

//================================================================
 function contact_form(){
	 ?>
     <form action="mail.php" method="post">
     
  
    <div class="col-xs-12 conMsg">Send Message To Us</div>
  <div class="form-group col-sm-7 no_left_padding">
    <label>Name</label>
    <input class="form-control" type="text" name="name" value="" size="30"/>
  </div>
  <div class="form-group col-sm-7 no_left_padding">
    <label>Email</label>
    <input class="form-control" type="text" name="email" value="" size="30"/>
  </div>

  <div class="form-group col-sm-7 no_left_padding">
    <label>Subject</label>
    <input class="form-control" type="text" name="subject" value="" size="30"/>
  </div>
  
  <div class="form-group col-sm-10 no_left_padding">
    <label>Message</label>
  <textarea class="form-control" name="message" rows="5" ></textarea>
  </div>

  <div class=" form-group col-sm-6 cil-sm-offset-3 no_left_padding">
    <input  class="btn btn-success" type="submit" value="send message"/></div>
  
</form>
<?php
 }
//=================================================================

function display_oldstudent_year($cat_array){
	
	if(!is_array($cat_array)){
		echo"<p>No old student year currently available</p>";
		return;
		
	}
  ?>
<ul class="list-group">
<?php
	foreach($cat_array as $row){
		$url="oldstudent_profile.php?student_id=".($row['id']);
		$title='<li class="list-group-item">Graduate of   Year&nbsp;'.$row['year']."</li>";
		
  do_url($url,$title);
	}
  ?>
  </ul>
  <?php
	
}
//================================================================

function display_oldstudent($book_array){
	global $name;
	if(!is_array($book_array)){
		echo'<div class="col-sm-9 col-sm-offset-3 alert alert-warning" role="alert"><p>Class &nbsp;'.$name.'&nbsp;sets are not available</p></div>';
		}else{
			echo"<table class=\"table table-responsive table-bordered table-striped\">
			<tr>
			<th>Names</th>
			<th>Phone Number</th>
			<th>Email Address</th>
			<th>Institution</th>
			<th>Course</th>
			</tr>";
			
	foreach($book_array as $row){
	
		echo"<tr><td>"
		.ucwords($row['name'])."</td><td>"
		.$row['phone']."</td><td>"
		.$row['email']."</td><td>"
		.ucwords($row['institution'])."</td><td>"
		.ucwords($row['course'])."</td>
		</tr>";
			
	}
	echo"</table>";
	}
	
}
//----------------------------------------------------------------
function display_4edit($book_array){
	
	global $name;
	if(!is_array($book_array)){
		echo'<div class="col-sm-9 col-sm-offset-3 oldstudent"><p>Year&nbsp;'.$name.'&nbsp;sets are not available</p></div>';
		}else{
				
			
			echo'<table class="table table-responsive table-striped table-bordered" >
			<tr>
			<th>Names</th>
			<th>Phone Number</th>
			<th>Email Address</th>
			<th>Institution</th>
			<th>Course</th>
      <th>Action</th>
			</tr>';
			
	foreach($book_array as $row){
	$title="Edit";
	$url="show_edit.php?id=".$row['id'];
		echo"<tr><td>".ucwords($row['name']);
	    
		
		echo"</td><td>"
		.$row['phone']."</td><td>"
		.$row['email']."</td><td>"
		.ucwords($row['institution'])."</td><td>"
		.ucwords($row['course'])."</td>
    <td>";edit_do_url($url,$title);echo"
		</td></tr>";
			
	}
	echo"</table>";
	}
	
	
}
//================================================================






//=================================================================
function display_oldstudent_4admin($book_array){
	global $name;
	if(!is_array($book_array)){
		echo"<p>Year&nbsp;".$name."&nbsp;sets are not available</p>";
		}else{
			
			echo'<form action="update_oldstudent.php" method="post">
			<table class="table">
			<tr>
			<th>Names</th>
			<th>Phone Number</th>
			<th>Email Address</th>
			<th>Institution</th>
			<th>Course</th>
			</tr>';
			
	foreach($book_array as $row){
	
		echo'<tr><td>
		<input class="form-control" type="text" name="name" value="'
		.ucwords($row['name']).'"/></td>
		<td>
		<input class="form-control" type="text" name="phone" value="'
		.$row['phone'].'"/></td>
		<td>
		<input class="form-control" type="text" name="email" value="'
		.$row['email'].'"/></td>
		<td>
		<input class="form-control" type="text" name="institution" value="'
		.ucwords($row['institution']).'"/></td><td>
		<input class="form-control" type="text" name="course" value="'
		.ucwords($row['course']).'"/></td>
		<input type="hidden" name="id" value="'.$row['id'].'"/>
		
		</tr>';
		
	}
	
	echo'
	<tr>
	<td>
	<input class="btn btn-success" type="submit" value="UPDATE OLDSTUDENT"/></form></td>
	<td>
	<form method="post" action="delete_oldstudent.php" role="form">
	   <input type="hidden" name="id" value="'.$row['id'].'"/>
	   <input class="btn btn-danger" type="submit" value="DELETE OLDSTUDENT"/>
	   </form</td><td>';admin_do_url('ajibay.php','Go TO ADMIN');echo'</td></tr></table>';
   
	
	}
	
}
?>