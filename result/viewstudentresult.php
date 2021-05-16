<?php  include_once"function/include.php";  
       include_once"teacher/teacherfunction.php"; 
       include_once"function/headerTop.php";  
       top();
       ?>
<style type="text/css">
body{
  margin-top: 0px;
}
.table{
  margin-bottom: 5px !important;
}
.table > tbody > tr > td{
  padding: 4px 3px;
}
th,td {
    text-align: center;
}
.tail{
  border: 1px solid #000 !important;
  margin:5px 0px;
  padding:5px;
}
.pad{
  padding:0px 15px !important;
}
@media print{
  body{
    font-size: 11px;
  }
  p{font-size: 11px;}
  .table-bordered > tbody > tr > td {
    border: 1px solid #000 !important;
  }

  .tail{
  border: 2px solid #000 !important;
  border-right: 2px solid #000 !important;
  border-left: 2px solid #000 !important;
  
}
.table{
  margin-bottom: 5px !important;
}
.pad{
  padding:0px 15px !important;
}
}
.c{
  background-color: #ccc;
}
</style>
       <?php



if(!isset($_SESSION['studentlogin'])){
  header("location:../result/index.php");
}
set_time_limit(0);
$sex = $_SESSION['gender'];
$name = $_SESSION['S_fullname'] ;
$option = $_SESSION['S_class_option'] ;
 $std_id =$_SESSION['S_ID'];
        $c =$_GET['class'];
        $sc =$_GET['subclass'];

        $no=$_SESSION['S_student_no'];

        $term=$_GET['t'];
        
       $s=$_GET['year'];
       $splus = $s + 1;
      if($s == "2015" && $term =="Third Term")
{
    $nine =(int)8;  
}
 else {
     $nine = (int)9;
 }
      
      $sb1 =getsubject($c,$sc,$s,$term);
      $subject_num = count($sb1);
       $sb = getdtudentsubject($std_id,$c,$sc,$term,$s);

       if($c > 3){
        $compulsary_subject = get_all_compulsary_subject($option,$term,$s);


       }
      

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
$sub_num = select_sub_number($std_id,$c,$sc,$term,$s);
$e2 = get_subject_In_first_term($c,$sc,$s);
$e3 = get_subject_In_first_and_second_term($c,$sc,$s);
$e1 = get_subject_In_second_term($c,$sc,$s);

 $firsttermcheck = checkstudentterm($std_id,$c,$sc,$s,'First Term'); // chech if student is present for first term
 $secondtermcheck = checkstudentterm($std_id,$c,$sc,$s,'Second Term');  // chech if student is present for second term

$f_class =select_class($c); // function to get class
   $s_Class = select_subclass($sc); // function to get sub class
   if(isset($s_Class['class_catgory_id']) == 1){ // check if a sub class exixt
    $s_c = "";
   }else{
    $s_c = $s_Class['class_category_name'];
   }

        ?>
       <div class="container">
        <div class="row">
           <div class="col-xs-2" style="text-align:center;">
            <img src="images/padge.png" class="img-responsive" style="width:100px" />
            </div>
              <div class="col-xs-7 col-sm-6 col-sm-offset-1" style="text-align:center;">
                <p class="result1"><span>AJIBAY ACADEMY</span></p>
                <P>Ayetoro Road, Ayobo Ipaja, Lagos </P>
                <p>P.O.Box2455, Ipaja Lagos. Tel:08033030117</p>
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
<td width='4%'><p class="sub_rotate2">Grand Total</p></td>
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
  $firstsemestercheck =isset($per1[$i]['student_mark']) ? $per1[$i]['student_mark'] : '';
  if(empty($firstsemestercheck ))
  {
$R1 = round($rs[$i]['student_mark']* 0.2,1);
}else
{
    $R1 =round($per1[$i]['student_mark'] * 0.2,1);
}

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

  // check for subject not in first term
  if(!in_array($rs[$i]['subject_id'], $e2)){
$R2 = $rs[$i]['student_mark'];

  }else{
 $R2 = round($rs[$i]['student_mark']* 0.8,1);
  }
  echo"
  <td>",isset($R2) ? $R2  : '',"</td>";
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
  $Rt2 =round($per2[$i]['student_mark'] * 0.2,1);
  echo"
  <td>",!empty($Rt2) ? $Rt2 : '',"</td>";
}

echo"<td></td>
          <td></td>
          <td></td>
          </tr>
   
   <tr>
            <td>3rd Term (80%)</td>
            <td></td>";
                    
for ($i=0; $i <$sub_total ; $i++) {

  if(!in_array($rs[$i]['subject_id'], $e1)){
 $Rt3=$rs[$i]['student_mark'];

echo"<td>",!empty($Rt3) ?$Rt3 : '',"</td>";


  }else{
   $Rt3 = round($rs[$i]['student_mark']* 0.8,1);
 
  
  echo"
  <td>",!empty($Rt3) ? $Rt3 : '',"</td>";
}
}

echo"<td></td>
          <td></td>
          <td></td>
          </tr>";
              
             }
             elseif($firsttermcheck != true && $secondtermcheck == true){ // if student is not present for second term but was present for firstern and third term
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
  $Rt1 =round($per1[$i]['student_mark'] * 0.2,1);
  echo"
  <td>" ,isset($Rt1) ? $Rt1  : '', "</td>";
}

echo"<td></td>
        	<td></td>
        	<td></td>
        	</tr>

        	 <tr>
        		<td>2nd Term (20%)</td>
        		<td></td>";
        		        
for ($i=0; $i <$sub_total ; $i++) {
//if(in_array($rs[$i]['subject_id'], $e1)) {
  $Rt2 =round($per2[$i]['student_mark'] * 0.2,1);
/*}else{
  $Rt2 =round($per2[$i]['student_mark'] * 0.8,2);
}*/
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

if(!in_array($rs[$i]['subject_id'], $e2) && in_array($rs[$i]['subject_id'], $e1)){
$Rt3=round($rs[$i]['student_mark'] * 0.8,1);
    echo"<td>",!empty($Rt3) ?$Rt3 : '',"</td>";
}
elseif(!in_array($rs[$i]['subject_id'], $e3)){
$Rt3=$rs[$i]['student_mark'];
    echo"<td>",!empty($Rt3) ?$$rt3 : '',"</td>";
  }else{

    $Rt3=round($rs[$i]['student_mark'] * 0.6,1);
    echo"<td>",!empty($Rt3) ?$Rt3 : '',"</td>";
  }


 
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
  <td><b>",isset($T) ? $T : '',"</b></td>";
}
}elseif($term =='Third Term'){
if($firsttermcheck == true && $secondtermcheck ==true){
  $Totalaverage3 = 0;
  $thd = 0;
for ($i=0; $i <$sub_total ; $i++) {
 $rt3 = round($rs[$i]['student_mark'],1);
   $rrt = $rt3;
   if($c > 3){
   if(!in_array($rs[$i]['subject_id'],$compulsary_subject )){
  $elect_sub[] = $rs[$i]['student_mark'];
 
  $max =max(array_values($elect_sub));
 // var_dump($max);
}
   if(in_array($rs[$i]['subject_id'],$compulsary_subject )){
  $total_thd = $rs[$i]['student_mark'];
 //var_dump($rsss[$i]['subject_id']);
  //$thd += $total_thd;
  
}
}
if($c > 3){
 if(in_array($rs[$i]['subject_id'],$compulsary_subject )){ 
$thd += $total_thd;
 }
}
   $Totalaverage3 += $rrt;
echo"
  <td><b>",!empty($rrt) ? $rrt : '',"</b></td>";
  }
}elseif($firsttermcheck == true && $secondtermcheck ==false){  //student not present for first term

 $Totalaverage3 = 0;
 //$thd = 0;
for ($i=0; $i <$sub_total ; $i++) {
if(!in_array($rs[$i]['subject_id'], $e1)){
$rt3 = $rs[$i]['student_mark'];
   $rrt =$rt3;

   if($c > 3){
    if(!in_array($rs[$i]['subject_id'],$compulsary_subject )){
  $elect_sub[] = $rs[$i]['student_mark'];
 
  $max =max(array_values($elect_sub));

}
if(in_array($rs[$i]['subject_id'],$compulsary_subject )){
  $total_thd = $rs[$i]['student_mark'];
  }
}

}else{
if($c > 3){

    if(!in_array($rs[$i]['subject_id'],$compulsary_subject )){
  $total_2 = round($per2[$i]['student_mark'] * 0.2,1);
  $total_3 = round($rs[$i]['student_mark'] * 0.8,1);
  $elect_total_thd= $total_2 + $total_3;
  $elect_sub[] = $elect_total_thd;
 
  $max =max(array_values($elect_sub));
}
if(in_array($rs[$i]['subject_id'],$compulsary_subject )){
  $total_2 = round($per2[$i]['student_mark'] * 0.2,1);
  $total_3 = round($rs[$i]['student_mark'] * 0.8,1);
  $total_thd= $total_2 + $total_3;
  //var_dump($total_thd);
}
}


   $rt2 =round($per2[$i]['student_mark'] * 0.2,1);
   $rt3 = round($rs[$i]['student_mark']* 0.8,1);
   $rrt =$rt2 + $rt3;
 }
 if($c > 3){
  if(in_array($rs[$i]['subject_id'],$compulsary_subject )){

 $thd += $total_thd;
}
}
   $Totalaverage3 += $rrt;
echo"
  <td><b>",!empty($rrt) ? $rrt : '',"</b></td>";
}

}else{

$thd = 0;
 $Totalaverage3 = 0;
for ($i=0; $i <$sub_total ; $i++) {

if(!in_array($rs[$i]['subject_id'], $e2) && in_array($rs[$i]['subject_id'], $e1)){

 $rt2 =round($per2[$i]['student_mark'] * 0.2,1);
 $rt3 = round($rs[$i]['student_mark']* 0.8,1);
$rrt =$rt2 + $rt3;
if($c > 3){
      if(!in_array($rs[$i]['subject_id'],$compulsary_subject )){

       $total_2 = round($per2[$i]['student_mark'] * 0.2,1);
        $total_3 = round($rs[$i]['student_mark'] * 0.8,1);
  $elct_total_thd =$total_2 +$total_3;
  $elect_sub[] = $elct_total_thd;
 
  $max =max(array_values($elect_sub));
  //var_dump($max);
}
if(in_array($rs[$i]['subject_id'],$compulsary_subject )){
 
  $total_2 = round($per2[$i]['student_mark'] * 0.2,1);
  $total_3 = round($rs[$i]['student_mark'] * 0.8,1);
  $total_thd =$total_2 +$total_3;
}}

}
elseif(!in_array($rs[$i]['subject_id'], $e3)){
$rt3 = $rs[$i]['student_mark'];
   $rrt =$rt3;
   if($c > 3){
      if(!in_array($rs[$i]['subject_id'],$compulsary_subject )){

  $total_3 = $rs[$i]['student_mark'];
  $total_thd =$total_3;
  $elect_sub[] = $total_thd;
 
  $max =max(array_values($elect_sub));
  //var_dump($max);
}
if(in_array($rs[$i]['subject_id'],$compulsary_subject )){
 $total_3 =$rs[$i]['student_mark'];
  $total_thd =$total_3;
//$thd += $total_thd;

}


}
}else{

if($c > 3){
      if(!in_array($rs[$i]['subject_id'],$compulsary_subject )){

        $total_1 = round($per1[$i]['student_mark'] * 0.2,1);
  $total_2 = round($per2[$i]['student_mark'] * 0.2,1);
  $total_3 = round($rs[$i]['student_mark'] * 0.6,1);
  $elect_total_thd = $total_1 + $total_2 +$total_3;
  $elect_sub[] = $elect_total_thd;
 
  $max =max(array_values($elect_sub));
  //var_dump($max);
}
if(in_array($rs[$i]['subject_id'],$compulsary_subject )){
   $total_1 = round($per1[$i]['student_mark'] * 0.2,1);
  $total_2 = round($per2[$i]['student_mark'] * 0.2,1);
  $total_3 = round($rs[$i]['student_mark'] * 0.6,1);
  $total_thd = $total_1 + $total_2 +$total_3;
//$thd += $total_thd;
   //var_dump($total_thd);
}
}

  $rt1 =round($per1[$i]['student_mark'] * 0.2,1);
   $rt2 =round($per2[$i]['student_mark'] * 0.2,1);
   $rt3 = round($rs[$i]['student_mark']* 0.6,1);
   $rrt =$rt1 + $rt2 + $rt3;
 }
   $Totalaverage3 += $rrt;
if($c > 3){
      if(in_array($rs[$i]['subject_id'],$compulsary_subject )){
       // var_dump($total_thd);
$thd += $total_thd;
      }
    }


  echo"
  <td><b>",$rrt,"</b></td>";
}
}

}elseif ($term =='Second Term') {
   $Totalaverage2 = 0;
   
            if( $firsttermcheck == true){
              $sec = 0;
for ($i=0; $i <$sub_total ; $i++) {
$Rs2 = $rs[$i]['student_mark'];

 $rrs =$Rs2;

 if($c > 3){
   if(!in_array($rs[$i]['subject_id'],$compulsary_subject )){
  $elect_sub[] = $rs[$i]['student_mark'];
 
  $max =max(array_values($elect_sub));
  //var_dump($max);
}
   if(in_array($rs[$i]['subject_id'],$compulsary_subject )){
  $total_sec = $rs[$i]['student_mark'];
 
//var_dump($rs[$i]['subject_id']);
$sec += $total_sec;
}
}
  $Totalaverage2 +=$rrs;
    echo"
  <td><b>",$rrs,"</b></td>";
}
            }else{
 $sec =0;
  for ($i=0; $i <$sub_total ; $i++) {

    if(!in_array($rs[$i]['subject_id'], $e2)){  // check for subject not in first term
      $Rs2 = $rs[$i]['student_mark'];
       $rrs = $Rs2;
  if($c > 3){
   if(!in_array($rs[$i]['subject_id'],$compulsary_subject )){
    $total_sec = $rs[$i]['student_mark'];
    $elect_sub[] = $total_sec;
   }
if(in_array($rs[$i]['subject_id'],$compulsary_subject )){
  $total_sec = $rs[$i]['student_mark'];

}
}

    }else{

 if($c > 3){
      if(!in_array($per2[$i]['subject_id'],$compulsary_subject )){

        $total_fst = round($per1[$i]['student_mark'] * 0.2,1);
  $total_sec1 = round($per2[$i]['student_mark'] * 0.8,1);
  $total_sec = $total_sec1 + $total_fst;
  $elect_sub[] = $total_sec;
 
  $max =max(array_values($elect_sub));
  //var_dump($max);echo'<br/>';
}
if(in_array($per2[$i]['subject_id'],$compulsary_subject )){
  $total_fst = round($per1[$i]['student_mark'] * 0.2,1);
  $total_sec1 = round($per2[$i]['student_mark'] * 0.8,1);
  $total_sec = $total_sec1 + $total_fst;
$sec += $total_sec;
}
//$sec += $total_sec;

}
  $firstsemestercheck =isset($per1[$i]['student_mark']) ? $per1[$i]['student_mark'] : '';
  if(empty($firstsemestercheck ))
  {
$Rs1 = round($rs[$i]['student_mark']* 0.2,1);
}else
{
    $Rs1 =round($per1[$i]['student_mark'] * 0.2,1);
}

//$Rs1 =round($per1[$i]['student_mark'] * 0.2,1);
$Rs2 = round($rs[$i]['student_mark']* 0.8,1);

 $rrs =$Rs1 + $Rs2;

 }
 
   $Totalaverage2 +=$rrs;
 
  echo"
  <td><b>",$rrs,"</b></td>";
  }
}
}else{
   for ($i=0; $i <$sub_total ; $i++) {
echo"
  <td></td>";
  } 
}
?>
<td><?php if($term =='First Term'){echo $gt ;}elseif($term =='Third Term'){

  if($c > 3){
    if($s < 2017)
    {
    $thd_avarege =$thd+$max;
    echo $thd_avarege;
  }else{ echo isset($Totalaverage3) ? $Totalaverage3:'';}
  }else{
    echo  $Totalaverage3 ;
  }}elseif ($term == 'Second Term') {

  if($c > 3){
    if($s < 2017)
    {
    $sec_averege =$sec+$max;
    echo $sec_averege;
  }else{echo isset($Totalaverage2) ? $Totalaverage2:'';}
    
  }else{ echo isset($Totalaverage2) ? $Totalaverage2:'';
  # code...
}}?></td>

<?php 
  if($term == 'Second Term'){
if($c > 3){
  if($s < 2017)
    {
  $second_Average = round($sec_averege/$nine,1);
}else{$second_Average = round($Totalaverage2/$sub_num,1);}
  // cafe
   // $second_Average = round($Totalaverage2/$nine,1);
}else{
    $second_Average = round($Totalaverage2/$subject_num,1);} 
  }
  //if(isset($Totalaverage3)){
  if($term == 'Third Term'){
if($c > 3){
  if($s < 2017)
  {
  $third_average = round($thd_avarege /$nine , 1);}
  else{$third_average =round($Totalaverage3 / $sub_num,1);}
}
  else{
    $third_average = round($Totalaverage3 /$subject_num , 1);}
  }
 ?>
        	<td><?php if($term =='First Term'){echo $avg ;
          }elseif($term == 'Second Term'){
            if(isset($second_Average)) {echo $second_Average;}
          }elseif($term =='Third Term'){
            if(isset($third_average)) {echo $third_average;} 
          }?></td>
        	<td><?php $position = position_first($c,$sc,$s,$term,$option);

           foreach ($position as $key => $value) {

            $postion_id =$value['student_id'];
            $class_position=$value['position'];
           // var_dump($class_position);
            if($std_id == $postion_id){
              $position_in_class =$class_position;
              if($c < 4){
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
         }}
         }
           ?></td>
        	</tr>
        	<tr>
        		<td><?php if($c < 4){
                     echo"Subject Position";
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
    <div class="row pad" >
    <div class=" col-xs-12 tail">
      
      <div class="col-xs-8">
          <p><b>Principal's Comments  :</b>
            <?php 
          if($term =='First Term'){ $comment_average = $avg;
          }elseif($term == 'Second Term'){
             $comment_average= $second_Average;}
          elseif($term =='Third Term'){
             $comment_average= $third_average;} 
            $comment = teacherCommet($position_in_class,$comment_average,$term); echo $comment; ?> </p>
            <p><b>RESUMPTION DATE : </b>&nbsp;&nbsp;<?php echo $resumption;?></p>
      </div>
      <div class="col-xs-4">
        <p>Principal`s Name <b>&nbsp;:&nbsp; MR OKE D . O</b>
        <br/><img src="images/principal.jpg" class="img-responsive"/>
        <br/>Principal`s Signature</p>
  
      </div>
     

    </div>
  </div>
  </div>

