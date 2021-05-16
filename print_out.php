<?php include_once('functions.php');?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Out</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.table > tbody > tr > td{
   line-height: 1.3;
  /* width: 100%;*/
	padding: 5px;
	border-top:none;
}
body{
	font-size: 13px;
}
</style>

</head>

<body>
<?php


	

	$conn=db();
	$query="select * from form where id='".$_SESSION['id']."'";
	$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
	if(!$result){
		
		
	
		echo"<p class=\"message\">Query Failed</p>";
	}
	if(mysqli_num_rows($result) > 0){
		
		echo"<div class='container'>
	<div class='row nomargin '>
	<div class='col-sm-10 col-sm-offset-1'>";
	
		
		
		$row=mysqli_fetch_assoc($result);
		echo"<table class='table  table-bordered table-responsive'>
		<tr>
		<td colspan=\"3\" align=\"center\"><h3>".$row['school']."</h3><h5 class=\"bl\">Motto:The Lord Is Our Shepherd</h5>
		</td>
		<td align=\"center\">
		<img src='images/ajibaybag.png'>
		</td>
		</tr>
		<tr><td rowspan=\"3\"><img src=\"images/".$row['file']."\"     
	style=\"border: 1px solid black\" width=\"140\" height=\"140\" />
	</td>
		<td colspan=\"3\"><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BIO DATA ADMISSION FORM</label></td>
		
	
	<tr>
	
	<td>".ucwords($row['surname'])."</td>
	<td>".ucwords($row['name'])."</td>
	<td>".ucwords($row['othername'])."</td>
	
	
	<tr>
	<td><label>SURNAME</label></td>

	<td><label>NAME</label></td>
	<td><label>OTHER NAME</label></td>

	</tr>
	
	<tr>
	
	<td>".ucwords($row['dob'])."</td>
	
	
	<td>".ucwords($row['sex'])."</td>
	
	<td>".ucwords($row['state'])."</td>
	<td>".ucwords($row['nationality'])."</td>
	</tr>
	<tr>
	<td><label>DATE OF BIRTH</label></td>
	<td><label>SEX</label></td>
	<td><label>STATE OF ORIGIN</label></td>
	<td><label>NATIONALITY</label></td>
	</tr>
	<tr>
	
	    
	<td >".ucwords($row['religion'])."</td>
    <td>".ucwords($row['intendingclass'])."</td>
    <td >".ucwords($row['healthstatus'])."</td>
    <td>".ucwords($row['email'])."</td>
	</tr>
	<tr>
	
	<td><label>RELIGION</td>
	<td><label>INTENDING CLASS</label></td>
	<td><label>HEALTH STATUS</label></td>
	<td><label>EMAIL ADDRESS</label></td>

	</tr>
	<tr>
	<td><label>RESIDENTIAL ADDRESS:</label></td>
	<td colspan=\"3\">".ucwords($row['residential'])."</td>
	</tr>
	<tr>
	<td><label>POSTAL ADDRESS</label></td>
	<td colspan=\"3\">".ucwords($row['postal'])."</td>
	</tr>
	<tr>
	<td colspan=\"4\" align=\"center\"><label>SCHOOL ATTENDED</label></td>
	</tr>
	<tr>
	
	<td colspan=\"2\"><label>NAME OF SCHOOL</label></td>
	<td>YEAR</td>
	<td>CLASS</td>
	</tr>
	<tr>
	<td colspan=\"2\">".ucwords($row['schoolname1'])."</td>
	<td>".ucwords($row['year1'])."</td>
	<td>".ucwords($row['class1'])."</td></tr>
	<tr>
	<td colspan=\"2\">".ucwords($row['school2'])."</td>
	<td>".ucwords($row['year2'])."</td>
	<td>".ucwords($row['class2'])."</td>
	</tr>
	<tr>
	
	
	
	</tr>
	<tr>
	<td colspan=\"4\" align=\"center\"><label>PARENT / GUARDIAN</label></td></tr>
	<tr>
	<td><label>NAME</label></td>
	<td>".ucwords($row['parent'])."</td><td><label>RELATIONSHIP</label></td><td>".ucwords($row['relation'])."</td></tr>
	<tr>
	<td><label>OCCUPATION</label></td><td>".ucwords($row['occupation'])."</td><td><label>TEL</label></td><td>".ucwords($row['phone'])."</td></tr>
	<tr>
	<td  colspan=\"2\"><label>HOME ADDRESS</label></td><td colspan=\"2\">".ucwords($row['parentaddress'])."</td></tr>
	<tr>
	</tr>
	<tr>
	<td colspan=\"4\" align=\"left\"><label>DECLARATION:</label></td></tr>
	<tr>
	<td colspan=\"2\"><label> I, MR / MRS /MISS / CHIEF</label></td><td colspan=\"2\"><label>&nbsp;</label></td></tr>
	<tr>
	
	<td colspan=\"4\"><label>Being the parent/guardian of this student hereby declare that the above information is correct.
	I sincerely agree to co-operate with the school authority if my son/daughter could be given admission.</label></td>
	</tr>
	
	<tr>
	<td colspan=\"2\" align=\"center\"><label style ='margin-bottom:0px; padding:0px;'></label></td>
	<td colspan=\"2\" align=\"center\"><label>&nbsp;</label></td>
	</tr>
	<tr>
	<td colspan=\"2\" align=\"center\">Signature of student & Date</td>
	<td colspan=\"2\" align=\"center\">Signature of parent/Gardian & Date</td>
	</tr>
	<tr>
	<td colspan=\"4\" align=\"center\"><label>FOR OFFICE USE ONLY</label></td></tr>
	<tr>
	<td colspan=\"2\">Form assessed by:</td><td colspan=\"2\">Student last class:</td></tr>
	<tr>
	<td colspan=\"2\">Approved for Admission or not:</td><td colspan=\"2\"></td></tr>
	<tr>
	<td>Class on Admission:</td>
	<td colspan=\"3\">&nbsp;</td></tr>
	<tr>
	<td>Remarks(Principal):</td><td colspan=\"3\">&nbsp;</td></tr>
	<tr>
	<td colspan=\"4\" align=\"center\">We are noted for Academic Excellence.</td>
	</tr>
	</table>
	</div>
	</div>";
	exit();
	
	
	
	}else{
		HD();
		echo"<div  id=\"enter\">";
		echo"<p class=\"message\">If you have register,check your username.</p>";
		username_form();
		echo"</div>";
	}
/*}else{
	stage_one();
	echo"<div id=\"enter\">";
username_form();
echo"</div>";
}
}*/
FT();
?>