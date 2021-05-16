<?php 
include_once"function.php";

top(); ?>
 
<?php echo'<div class="nav_rule nomargin bd_padding" >';
if(check_admin_user()){
	
	if(isset($_POST['session']))
		{ $session =$_POST['session'];}

	if(isset($_POST['T']))
		{ $T =$_POST['T'];}

	if(isset($_POST['class_id']))
		{ $class_id =$_POST['class_id'];}


	if(isset($_POST['status']))
		{ $status =$_POST['status'];}



	$conn =dbresult();

	$setup_query ="SELECT fee FROM fee_setup WHERE session = $session && class_id =$class_id && term='$T'";

	$setup_result = mysqli_query($conn, $setup_query) or die(mysqli_error($conn));

	if(mysqli_num_rows($setup_result) == 0)

	{
		echo"<p><b>school fee has not be set up for the term and session you selected</b><br/>

		Contact your Account officer</p>";
	}else{

	$row =mysqli_fetch_assoc($setup_result);

	$fee = $row['fee'];
	

if($status == 1)
{
$sum_query ="Select SUM(total_paid) AS total from fees where `session`='".$session."' and `term` ='".$T."' and `class_id`='".$class_id."'";

$sum_result =mysqli_query($conn, $sum_query) or die(mysqli_error($conn));
if($sum_result)
{
	$sum_row = mysqli_fetch_assoc($sum_result);

}

$query="SELECT * FROM `student_profile`,`fees` WHERE `student_profile`.student_id = `fees`.student_id and `fees`.session='".$session."'and `fees`.term ='".$T."'and `fees`.class_id='".$class_id."'and `fees`.total_paid > 0";
}

if($status == 2)
{
	$query="SELECT * FROM `student_profile`,`fees` WHERE `student_profile`.student_id = `fees`.student_id and `fees`.session='".$session."'and `fees`.term ='".$T."'and `fees`.class_id='".$class_id."'and `fees`.total_paid >='".$fee."'";
}

if($status == 3)
{
	$query="SELECT * FROM `student_profile`,`fees` WHERE `student_profile`.student_id = `fees`.student_id and `fees`.session='".$session."'and `fees`.term ='".$T."'and `fees`.class_id='".$class_id."' and `fees`.total_paid <'".$fee."'";
}
	

	$result =mysqli_query($conn, $query) or die(mysqli_error($conn));

if(mysqli_num_rows($result) == 0)

	{
		echo"<p><b>No records of students for fee status in the term and session  selected</b>

		</p>";
	}else{
	 echo'<div class="col-sm-6">
        <h4><b>Session : </b>'; $sec =$session+1;  echo $session ." / ".$sec.'</h4>
        <h4><b>Term : </b>'.$T.'</h4>
        </div>

         <div class="col-sm-6">';
        
       
           $query ='Select `class_name` from `class` where `class_id`='.$class_id;
           
	      $class =mysqli_query($conn, $query) or die(mysqli_error($conn));

             $class_name=mysqli_fetch_assoc($class);

              echo '<h4><b>Class :</b> '.$class_name['class_name'].'</h4>';


              if(isset($fee))
              {
               echo'<h4><b>Class school fee :</b> '. $fee.'</h4>';
              }

       
  echo'</div>

 <table class="table table-striped">
      <tr>
        <th>S/N</th> <th>Names</th> <th>First Payment</th> <th>Second Payment</th> <th>Third Payment</th> <th>Fourth Payment</th> <th>Fifth Payment</th>
         <th>Total Paid</th><th>Discount</th><th>Arears</th><th>Balance</th>
      </tr>';
    
      $c = 0;
	
while ($value=mysqli_fetch_assoc($result)) {
++$c ;

echo'<tr>
     <td>'.$c.'</td>
       <td>'.$value['surname']." ".$value['firstname']." ".$value['othername'].'</td>
       <td> &#x20A6; '.$value['first_payment'] .'</td>
       <td> &#x20A6; '.$value['second_payment'].'</td>
       <td> &#x20A6; '.$value['third_payment'] .'</td>
       <td>&#x20A6; '.$value['fourt_payment'] .'</td>
        <td>&#x20A6; '.$value['fifty_payment'] .'</td>
        <td>&#x20A6; '. $value['total_paid'] .'</td>
         <td>&#x20A6; '.$value['discount'] .'</td>
        <td>&#x20A6; '.$value['arears'] .'</td>
        <td>&#x20A6;'.$value['balance'].'</td></tr>';
	

}

        if(isset($sum_row)){
echo'<tr><td colspan="6">Sum of fee collected </td><td colspan="3"><b>

     &#x20A6;'.$sum_row['total'].'</b></td></tr>';
 }

echo"</table>";
}
}

	admin_do_url("viewschoolfee.php","back to view school");


}	
echo"</div>";
foot();?>