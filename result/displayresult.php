<?php
include_once"../function/headerTop.php"; 
 include_once"../function/include.php";  
 include_once"teacherfunction.php";
 top();
 linkh();
 $conn=db();?>
<style type="text/css">


.table > tbody > tr > th{
	padding: 0;
}
.table > tbody > tr > td{
	padding: 0;
}

.table-bordered > tbody > tr > td {
    border: 1px solid #000;
  }
th,td {
    
    font-size: 10px;
}
th,td{
	font-size: 10px;
  text-align: center;
}
p{font-size: 11px;}
.c{
  background-color: #ccc;

}
.lt {
   
}
@media print{
p{font-size: 11px;}
td{
  font-size: 10px;
}

.table-bordered > tbody > tr > td {
    border: 1px solid #000;
  }
}
</style>



 <?php

 set_time_limit(0);

 $s = $_GET['ses'];

 $c =$_GET['class_id'];

 $sc =$_GET['subclass'];
 $term=$_GET['term'];
$splus = $s+1;
 
$c_n = select_class($c);
 $std_id =array();

 $sb_id = array();

 $position =array();


 $sb =getsubject($c,$sc,$s);
 
  $sb_num = count($sb);
 if(empty($sb_num)){
 	$sb_num =1;
 	$sb = array('');

  echo"<div class='col-sm-10 col-sm-offset-1'><p>Sorry no result for student in this session. </p></div>";

 }else{

 foreach ($sb as $ksb => $vsb) {

$sb_id[] = $vsb['subject_id'];
 }
//var_dump($sb_id);

 ?>
<div class="row">
           <div class="col-xs-2" style="text-align:center;">
            <img src="../images/padge.png" class="img-responsive" style="width:100px" />
            </div>
              <div class="col-xs-7 col-sm-6 col-sm-offset-1 r" style="text-align:center;">
                <p class="result1"><span>AJIBAY ACADEMY</span></p>
                <P>Ayetoro Road, Ayobo Ipaja, Lagos </P>
                <P>P.O.Box2455, Ipaja Lagos. Tel:018136815</p>
                  <p>Motto : The Lord is our shepherd</p>
              </div>
              <div class="col-xs-3 col-sm-2 col-sm-offset-1">
                <p><b>Class :</b> <?php echo $c_n['class_name'];?></p>
                <p><b>Term  :</b> <?php echo $term ; ?> </p>
                <p><b>Session :</b> <?php echo $s.'/'.$splus; ?> </p>
                
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
             
        </div>

 <table class='table table-bordered table-condensed'>
 <tr>
 <td width="1%">S/N</td>
 <td width="3%" >Name</td>
 <td width="1%">Reg No</td>
 <td width="1%">Sex</td>
 <td width="1%">Term</td>
 
<?php

$sub_total =(int)$sb_num;
 for ($i=0; $i < $sub_total ; $i++) {

 	# code...
 
 echo"<td class='left' width='3%' colspan='3'> <p class='sub_rotate'>",isset($sb[$i]['subject_name']) ? str_replace(" ","",$sb[$i]['subject_name']) : '',"</p></td>";
}?>
 <td width="1%"><p class='sub_rotate'>TotalMarks</p></td>
 <td width="1%"><p class='sub_rotate'>Average</p></td>
 <td width="1%"><p class='sub_rotate'>Position</p></td>
 </tr>
 <tr>
 <td></td>
 <td></td>
 <td></td>
 <td></td>
 <td></td>
 <?php

 for ($i=0; $i < $sub_total ; $i++) { 


  # code...
echo"
<td>40</td>
<td>60</td>
<td>100</td>
";

}?>
<td></td>
      <td></td>
      <td></td>
      </tr>

<?php
$no =0;
$sn =select_student_profile($c,$sc);
/*$p_f = p_f($c,$sc,$sb_id,'First Term',$s);
foreach ($p_f as $key => $value) {
  $idd =$value['student_id'];
  $pos =$value['position'];
  # code...
}*/

foreach ($sn as $k => $v) {
  $swr4 = student_with_result_inall_term($c,$sc,$s); // student that have result in first or second term or third term
//$p_f = p_f($c,$sc,$sb_id,'First Term',$s);
//var_dump($p_f);

if(in_array($v['student_id'], $swr4)){

$reg = get_reg_id($v['student_id'],$sc,$c,'First Term',$s);
$rs = select_result_display($v['student_id'],$c,$sc,$reg['reg_id'],$sb_id,'First Term',$s);

$reg2 = get_reg_id($v['student_id'],$sc,$c,'Second Term',$s);
 $rss = select_result_display($v['student_id'],$c,$sc,$reg2['reg_id'],$sb_id,'Second Term',$s);

$reg3 = get_reg_id($v['student_id'],$sc,$c,'Third Term',$s);
$rsss = select_result_display($v['student_id'],$c,$sc,$reg3['reg_id'],$sb_id,'Third Term',$s);

$sm = sum_mark($v['student_id'],$c,$sc,$s); // function to calculate the cumulative marks


$swr = student_with_result($c,$sc,'First Term',$s); // student that have result in first term
if(in_array($v['student_id'], $swr)){

$n_sub_f = total_subject_number($v['student_id'],$c,$sc,'First Term',$s); // total number of subject in first term

}

$swr2 = student_with_result($c,$sc,'Second Term',$s); // student that have result in second term
if(in_array($v['student_id'], $swr2)){
$n_sub_s= total_subject_number($v['student_id'],$c,$sc,'Second Term',$s);  // total number of subject in second term
}

$swr3 = student_with_result($c,$sc,'Third Term',$s); // student that have result in third term
if(in_array($v['student_id'], $swr3)){
$n_sub_t = total_subject_number($v['student_id'],$c,$sc,'Third Term',$s);  // total number of subject im third term
}
     $e2 = get_subject_In_first_term($v['student_id'],$c,$sc,$s);
      $e3 = get_subject_In_first_and_second_term($v['student_id'],$c,$sc,$s);
      $e1 = get_subject_In_first_second_and_not_in_third_term($v['student_id'],$c,$sc,$s);

 $sec_avg = getAverage2($v['student_id'],$sc,$c,$s);      // get avarage scores for second term

 $third_avg = getAverage3($v['student_id'],$sc,$c,$s);    // get avarage score for third term

 //var_dump($third_avg);
 //var_dump($sec_avg);

 $firsttermcheck = checkstudentterm($v['student_id'],$c,$sc,$s,'First Term'); // chech if student is present for first term
 $secondtermcheck = checkstudentterm($v['student_id'],$c,$sc,$s,'Second Term');  // chech if student is present for second term

for ($i=0; $i <$sub_total ; $i++) { 
$Tm_first = select_sub_total($v['student_id'],$c,$sc,$sb_id,'First Term',$s); // total marks function for first term
$Tm_second = select_sub_total($v['student_id'],$c,$sc,$sb_id,'Second Term',$s); // total marks function for second term
$Tm_third = select_sub_total($v['student_id'],$c,$sc,$sb_id,'Third Term',$s); // total marks function for third term
  }
 $av_f =round($Tm_first / $n_sub_f,1); // average of subject in first term 
$av_s =round($Tm_second / $n_sub_s,1); // average of subject in second term
$av_t =round($Tm_third / $n_sub_t,1);  // average of subject in third term



if($term == "First Term"){  //first term result display
if($reg){
  $asn =1;
    $av_fst = $av_f;
  $total_average =round($av_fst / $asn,1);

$no ++;

$fullname = $v['surname'].'  '.$v['firstname'].'  '.$v['othername'];

$sex = strtoupper(substr($v['gender'],0,1));

$reg_no =$v['student_no'];

echo"<tr>
<td  rowspan='2'>".$no."</td>
 <td rowspan='2' >".strtoupper($fullname)."</td>
 <td  rowspan='2'>".$reg_no."</td>
 <td  rowspan='2'>".$sex ."</td>";

echo" <td>1st</td>";

  
for ($i=0; $i < $sub_total; $i++) {
  
  echo"
  <td>",isset($rs[$i]['student_ca2']) ? $rs[$i]['student_ca2'] : '',"</td>
  <td>",isset($rs[$i]['student_exam']) ? $rs[$i]['student_exam'] : '',"</td>
  <td>",isset($rs[$i]['student_mark']) ? $rs[$i]['student_mark'] : '',"</td>";
}
 echo"<td rowspan='2'><b>",isset($Tm_first) ? $Tm_first : '',"</b></td><td rowspan='2'>",isset($av_f) ? $av_f: '',"</td><td rowspan='2'>";
 $p_f = p_f($v['student_id'],$c,$sc,$sb_id,'First Term',$s);
foreach ($p_f as $key => $value) {
  $idd =$value['student_id'];
  $pos =$value['position'];
  # code...

 if($v['student_id'] == $idd){echo $pos;} 
}echo"</td>
<tr><td>";

if($c < 4){echo "pos";}else{echo"Grd";}

 echo"</td>";

for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='3'>";


if($c < 4){

 $u =subject_position($c,$sc,$s,$rs[$i]['subject_id'],$term);
 //var_dump($u);

 if(!empty($u)){
  foreach ($u as $key => $value) {
    # code...
    $p =isset($value['position'])? $value['position'] : '';
    $sub=isset($value['subject']) ? $value['subject'] :'';
    $id=isset($value['student_id']) ? $value['student_id']:'';
  
    if($v['student_id'] == $id){
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
     echo grade($std_id,$c,$sc,$s,$rs[$i]['subject_id'],$term);
  }

  echo"</td>";
}
echo"</tr>";

}


}elseif ($term == "Second Term") {
  # code...

if($reg2){
 

$no ++;

$fullname = $v['surname'].'  '.$v['firstname'].'  '.$v['othername'];

$sex = strtoupper(substr($v['gender'],0,1));

$reg_no =$v['student_no'];

echo"<tr>
<td  rowspan='5'>".$no."</td>
 <td rowspan='5' >".strtoupper($fullname)."</td>
 <td  rowspan='5'>".$reg_no."</td>
 <td  rowspan='5'>".$sex ."</td>";

echo" <td>2nd</td>";

  
for ($i=0; $i < $sub_total; $i++) {
  
  echo"
  <td>",isset($rss[$i]['student_ca2']) ? $rss[$i]['student_ca2'] : '',"</td>
  <td>",isset($rss[$i]['student_exam']) ? $rss[$i]['student_exam'] : '',"</td>
  <td>",isset($rss[$i]['student_mark']) ? $rss[$i]['student_mark'] : '',"</td>";
}
 echo"<td rowspan='3'><b></b></td><td rowspan='3'></td><td rowspan='5'>";
 $p_f = p_f($v['student_id'],$c,$sc,$sb_id,'Second Term',$s);
foreach ($p_f as $key => $value) {
  $idd =$value['student_id'];
  $pos =$value['position'];
  # code...

 if($v['student_id'] == $idd){echo $pos;} 
}echo"</td><tr><td>2nd(80)</td>";

for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";
  if($firsttermcheck == true){
    echo"<td>",isset($rss[$i]['student_mark']) ? $rss[$i]['student_mark']: '',"</td>";
  }else{
echo"<td>",isset($rss[$i]['student_mark']) ? round($rss[$i]['student_mark']* 0.8,1) : '',"</td>";
}
}
echo"<tr><td>1st(20)</td>";

for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";
echo"<td>",isset($rs[$i]['student_mark']) ? round($rs[$i]['student_mark']* 0.2,1) : '',"</td>";
}

echo"<tr><td>Total</td>";

//if(isset($rs[$i]['student_mark']) && $rss[$i]['student_mark']){
//$t_s_f =round($rs[$i]['student_mark']* 0.2,1);
//$t_s_s =round($rss[$i]['student_mark']* 0.8,1);
 // $total_per_sub_second = round($t_s_f+ $t_s_s,1);
//}
$Totalaverage2 = 0;
  for ($i=0; $i <$sub_total ; $i++) {
$Rs1 =round($rs[$i]['student_mark'] * 0.2,2);
$Rs2 = round($rss[$i]['student_mark']* 0.8,2);

 $rrs =$Rs1 + $Rs2;

   $Totalaverage2 +=$rrs;
 echo"<td colspan='2'></td>";
  echo"
  <td><b>",$rrs,"</b></td>";
  }
  echo"<td rowspan='2'>",$Totalaverage2,"</td><td rowspan='2'>";
  if(isset($Totalaverage2)){
  $second_Average = round($Totalaverage2/$sec_avg ,1);}echo $second_Average ."</td>";
 
echo"<tr><td>";
if($c < 4){echo "pos";}else{echo"Grd";}

 echo"</td>";

for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='3'>";


if($c < 4){

 $u =subject_position($c,$sc,$s,$rs[$i]['subject_id'],$term);
 //var_dump($u);

 if(!empty($u)){
  foreach ($u as $key => $value) {
    # code...
    $p =isset($value['position'])? $value['position'] : '';
    $sub=isset($value['subject']) ? $value['subject'] :'';
    $id=isset($value['student_id']) ? $value['student_id']:'';
  
    if($v['student_id'] == $id){
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
    
     echo grade($std_id,$c,$sc,$s,$rs[$i]['subject_id'],$term);
  }

  echo"</td>";
}
echo"</tr>";


}
}


elseif ($term == "Third Term") {
  # code...

if($reg3){
 

$no ++;

$fullname = $v['surname'].'  '.$v['firstname'].'  '.$v['othername'];

$sex = strtoupper(substr($v['gender'],0,1));

$reg_no =$v['student_no'];

echo"<tr>
<td  rowspan='6'>".$no."</td>
 <td rowspan='6' >".strtoupper($fullname)."</td>
 <td  rowspan='6'>".$reg_no."</td>
 <td  rowspan='6'>".$sex ."</td>";

echo" <td>2nd</td>";

  
for ($i=0; $i < $sub_total; $i++) {
  
  echo"
  <td>",isset($rsss[$i]['student_ca2']) ? $rsss[$i]['student_ca2'] : '',"</td>
  <td>",isset($rsss[$i]['student_exam']) ? $rsss[$i]['student_exam'] : '',"</td>
  <td>",isset($rsss[$i]['student_mark']) ? $rsss[$i]['student_mark'] : '',"</td>";
}
 echo"<td rowspan='4'><b></b></td><td rowspan='4'></td><td rowspan='6'>";
 $p_f = p_f($v['student_id'],$c,$sc,$sb_id,'Third Term',$s);
foreach ($p_f as $key => $value) {
  $idd =$value['student_id'];
  $pos =$value['position'];
  # code...

 if($v['student_id'] == $idd){echo $pos;} 
}echo"</td><tr><td>3rd(60)</td>";

for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";

  if($firsttermcheck == true && $secondtermcheck ==true){
    echo"<td>",isset($rsss[$i]['student_mark']) ? $rsss[$i]['student_mark']: '',"</td>";
  }else{
echo"<td>",isset($rsss[$i]['student_mark']) ? round($rsss[$i]['student_mark']* 0.6,1) : '',"</td>";
}
}


echo"<tr><td>2nd(20)</td>";

for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";
echo"<td>",isset($rss[$i]['student_mark']) ? round($rss[$i]['student_mark']* 0.2,1) : '',"</td>";
}
echo"<tr><td>1st(20)</td>";

for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";
echo"<td>",isset($rs[$i]['student_mark']) ? round($rs[$i]['student_mark']* 0.2,1) : '',"</td>";
}

echo"<tr><td>Total</td>";

//if(isset($rs[$i]['student_mark']) && $rss[$i]['student_mark']){
//$t_s_f =round($rs[$i]['student_mark']* 0.2,1);
//$t_s_s =round($rss[$i]['student_mark']* 0.8,1);
 // $total_per_sub_second = round($t_s_f+ $t_s_s,1);
//}



 $Totalaverage3 = 0;
for ($i=0; $i <$sub_total ; $i++) {

if(!in_array($rsss[$i]['subject_id'], $e3)) {
 
$rt3 = round($rsss[$i]['student_mark'],1);
   $rrt =$rt3;//+$rt1 + $rt2;
  // if(!empty($rrt)){
//if(!empty($Totalaverage3)){
   $Totalaverage3 += $rrt;
// }
//}
 }
else{
   if(in_array($rsss[$i]['subject_id'], $e1)) {
   $rt1 =round($rs[$i]['student_mark'] * 0.2,2);
   $rt2 =round($rss[$i]['student_mark'] * 0.2,2);
   $rt3 = round($rsss[$i]['student_mark']* 0.6,2);
   $rrt =$rt1 + $rt2 + $rt3;
  // if(!empty($rrt)){
//if(!empty($Totalaverage3)){
   $Totalaverage3 += $rrt;
// }
//}
 }else{
  $rt1 =round($rs[$i]['student_mark'] * 0.2,2);
   $rt2 =round($rss[$i]['student_mark'] * 0.8,2);
   $rrt =$rt1 + $rt2;
  // if(!empty($rrt)){
//if(!empty($Totalaverage3)){
   $Totalaverage3 += $rrt;
// }
//}
 }
 }

  echo"<td colspan='2'></td>
  <td><b>",$rrt,"</b></td>";
}
 echo"<td rowspan='2'>",$Totalaverage3,"</td><td rowspan='2'>";
  
  $third_average = round($Totalaverage3 / $third_avg , 1);
  echo $third_average ."</td>";

echo"<tr><td>";

if($c < 4){echo "pos";}else{echo"Grd";}

 echo"</td>";

for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='3'>";


if($c < 4){

 $u =subject_position($c,$sc,$s,$rs[$i]['subject_id'],$term);
 //var_dump($u);

 if(!empty($u)){
  foreach ($u as $key => $value) {
    # code...
    $p =isset($value['position'])? $value['position'] : '';
    $sub=isset($value['subject']) ? $value['subject'] :'';
    $id=isset($value['student_id']) ? $value['student_id']:'';
  
    if($v['student_id'] == $id){
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
    
    echo grade($std_id,$c,$sc,$s,$rs[$i]['subject_id'],$term);
  }

  echo"</td>";
}
echo"</tr>";


}
}





 


//$annual = fetch_annual_result2($v['student_id'],$c,$sc,$sb_id,$s);
//$sm = sum_mark($v['student_id'],$c,$sc,$s); // function to calculate the cumulative marks
 







 // $bbb =$sb_id[$i];
//$annual = fetch_annual_result2($v['student_id'],$c,$sc,$sb_id[$i],$s); // annual marks function




// total marks function for first term





//$swr4 = student_with_result_inall_term($c,$sc,$s); // student that have result in first or second term or third term

//if(in_array($v['student_id'], $swr4)){
//$asn = all_subject_number($v['student_id'],$c,$sc,$s); // total number of subject im third term
//echo $asn;


/*if($reg && $reg2 && $reg3){ // first second third term
  $asn =3;
  $av_fst = $av_f + $av_s + $av_t;
  $total_average =round($av_fst / $asn,1);
}elseif($reg2 && $reg3){
$asn =2;
  $av_fst = $av_s + $av_t;
  $total_average =round($av_fst / $asn,1);
}elseif($reg && $reg2){
  $asn =2;
    $av_fst = $av_f + $av_s;
  $total_average =round($av_fst / $asn,1);
}
elseif($reg3){
  $asn =1;
    $av_fst = $av_t;
  $total_average =round($av_fst / $asn,1);
}elseif($reg){
  $asn =1;
    $av_fst = $av_f;
  $total_average =round($av_fst / $asn,1);
}elseif($reg2){
  $asn =1;
    $av_fst = $av_s ;
  $total_average =round($av_fst / $asn,1);
}
//}




//$av_fst =round($sm['sm'] / $asn,2);  // average of subject in first term
//var_dump($annual);
/*$no ++;

$fullname = $v['surname'].'  '.$v['firstname'].'  '.$v['othername'];

$sex = strtoupper(substr($v['gender'],0,1));

$reg_no =$v['student_no'];

echo"<tr>
<td  rowspan=''>".$no."</td>
 <td rowspan='' >".strtoupper($fullname)."</td>
 <td  rowspan=''>".$reg_no."</td>
 <td  rowspan=''>".$sex ."</td>";
if($term == "First Term"){
echo" <td>1st term</td>";

  
for ($i=0; $i < $sub_total; $i++) {
  
  echo"
  <td>",isset($rs[$i]['student_ca2']) ? $rs[$i]['student_ca2'] : '',"</td>
  <td>",isset($rs[$i]['student_exam']) ? $rs[$i]['student_exam'] : '',"</td>
  <td>",isset($rs[$i]['student_mark']) ? $rs[$i]['student_mark'] : '',"</td>";
}
 echo"<td><b>",isset($Tm_first) ? $Tm_first : '',"</b></td><td>",isset($av_f) ? $av_f: '',"</td><td>";
 $p_f = p_f($v['student_id'],$c,$sc,$sb_id,'First Term',$s);
foreach ($p_f as $key => $value) {
  $idd =$value['student_id'];
  $pos =$value['position'];
  # code...

 if($v['student_id'] == $idd){echo $pos;} 
}echo"</td>";
}
 //  second term and third term
 /*echo"<tr><td>2nd term</td>";
 


 for ($i=0; $i <$sub_total ; $i++) { 
 	
  
  echo"
   <td>",isset($rss[$i]['student_ca2']) ? $rss[$i]['student_ca2'] : '',"</td>
  <td>",isset($rss[$i]['student_exam']) ? $rss[$i]['student_exam'] : '',"</td>
  <td>",isset($rss[$i]['student_mark']) ? $rss[$i]['student_mark'] : '',"</td>";
}


 echo"<td><b>",isset($Tm_second) ? $Tm_second : '',"</b></td><td>",isset($av_s) ? $av_s: '',"</td><td></td></tr>
 <tr><td>3rd term</td>";

 for ($i=0; $i <$sub_total ; $i++) {

  
  echo"
   <td>",isset($rsss[$i]['student_ca2']) ? $rsss[$i]['student_ca2'] : '',"</td>
  <td>",isset($rsss[$i]['student_exam']) ? $rsss[$i]['student_exam'] : '',"</td>
  <td>",isset($rsss[$i]['student_mark']) ? $rsss[$i]['student_mark'] : '',"</td>";
}


 echo"<td><b>",isset($Tm_third) ? $Tm_third : '',"</b></td><td>",isset($av_t) ? $av_t: '',"</td><td></td></tr>
 <tr>
 <td ><b>Anual Total</b></td>";

  
for ($i=0; $i <$sub_total ; $i++) {

 
$annual = fetch_annual_result2($v['student_id'],$c,$sc,$sb_id[$i],$s);
$T =$annual['sm'];
  echo"
  <td class='c'><b>", isset($T) ? $annual['sm'] : '', "</b></td>";

}



echo"<td  class='c'><b>",isset($sm['sm']) ? $sm['sm']: '',"</b></td><td class='c'><b>",isset($total_average) ? $total_average: '',"</b></td><td></td></tr>";
*/
/*foreach ($sn as $k => $v) {
$scores = select_result($std_id,$c,$sc,$reg,$sub,$term,$s);
	# code...*/
}

}
}
echo"</table></body>
</html>";

?>
