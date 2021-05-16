<?php  include_once"../function/include.php";  
      

       if(isset($_POST['submit'])){
  $t = $_POST['term'];
  $y = $_POST['year'];
  $d =$_POST['date'];
  $c =db();

       	$q="SELECT * FROM resumtion_date where term ='$t' && year ='$y'";

       	$result = mysqli_query($c,$q) or die(mysqli_error($c));
       	if(mysqli_num_rows($result) != 0){
       		$r = mysqli_fetch_assoc($result);
       		$u ="UPDATE resumtion_date SET `term` ='$t',`year` ='$y',`date`='$d' where `ID` ='".$r['ID']."'";
       		$up =mysqli_query($c,$u);
       		if($up){
       			header("location:../cpanel/resumptionDate.php?r=1");
       			exit();
       		}
       	}else{

       		$i ="INSERT INTO resumtion_date (`term`,`year`,`date`) VALUES('$t','$y','$d')";
       		$ri =mysqli_query($c,$i) or die(mysqli_error($c));
       			if($ri){
                    header("location:../cpanel/resumptionDate.php?r=1");
       			    exit();
       			}else{
                 header("location:../cpanel/resumptionDate.php?r=0");
       			exit();
       			}
       	}





       }else{
       	echo" failed";
       }




       ?>