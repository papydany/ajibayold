<?php include_once"function/include.php";  
       //include_once"adminFunction.php";

$conn=DB();
//$id='fac';
if(isset($_POST["data"]) && $_POST["data"] !="")
{
	$query = "SELECT * FROM category_of_class";
$result = mysqli_query( $conn, $query);
?>
<select name="classcat" id="classcat">
<option value=" ">---Pick a Subclass---</option>
<?php
while($row = mysqli_fetch_assoc($result)){

$class_category_id = $row["class_category_id"];
$class_name = $row["class_category_name"];

echo "<option value=".$class_category_id .">$class_name</option>";

}








}

?></select>