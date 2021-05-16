<?php  set_time_limit(0);
include_once"../function/include.php";  
       include_once"adminFunction.php"; 
       admincheck();
       include_once"../function/headerTop.php";
       top();
       
       linkToBoostrap();
       ?>
<style type="text/css">

p{
    font-size: 12px;  

}
.s{border:1px solid #000;
  margin-bottom:7px;
  padding-top:5px;}

@media print{
p{font-size: 11px;}
.s{border:2px solid #000;
  margin-bottom:7px;
  padding-top:5px;}
}
</style>


<?php
       $conn=db();
       $p=array();


       $c =$_POST['c'];
      $class = select_class($c);
       $q="SELECT * from student_profile where status='present' && class_id ='$c'";

       $r=mysqli_query($conn,$q) or die(mysqli_error($conn));

       if(mysqli_num_rows($r) !=0){
       	while($f=mysqli_fetch_assoc($r)){
       		if(!empty($f['pin'] )){
       		$p[] = $f;
       	}
       }
   
       
  echo"<div class='col-xs-12 col-sm-10 col-sm-offset-1'>";
  

    echo"<p><b>PINS FOR ".$class['class_name']." STUDENTS</b>";
      
       	foreach ($p as $key => $value) {
                     $y =$value['pin_year'] + 1;
                     echo"<div class='col-xs-4 s'>
                     <p><b>Ajibay Academy Result Pin</b></p>
                     <p><b>Session : </b>".$value['pin_year']."/".$y."&nbsp;&nbsp;<b>Term : </b>".$value['pin_term']."</br>
                    <b>Name : </b>".$value['surname']."&nbsp;&nbsp;".$value['firstname']."</br>
                     <b>Reg No : </b>".$value['student_no']."<br/>
                    <b> Pin : </b>".$value['pin']."
                     </p>
                     <p><b>www.ajibayschools.com.ng/result</b></p></div>";
              
       		
       			
       			
       				
       					
       					
       			
       		}

       		# code...
       	


echo"</div>";
}else{
      echo" <p>No Pin have been generated for " .$class['class_name']."students.</p>";
}


       


       ?>