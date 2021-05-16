<?php  include_once"function/include.php";  
       include_once"teacher/teacherfunction.php"; 
       include_once"function/headerTop.php";  
       top();
       ?>
<style type="text/css">
body{
  margin-top: 0px;
}
.table > tbody > tr > td{
  padding: 4px 3px;
}
th,td {
    text-align: center;
}
@media print{
  body{
    font-size: 11px;
  }
  p{font-size: 11px;}
}
.c{
  background-color: #ccc;
}
</style>
       <?php


set_time_limit(0);
if(!isset($_SESSION['studentlogin'])){
  header("location:../result/index.php");
}
$sex = $_SESSION['gender'];
$name = $_SESSION['S_fullname'] ;
 $std_id =$_SESSION['S_ID'];
        $c =$_GET['class'];
        $sc =$_GET['subclass'];

        $no=$_SESSION['S_student_no'];

        $term=$_GET['t'];
        
       $s=$_GET['year'];
       $splus = $s + 1;

      $e2 = get_subject_In_first_term($std_id,$c,$sc,$s);
      $e3 = get_subject_In_first_and_second_term($std_id,$c,$sc,$s);
      $e1 = get_subject_In_first_second_and_not_in_third_term($std_id,$c,$sc,$s);
      //var_dump($e2);
       $sb = getdtudentsubject($std_id,$c,$sc,$s);
       // $sb =getsubject($c,$sc,$s);


if(!$sb){  

echo"<p>No records for the information provided was found.make sure the correct information is provided</p>";
exit();}
         
         $sb_num = count($sb);
  
  if(empty($sb_num)){
 	$sb_num =1;
 	$sb = array('');
 }
 


 if($term =='First Term'){
  $R_term ='Second Term';
   $resumption = select_resumption($s,$R_term);

 }
 elseif($term =='Second Term'){
 $R_term ='Third Term';
   $resumption = select_resumption($s,$R_term);

 }
 elseif($term =='Third Term'){
  $R_term ='First Term';
   $resumption = select_resumption($s,$R_term);

 }
 //$resumption = select_resumption($year,$R_term)
//$p_f = position_first($c,$sc,$s,$term);
//var_dump($p_f);
 foreach ($sb as $ksb => $vsb) {

$sb_id[] = $vsb['subject_id'];



 }

 
$reg = get_reg_id($std_id,$sc,$c,$term,$s); // get reg id
if(!$reg){
  echo"<p>No records for the information provided was found.make sure the correct information is provided</p>";
exit();
}

$rs = select_result_display($std_id,$c,$sc,$reg['reg_id'],$sb_id,$term,$s); // get result

$gt = GrandTotal($std_id,$sc,$c,$reg['reg_id'],$s,$term);  //return sum of total marks per term
$avg =getAverage($std_id,$sc,$c,$reg['reg_id'],$s,$term); // return avarage of students

$reg1 = get_reg_id($std_id,$sc,$c,'First Term',$s); // get reg id for first term

$reg2 = get_reg_id($std_id,$sc,$c,'Second Term',$s); // get reg id for first term

$per1 = select_result_display($std_id,$c,$sc,$reg1['reg_id'],$sb_id,'First Term',$s); // get percentage for first

$per2 = select_result_display($std_id,$c,$sc,$reg2['reg_id'],$sb_id,'Second Term',$s); // get percentage for first
 $sec_avg = getAverage2($std_id,$sc,$c,$s);      // get avarage scores for second term
// var_dump($sec_avg);
 $third_avg = getAverage3($std_id,$sc,$c,$s);    // get avarage score for third term

 $firsttermcheck = checkstudentterm($std_id,$c,$sc,$s,'First Term'); // chech if student is present for first term
 $secondtermcheck = checkstudentterm($std_id,$c,$sc,$s,'Second Term');  // chech if student is present for second term

$f_class =select_class($c); // function to get class
   $s_Class = select_subclass($sc); // function to get sub class
   if(isset($s_Class['class_catgory_id']) == 1){ // check if a sub class exixt
    $s_c = "";
   }else{
    $s_c = $s_Class['class_category_name'];
   }

  //$tttt = position_first($c,$sc,$s,$term);
 // var_dump($tttt);
        ?>
       <div class="container">
        <div class="row">
           <div class="col-xs-2" style="text-align:center;">
            <img src="images/padge.png" class="img-responsive" style="width:100px" />
            </div>
              <div class="col-xs-7 col-sm-6 col-sm-offset-1" style="text-align:center;">
                <p class="result1"><span>AJIBAY ACADEMY</span></p>
                <P>Ayetoro Road, Ayobo Ipaja, Lagos </P>
                <P>P.O.Box2455, Ipaja Lagos. Tel:018136815</p>
                  <p>Motto : The Lord is our shepherd</p>
              </div>
              <div class="col-xs-3 col-sm-2 col-sm-offset-1">
                <p><b>Class :</b> <?php echo $f_class['class_name'];?></p>
                <p><b>Term  :</b> <?php echo $term ; ?> </p>
                <p><b>Session :</b> <?php echo $s.'/'.$splus; ?> </p>
                <p><b>Sex :</b> <?php echo $sex; ?> </p>
              </div>
              <div class="col-xs-12 resultbg" style="text-align:center;">
                <p><b>
                <?php if( $c > 3){
                  echo "SENIOR SECONDARY SCHOOL REPORT SHEET";
                }else{
                     echo" JUNIOR SECONDARY SCHOOL REPORT SHEET";
                }
                ?>
                </b></p>
              </div>
              <div class="col-xs-12">
                <div class="col-xs-8 col-sm-9 col-sm-offset-1"><p><b>STUDENT`S NAME :</b> <?php echo $name; ?></p></div>
                <div class="col-xs-4 col-sm-2"><p><b>Reg Number : </b><?php echo $no; ?></p></div>
                
              </div>
        </div>

     <div class="row" style=" margin-top:3px;">
      <div class="col-xs-12">
        <table class="table table-bordered">
        	<tr>
        		<td width='10%' ></td>
        		<td width='5%'><p class="sub_rotate2">MaxMark</p></td>
        		<?php


$sub_total =(int)$sb_num;
 for ($i=0; $i < $sub_total ; $i++) { 
 	# code...
 
 echo"<td width='4%'> <p class='sub_rotate2'>",isset($sb[$i]['subject_name']) ? $sb[$i]['subject_name'] : '',"</p></td>";
}?>
<td width='4%'><p class="sub_rotate2">Grand Total</td>
	<td width='4%'><p class="sub_rotate2">Average(%)</p></td>
	<td width='4%'><p class="sub_rotate2"><b>POSITION</b></p></td>

        	</tr>
        	<tr>
        		<td>Cont. Assess</td>
        		<td>40</td>
        		<?php
        		for ($i=0; $i <$sub_total ; $i++) {
  
  echo"
  <td>",isset($rs[$i]['student_ca2']) ? str_replace(" ","",$rs[$i]['student_ca2']): '',"</td>";
}
?>
        	<td></td>
        	<td></td>
        	<td></td>
        	</tr>
        	<tr>
        		<td>Examination</td>
        		<td>60</td>
        		<?php
        		for ($i=0; $i <$sub_total ; $i++) {
  
  echo"
  <td>",isset($rs[$i]['student_exam']) ? $rs[$i]['student_exam'] : '',"</td>";
}
?>
        	<td></td>
        	<td></td>
        	<td></td>
        	</tr>

        	<tr class="t">
        		<td>Total</td>
        		<td>100</td>
        		<?php
for ($i=0; $i <$sub_total ; $i++) {
  $T = $rs[$i]['student_mark'];
  echo"
  <td><b>",isset($T) ? $rs[$i]['student_mark'] : '',"</b></td>";
}
        		?>
        	<td></td>
        	<td> </td>

        	<td></td>
        	</tr>
        	<?php
        	//  ======== if its second term ============
        	
        	if($term =="Second Term"){

            if( $firsttermcheck == true){


            }else{

    echo"  <tr>
        		<td>1st Term (20%)</td>
        		<td></td>";
        		        
for ($i=0; $i <$sub_total ; $i++) {
  $R1 =round($per1[$i]['student_mark'] * 0.2,2);
  echo"
  <td>",isset($R1) ? $R1  : '',"</td>";
}

echo"<td></td>
        	<td></td>
        	<td></td>
        	</tr>

        	 <tr>
        		<td>2nd Term (80%)</td>
        		<td></td>";
        		        
for ($i=0; $i <$sub_total ; $i++) {
 $R2 = round($rs[$i]['student_mark']* 0.8,2);
  
  echo"
  <td>",isset($R2) ? round($rs[$i]['student_mark'] * 0.8,2)  : '',"</td>";
}

echo"<td></td>
        	<td></td>
        	<td></td>
        	</tr>";
   
    }
        	}
//=============================            if its third term          ============================



        	if($term =='Third Term'){

             if( $firsttermcheck == true && $secondtermcheck == true){ // if student is not present for first and second term

             } 
              elseif ($firsttermcheck == true && $secondtermcheck != true) {  //if student is not presnt for first term

        echo" <tr>
            <td>2nd Term (20%)</td>
            <td></td>";
                    
for ($i=0; $i <$sub_total ; $i++) {
  $Rt2 =round($per2[$i]['student_mark'] * 0.2,2);
  echo"
  <td>",isset($Rt2) ? round($per2[$i]['student_mark'] * 0.2,2)  : '',"</td>";
}

echo"<td></td>
          <td></td>
          <td></td>
          </tr>
   
   <tr>
            <td>3rd Term (80%)</td>
            <td></td>";
                    
for ($i=0; $i <$sub_total ; $i++) {
   $Rt3 = round($rs[$i]['student_mark']* 0.8,2);
  
  echo"
  <td>",isset($Rt3) ? round($rs[$i]['student_mark'] * 0.8,2)  : '',"</td>";
}

echo"<td></td>
          <td></td>
          <td></td>
          </tr>";
              
             }elseif($firsttermcheck != true && $secondtermcheck == true){ // if student is not present for second term but was present for firstern and third term
  echo"  <tr>
            <td>1st Term (20%)</td>
            <td></td>";
                    
for ($i=0; $i <$sub_total ; $i++) {
  $Rt1 =round($per1[$i]['student_mark'] * 0.2,2);
  echo"
  <td>" ,isset($Rt1) ? round($per1[$i]['student_mark'] * 0.2,2)  : '', "</td>";
}

echo"<td></td>
          <td></td>
          <td></td>
          </tr>

 <tr>
            <td>3rd Term (80%)</td>
            <td></td>";
                    
for ($i=0; $i <$sub_total ; $i++) {
   $Rt3 = round($rs[$i]['student_mark']* 0.8,2);
  
  echo"
  <td>",isset($Rt3) ? round($rs[$i]['student_mark'] * 0.8,2)  : '',"</td>";
}

echo"<td></td>
          <td></td>
          <td></td>
          </tr>";


}
              else{

    echo"  <tr>
        		<td>1st Term (20%)</td>
        		<td></td>";
        		        
for ($i=0; $i <$sub_total ; $i++) {
  $Rt1 =round($per1[$i]['student_mark'] * 0.2,2);
  echo"
  <td>" ,isset($Rt1) ? round($per1[$i]['student_mark'] * 0.2,2)  : '', "</td>";
}

echo"<td></td>
        	<td></td>
        	<td></td>
        	</tr>

        	 <tr>
        		<td>2nd Term (20%)</td>
        		<td></td>";
        		        
for ($i=0; $i <$sub_total ; $i++) {
if(in_array($rs[$i]['subject_id'], $e1)) {
  $Rt2 =round($per2[$i]['student_mark'] * 0.2,2);
}else{
  $Rt2 =round($per2[$i]['student_mark'] * 0.8,2);
}
  //var_dump($per2[$i]['subject_id']);
  echo"
  <td>",isset($Rt2) ?  $Rt2 : '',"</td>";
}

echo"<td></td>
        	<td></td>
        	<td></td>
        	</tr>
   
   <tr>
        		<td>3rd Term (60%)</td>
        		<td></td>";
        		        
for ($i=0; $i <$sub_total ; $i++) {

 //var_dump($rs[$i]['subject_id']);
if(!in_array($rs[$i]['subject_id'], $e3)) {
  $Rt3 = round($rs[$i]['student_mark'],2);
}else{
  if(!in_array($rs[$i]['subject_id'], $e2)){
$Rt3 = round($rs[$i]['student_mark']* 0.8,2);
  }else{
   $Rt3 = round($rs[$i]['student_mark']* 0.6,2);
  }
}
  echo"
  <td>",isset($Rt3) ? $Rt3  : '',"</td>";
}

echo"<td></td>
        	<td></td>
        	<td></td>
        	</tr>";
        	}
        }

        	?>
        	<tr class='c'>
        		<td>Grand Total</td>
        		<td></td>
        		        		<?php
                         if($term =='First Term'){
for ($i=0; $i <$sub_total ; $i++) {
 $T = $rs[$i]['student_mark'];
  //var_dump($rs[$i]['subject_id']);
  echo"
  <td><b>",isset($T) ? $rs[$i]['student_mark'] : '',"</b></td>";
}
}elseif($term =='Third Term'){
 $Totalaverage3 = 0;
for ($i=0; $i <$sub_total ; $i++) {
//var_dump($rs[$i]['subject_id']);
if(!in_array($rs[$i]['subject_id'], $e3)) {
 
$rt3 = round($rs[$i]['student_mark'],2);
   $rrt =$rt3;//+$rt1 + $rt2;
  // if(!empty($rrt)){
//if(!empty($Totalaverage3)){
   $Totalaverage3 += $rrt;
// }
//}
 }
else{
   if(in_array($rs[$i]['subject_id'], $e1)) {
   $rt1 =round($per1[$i]['student_mark'] * 0.2,2);
   $rt2 =round($per2[$i]['student_mark'] * 0.2,2);
   $rt3 = round($rs[$i]['student_mark']* 0.6,2);
   $rrt =$rt1 + $rt2 + $rt3;
  // if(!empty($rrt)){
//if(!empty($Totalaverage3)){
   $Totalaverage3 += $rrt;
// }
//}
 }else{
  $rt1 =round($per1[$i]['student_mark'] * 0.2,2);
   $rt2 =round($per2[$i]['student_mark'] * 0.8,2);
   $rrt =$rt1 + $rt2;
  // if(!empty($rrt)){
//if(!empty($Totalaverage3)){
   $Totalaverage3 += $rrt;
// }
//}
 }
 }

  echo"
  <td><b>",$rrt,"</b></td>";
}
}elseif ($term =='Second Term') {
  # code...
  $Totalaverage2 = 0;
  for ($i=0; $i <$sub_total ; $i++) {
$Rs1 =round($per1[$i]['student_mark'] * 0.2,2);
$Rs2 = round($rs[$i]['student_mark']* 0.8,2);

 $rrs =$Rs1 + $Rs2;

   $Totalaverage2 +=$rrs;
 
  echo"
  <td><b>",$rrs,"</b></td>";
  }
}else{
   for ($i=0; $i <$sub_total ; $i++) {
echo"
  <td></td>";
  } 
}
?>
<td><?php if($term =='First Term'){echo $gt ;}elseif($term =='Third Term'){echo  $Totalaverage3 ;}elseif ($term == 'Second Term') { echo isset($Totalaverage2) ? $Totalaverage2:'';
  # code...
}?></td>

<?php if(isset($Totalaverage2)){
  if($term == 'Second Term'){$second_Average = round($Totalaverage2/$sec_avg ,2);} }
  //if(isset($Totalaverage3)){
  if($term == 'Third Term'){$third_average = round($Totalaverage3 / $third_avg , 2);}//}
 ?>
        	<td><?php if($term =='First Term'){echo $avg ;
          }elseif($term == 'Second Term'){
            if(isset($second_Average)) {echo $second_Average;}
          }elseif($term =='Third Term'){
            if(isset($third_average)) {echo $third_average;} 
          }?></td>
        	<td><?php $position = position_first($c,$sc,$s,$term);

           foreach ($position as $key => $value) {

            $postion_id =$value['student_id'];
            $class_position=$value['position'];
            if($std_id == $postion_id){
              $position_in_class =$class_position;
             echo $position_in_class;
            
            if($position_in_class == '1'){
              echo "st";
            }elseif($position_in_class == '2'){
             # code...
            echo "nd";
           }elseif($position_in_class == '3'){
             # code...
            echo "rd";
           }else{
             # code...
            echo "th";
           }
         }
         }
           ?></td>
        	</tr>
        	<tr>
        		<td><?php if($c < 4){
                     echo"Position";
                 }else{
                 	echo"Grade";
                 }
                 ?>

        			</td>

        			<td></td>
        		        		<?php

for ($i=0; $i <$sub_total ; $i++) {
  
  echo"
  <td>";  
   # code...
  //echo $std_id;
  
if($c < 4 ){
 $u =subject_position($c,$sc,$s,$rs[$i]['subject_id'],$term);

 if(!empty($u)){
  foreach ($u as $key => $value) {
    # code...

    $p =isset($value['position'])? $value['position'] : '';
    $sub=isset($value['subject']) ? $value['subject'] :'';
    $id=isset($value['student_id']) ? $value['student_id']:'';
  
    if($std_id == $id){
      echo $p;

     if($p == '1'){
              echo "st";
            }elseif($p == '2'){
             # code...
            echo "nd";
           }elseif($p == '3'){
             # code...
            echo "rd";
           }else{
             # code...
            echo "th";
           }

   }
  }
 }
  }else{
    if($term =="First Term"){ echo grade($std_id,$c,$sc,$s,$rs[$i]['subject_id'],$term);}
    if($term =="Second Term"){ echo grade($std_id,$c,$sc,$s,$rs[$i]['subject_id'],$term);}
    if($term =="Third Term"){ echo grade($std_id,$c,$sc,$s,$rs[$i]['subject_id'],$term);}
    
  }
   # code...
  
  echo"</td>";
}
?>
<td></td>
        	<td></td>
        	<td></td>
        	</tr>


        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-8" style=" margin-top:3px;">
          <p><b>Class Teacher's Comments :</b></p>
      </div>
      <div class="col-xs-4" style=" margin-top:3px;">
        <p>Date / Signature</p>
      </div>
      <div class="col-xs-8" style=" margin-top:3px;">
          <p><b>Principal's Comments  :</b>
            <?php 
          if($term =='First Term'){ $comment_average = $avg;
          }elseif($term == 'Second Term'){
             $comment_average= $second_Average;}
          elseif($term =='Third Term'){
             $comment_average= $third_average;} 
            $comment = teacherCommet($position_in_class,$comment_average,$term); echo $comment; ?> </p>
      </div>
      <div class="col-xs-4" style=" margin-top:3px;">
        <p>Date / Signature</p>
      </div>
      <div class="col-xs-12" style=" margin-top:3px;">
        <p><b>RESUMPTION DATE : </b>&nbsp;&nbsp;<?php echo $resumption;?></p>
      </div>

    </div>
  </div>
