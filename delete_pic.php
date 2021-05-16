<?php include_once"function.php";

top(); 
echo"<div class='row nav_rule nomargin bd_padding'>";
if(isset($_SESSION['admin_user'])){
if(isset($_GET['id'])){
	$id=$_GET['id'];
}
$conn=db();
$query="select * from gallery where id='$id'";
$result=mysqli_query($conn,$query);
if(!$result){
	echo"<p class=\"rd\">Query Failed</p>";
}
$pic=mysqli_fetch_assoc($result);
$id2=$pic['id'];

echo"<div class='col-sm-8 col-sm-offset-2'>";
	
	
		
		
		echo"<div class='admin_header'>
		Are you sure you want to delete this picture?</div>";
	
	
	
	$name="images/".$pic['name'];
$width = "400"; 
$height = "400";

	
	list($new_width,$new_height)=getimagesize($name);
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
	$image=imagecreatefromjpeg($name);
	imagecopyresampled($imag_p,$image,0,0,0,0,$w,$h,$new_width,$new_height);
	echo"
	<div class='col-sm-12' style='margin-bottom:15px;'>
	
	<img src=\"$name\" width=\"$w\" height=\"$h\"  class='txt_c'/>
	</div>
	
	<div class='col-xs-6'><a href=\"remove_picture.php?id=$id2\">
	<input type=\"button\" value=\"YES\" class='btn btn-danger btn-xs'/></div>
	<div class='col-xs-6'><a href=\"gallery.php\"><input type=\"button\" value=\"NO\" class='btn btn-default btn-xs'/>
	</div>
	
	
	</div>";
	
	
}else{
	echo"<p>you are not authorized to view these page.</p>";
}
echo"</div>";

foot();
?>