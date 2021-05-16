<?php include_once"function.php";?>
<!DOCTYPE html>
<html>
<head>
	<title>school account</title>

	  <link id="shortcodes-css" rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
</head>
<style type="text/css">
  
  @media all{
    .conver{border: 2px solid #000 !important;padding-top: 10px;}
.row{margin: 0px;padding:5px 10px; }
    p{font-size: 11px;font-weight: bold;}
    b{font-size:12px;font-weight: bold !important;}
    .table{margin-bottom: 5px;}
.table> tbody > tr > th{padding: 2px !important;}
.table> tbody > tr > td{padding: 2px !important;}
.noborder> tbody > tr > th{border-top: 0px !important;}
.noborder> tbody > tr > td{border-top: 0px !important;}
body{font-size: 12px !important;}

hr {
    margin-top: 5px;
    margin-bottom: 10px;
    border: 0;
    border-top: 2px solid #eee;
  }
}
  @media print{
     .table-striped > tbody > tr:nth-child(2n+1) > th {
    background-color: #f9f9f9 !important;
  }
     .table-striped > tbody > tr:nth-child(2n+1) > td {
    background-color: #f9f9f9 !important;

}
b{font-size:12px;font-weight: bold !important;}
    }
</style>
<body>



 
<?php echo'<div class="row" >';
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
		echo'<div class="col-xs-12 text-center" >
     <p>AJIBAY ACADEMY
     <br/>Ayetoro Road, Ayobo Ipaja, Lagos 
     <br/>P.O.Box2455, Ipaja Lagos. Tel:08033030117
     <br/>Motto : The Lord is our shepherd</p>
   </div>
   <div class="col-xs-12 text-center page-header" ><h4><b>';
    if($status == 1) {echo "All students that have paid school fee";}
     if($status == 2) {echo "All students that have completely paid their school fee";}
     if($status == 3) {echo "All students that have outstanding  school fee to be paid";}

   echo'</b></h4></div>
	 <div class="col-xs-6">
        <h4><b>Session : </b>'; $sec =$session+1;  echo $session ." / ".$sec.'</h4>
        <h4><b>Term : </b>'.$T.'</h4>
        </div>

         <div class="col-xs-6">';
        
       
           $query ='Select `class_name` from `class` where `class_id`='.$class_id;
           
	      $class =mysqli_query($conn, $query) or die(mysqli_error($conn));

             $class_name=mysqli_fetch_assoc($class);

              echo '<h4><b>Class :</b> '.$class_name['class_name'].'</h4>';


              if(isset($fee))
              {
               echo'<h4><b>Class school fee :</b> '. $fee.'</h4>';
              }

       
  echo'</div>

 <table class="table table-striped table-bordered">
      <tr>
        <th>S/N</th> <th>Names</th><th> Payment</th> <th>First </th> <th>Second </th> <th>Third </th> <th>Fourth </th><th>Fifth </th>
         <th>Total Paid</th><th>Discount</th><th>Arears</th><th>Balance</th>
      </tr>';
    
      $c = 0;
	
while ($value=mysqli_fetch_assoc($result)) {
++$c ;


       ?>
        <tr>
     <td rowspan="2"><?php echo $c; ?> </td>
       <td rowspan="2">
          <?php 
           echo $value['surname']." ".$value['firstname']." ".$value['othername'];
          ?>
       </td>
       <td>Amount</td>
       <td><?php echo $value['first_payment'] > 0 ? "&#x20A6; ".$value['first_payment'] :""; ?></td>
       <td><?php echo $value['second_payment'] > 0 ?"&#x20A6; ".$value['second_payment']:""; ?></td>
       <td><?php echo $value['third_payment'] > 0 ?"&#x20A6; ".$value['third_payment']:""; ?></td>
       <td><?php echo $value['fourt_payment'] > 0 ?"&#x20A6; ".$value['fourt_payment']:""; ?></td>
        <td><?php echo $value['fifty_payment'] > 0 ?"&#x20A6; ".$value['fifty_payment']:""; ?></td>
       <td rowspan="2"><?php echo"&#x20A6; ". $value['total_paid']; ?></td>
       <td rowspan="2"><?php echo $value['arears'] > 0 ?"&#x20A6; ".$value['arears']:""; ?></td>
       <td rowspan="2"><?php echo $value['discount'] > 0 ?"&#x20A6; ". $value['discount']:""; ?></td>
       <td rowspan="2"><?php echo"&#x20A6; ". $value['balance'];?></td>
       
     
     </tr>
       <tr>
     <td>Date Paid</td>
      <td><?php echo $value['first_payment'] > 0 ?$value['firstpayment_date'] :""; ?></td>
       <td><?php echo $value['second_payment'] > 0 ? $value['secondpayment_date']:""; ?></td>
       <td><?php echo $value['third_payment'] > 0 ? $value['thirdpayment_date']:""; ?></td>
       <td><?php echo $value['fourt_payment'] > 0 ? $value['fourtpayment_date']:""; ?></td>
        <td><?php echo $value['fifty_payment'] > 0 ? $value['fiftypayment_date']:""; ?></td>
     
     </tr>
     <?php

}

        if(isset($sum_row)){
echo'<tr><td colspan="8">Sum of fee collected </td><td colspan="3"><b>

     &#x20A6;'.$sum_row['total'].'</b></td></tr>';
 }

echo"</table>";
}
}




}	
echo"</div>";
?>
</body>
</html>