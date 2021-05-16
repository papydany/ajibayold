<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<?php
echo'<div class="row nav_rule nomargin bd_padding">';
if(isset($_SESSION['admin_user'])){
if(isset($_GET['id'])){
	$id=$_GET['id'];
}
$conn=db();
$query="select * from management where id='$id'";
$result=mysqli_query($conn,$query);
if(!$result){
	echo"<p class=\"rd\">Query Failed</p>";
}
$row=mysqli_fetch_assoc($result);
$id2=$row['id'];


echo'
<form action="updateManagement.php" method="post"  enctype="multipart/form-data">
	
	<div class="col-sm-12 admin_header">	Edit Management Team</div>';
	
	
	$picture="images/post-images/team/".$row['pictureName'];

$width = "100"; 

$height = "130";

	
	list($new_width,$new_height)=getimagesize($picture);
	$w=$new_width;
	$h=$new_height;
	if($h > $height){
		$w=($height/$h)*$w;
		$h=$height;
	}
	if($w > $width){
		$h=($width/$w)*$h;
		$w=$width;
	
	}
	$imag_p=imagecreatetruecolor($new_width,$new_height);
	$image=imagecreatefromjpeg($picture);
	imagecopyresampled($imag_p,$image,0,0,0,0,$w,$h,$new_width,$new_height);
	
	
		echo'<div class="col-sm-3">';
		
			echo'<div class="form-group">
			
		<img src="'. $picture.'" width="'.$w.'" height="'.$h.'">
			</div>
          <div class="form-group">
          <input type="hidden" name="MAX_FILE_SIZE" value="200000" class="form-control" />
    <input type="file" name="file" value=""/>
			</div></div>';
	
		echo'<div class="col-sm-8">
		<div class="form-group">
	
		<input type="hidden" class="form-control" name="id" value="'.$row['id'].
		'"/>
	    <div class="col-md-4 form-group">
		<label>Title</label>
	     </div>
	     <div class="col-md-8 form-group">
		<input type="text" name="title" class="form-control" value="'
		.ucwords($row['Title']).'"/></div></div>
		
		<div class="form-group">
		<div class="col-md-4 form-group"><label>Surname</label></div>
		<div class="col-md-8 form-group"><input type="text" name="surname" class="form-control" value="'
		.ucwords($row['Surname']).'"/></div></div>
		
	<div class="form-group ">
	<div class="col-md-4 form-group"><label>Name</label></div>
		<div class="col-md-8 form-group"><input type="text" class="form-control" name="name" value="'
		.ucwords($row['Name']).'"></div
		></div>
		
		<div class="form-group">
		<div class="col-md-4 form-group"><label>Qualification</label></div>
		<div class="col-md-8 form-group"><input type="text" name="qualification" class="form-control" value="'
		.ucwords($row['Qualification']).'"></div></div>
		<div class="form-group col-sm-6">
	 <input type="submit" value="update" class="btn btn-success"/>
		</form></div>
		<div class="form-group col-sm-6">
		<form method="post" action="deleteManagement.php" role="form">
		<input type="hidden" name="id" value="'.$row['id'].'"/>
		<input type="submit" value="Delete" class="btn btn-danger"/>
		</form>
		</div>';
		admin_do_url('ajibay.php','Go TO ADMIN');
	echo'</div>';

}else{
	echo"<p>you are not authorized to view these page.</p>";
}
echo"</div>";

foot();
?>