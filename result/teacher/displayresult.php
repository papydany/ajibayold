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
.tail{
  border: 1px solid #000 !important;
  margin:5px 0px;
  padding: 10px 5px;
}

@media print{
p{font-size: 11px;}
td{
  font-size: 10px;
}
.tail{
  border: 1px solid #000 !important;
  margin:5px 0px;
  padding: 10px 5px;
}
.table-bordered > tbody > tr > td {
    border: 1px solid #000 !important;
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
 if($s == "2015" && $term =="Third Term")
{
    $nine =(int)8;  
}
 else {
     $nine = (int)9;
 }
$c_n = select_class($c);
 $std_id =array();

 $sb_id = array();

 $position =array();


 $sb =getsubject($c,$sc,$s,$term);

 
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
                <p>P.O.Box2455, Ipaja Lagos. Tel:018136815</p>
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
        <div class="row">

 <table class='table table-bordered table-condensed'>
 <tr>
 <td width="1%">S/N</td>
 <td width="5%" >Name</td>
 <td width="5%">Reg No</td>
 <td width="2%">Sex</td>
 <td width="2%">Term</td>
 
<?php

$sub_total =(int)$sb_num;

$width = 85/$sub_total;
$width =$width;



 for ($i=0; $i < $sub_total ; $i++) {

 	# code...
 
 echo"<td class='left' width='$width%' colspan='3'> <p class='sub_rotate'>",isset($sb[$i]['subject_name']) ? str_replace(" ","",$sb[$i]['subject_name']) : '',"</p></td>";
}?>
 
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

      </tr>

<?php
$no =0;
$sn =select_student_profile($c,$sc);


foreach ($sn as $k => $v) {
  $sb1 =  getdtudentsubject($v['student_id'],$c,$sc,$term,$s); 
if($c > 3){
$compulsary_subject = get_all_compulsary_subject($v['class_option_id'],$term,$s);

$c_s_id =$compulsary_subject;
}

$reg = get_reg_id($v['student_id'],$sc,$c,'First Term',$s);
$rs = select_result_display($v['student_id'],$c,$sc,$reg['reg_id'],$sb_id,'First Term',$s);

$reg2 = get_reg_id($v['student_id'],$sc,$c,'Second Term',$s);
 $rss = select_result_display($v['student_id'],$c,$sc,$reg2['reg_id'],$sb_id,'Second Term',$s);

$reg3 = get_reg_id($v['student_id'],$sc,$c,'Third Term',$s);
$rsss = select_result_display($v['student_id'],$c,$sc,$reg3['reg_id'],$sb_id,'Third Term',$s);

$e2 = get_subject_In_first_term($c,$sc,$s);
$e3 = get_subject_In_first_and_second_term($c,$sc,$s);
$e1 = get_subject_In_second_term($c,$sc,$s);

 

 $firsttermcheck = checkstudentterm($v['student_id'],$c,$sc,$s,'First Term'); // return true if student is not present in  first term
 $secondtermcheck = checkstudentterm($v['student_id'],$c,$sc,$s,'Second Term');  // return true if student is not present in second term

for ($i=0; $i <$sub_total ; $i++) { 
  if($c > 3 && $s < 2017){
   // new condion for senior students
     
  $Tm_first = select_sub_total($v['student_id'],$c,$sc,$c_s_id,'First Term',$s); // total marks function for first term for senior students
 }else{
$Tm_first = select_sub_total($v['student_id'],$c,$sc,$sb_id,'First Term',$s); // total marks function for first term
  }
}
if($c > 3){
 if($s < 2017)
{ 
 $av_f =round($Tm_first / $nine,1); // average of subject in first term 
}else
{
  $sub_num = select_sub_number($v['student_id'],$c,$sc,'First Term',$s);
  $av_f =round($Tm_first / $sub_num,1); // average of subject in first term 
}
}else{
 $av_f =round($Tm_first / $sb_num,1); // average of subject in first term 
}




if($term == "First Term"){  //first term result display
if($reg){
  

$no ++;

$fullname = $v['surname'].'  '.$v['firstname'].'  '.$v['othername'];

$sex = strtoupper(substr($v['gender'],0,1));

$reg_no =$v['student_no'];

echo"<tr>
<td  rowspan='3'>".$no."</td>
 <td rowspan='3' >".strtoupper($fullname)."</td>
 <td  rowspan='3'>".$reg_no."</td>
 <td  rowspan='3'>".$sex ."</td>";

echo" <td>1st</td>";

  
for ($i=0; $i < $sub_total; $i++) {
  
  echo"
  <td>",isset($rs[$i]['student_ca2']) ? $rs[$i]['student_ca2'] : '',"</td>
  <td>",isset($rs[$i]['student_exam']) ? $rs[$i]['student_exam'] : '',"</td>
  <td>",isset($rs[$i]['student_mark']) ? $rs[$i]['student_mark'] : '',"</td>";
}
 echo"
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
     echo grade($v['student_id'],$c,$sc,$s,$rs[$i]['subject_id'],$term);
  }

  echo"</td>";
}
echo"</tr>";
echo"<tr class='resultbg'><td></td><td colspan='4'><b>Total mark</b></td><td colspan='3'><b>",isset($Tm_first) ? $Tm_first : '',"</b></td><td colspan='3'></td>
   <td colspan='3'><b>Average</b></td><td colspan='3'><b>",isset($av_f) ? $av_f: '',
    "</b></td><td colspan='3'></td><td colspan='4'><b>Class Position</b></td><td colspan='2'><b>";

$position = position_first($c,$sc,$s,$term,$v['class_option_id']);

           foreach ($position as $key => $value) {

            $postion_id =$value['student_id'];
            $class_position=$value['position'];
            if($v['student_id'] == $postion_id){
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
           }}
         }
         }
echo"</b></td></tr>";
}


}elseif ($term == "Second Term") {
  # code...

if($reg2){
 

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
  <td>",isset($rss[$i]['student_ca2']) ? $rss[$i]['student_ca2'] : '',"</td>
  <td>",isset($rss[$i]['student_exam']) ? $rss[$i]['student_exam'] : '',"</td>
  <td>",isset($rss[$i]['student_mark']) ? $rss[$i]['student_mark'] : '',"</td>";
}

if($firsttermcheck == true){
  echo "<tr><td>2nd(100)</td>";
  for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";
echo"<td>",isset($rss[$i]['student_mark']) ? $rss[$i]['student_mark']: '',"</td>";
}
echo"<tr><td>1st(NP)</td>";
for ($i=0; $i < $sub_total; $i++) {
echo"<td colspan='2'></td>";
echo"<td><b>--</b></td>";
}
echo"<tr><td>Total</td>";
$Totalaverage2 = 0;
$sec = 0;
for ($i=0; $i <$sub_total ; $i++) {
$Rs2 = $rss[$i]['student_mark'];
   $rrs =$Rs2;
  $Totalaverage2 +=$rrs;
if($c > 3){   
   if(!in_array($rss[$i]['subject_id'],$compulsary_subject )){
  $elect_sub[] = $rss[$i]['student_mark'];
 $max =max(array_values($elect_sub));
  }
   if(in_array($rss[$i]['subject_id'],$compulsary_subject )){
  $total_sec = $rss[$i]['student_mark'];
 $sec += $total_sec;
}
}
echo"<td colspan='2'></td>";
  echo"
  <td><b>",!empty($rrs) ? $rrs: '',"</b></td>";
  }
  }else{

echo "<tr><td>2nd(80)</td>";

for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";
 
 if(!in_array($rss[$i]['subject_id'], $e2)){ // subject not in first term
$s_80 =$rss[$i]['student_mark'];
 }else{

$s_80 =round($rss[$i]['student_mark']* 0.8);
}

echo"<td>",!empty($s_80) ? $s_80 : '',"</td>";

}
echo"<tr><td>1st(20)</td>";

for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";
  $f_20 =round($rs[$i]['student_mark']* 0.2);
echo"<td>",!empty($f_20) ?$f_20  : '',"</td>";
}

echo"<tr><td>Total</td>";
$Totalaverage2 = 0;
$sec = 0;
  for ($i=0; $i <$sub_total ; $i++) {

if(!in_array($rss[$i]['subject_id'], $e2)){ // subject not in first term
$Rs2 = $rss[$i]['student_mark'];
$rrs =$Rs2;

if($c > 3){
   if(!in_array($rss[$i]['subject_id'],$compulsary_subject )){
    $total_sec = $rss[$i]['student_mark'];
    $elect_sub[] = $total_sec;
   }
if(in_array($rss[$i]['subject_id'],$compulsary_subject )){
  $total_sec = $rss[$i]['student_mark'];
}}
}else{
$Rs1 =round($rs[$i]['student_mark'] * 0.2,1);
$Rs2 = round($rss[$i]['student_mark']* 0.8,1);
$rrs =$Rs1 + $Rs2;
if($c > 3){
      if(!in_array($rss[$i]['subject_id'],$compulsary_subject )){

        $total_fst = round($rs[$i]['student_mark'] * 0.2,1);
  $total_sec1 = round($rss[$i]['student_mark'] * 0.8,1);
  $total_sec_elect = $total_sec1 + $total_fst;
  $elect_sub[] = $total_sec_elect;
 
  $max =max(array_values($elect_sub));
  //var_dump($max);
}
if(in_array($rss[$i]['subject_id'],$compulsary_subject )){
  $total_fst = round($rs[$i]['student_mark'] * 0.2,1);
  $total_sec1 = round($rss[$i]['student_mark'] * 0.8,1);
  $total_sec = $total_sec1 + $total_fst;
//$sec += $total_sec;

}


}

}
if($c > 3){
 if(in_array($rss[$i]['subject_id'],$compulsary_subject )){ 
  $sec += $total_sec;
}
}

   $Totalaverage2 +=$rrs;
 echo"<td colspan='2'></td>";
  echo"
  <td><b>",!empty($rrs) ? $rrs: '',"</b></td>";
  }
  }

 
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
    
     echo grade($v['student_id'],$c,$sc,$s,$rs[$i]['subject_id'],$term);
  }

  echo"</td>";
}
echo"</tr>";
echo"<tr class='resultbg'><td></td><td colspan='4'><b>Total mark</b></td><td colspan='3'><b>";
if($c > 3){ if(!empty($max)){ echo $sec+$max; }else{ echo $sec ;}}else{ echo $Totalaverage2;}echo"</b></td>
   <td colspan='3'></td><td colspan='3'><b>Average</b></td><td colspan='3'><b>";
   if($c > 3){$second_Average = round(($sec + $max)/$nine,1);}else{ $second_Average =  round($Totalaverage2/$sb_num ,1);}echo $second_Average. 
   "</b></td><td colspan='3'></td><td colspan='3'><b>Class Position</b></td><td colspan='2'><b>";

$position = position_first($c,$sc,$s,$term,$v['class_option_id']);

           foreach ($position as $key => $value) {

            $postion_id =$value['student_id'];
            $class_position=$value['position'];
            if($v['student_id'] == $postion_id){
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
           }}
         }
         }
         echo"</b></td></tr>";
}
}


elseif ($term == "Third Term") {
  

if($reg3){
 

$no ++;

$fullname = $v['surname'].'  '.$v['firstname'].'  '.$v['othername'];

$sex = strtoupper(substr($v['gender'],0,1));

$reg_no =$v['student_no'];

echo"<tr>
<td  rowspan='7'>".$no."</td>
 <td rowspan='7' >".strtoupper($fullname)."</td>
 <td  rowspan='7'>".$reg_no."</td>
 <td  rowspan='7'>".$sex ."</td>";

echo" <td>3rd</td>";

  
for ($i=0; $i < $sub_total; $i++) {
  
  echo"
  <td>",isset($rsss[$i]['student_ca2']) ? $rsss[$i]['student_ca2'] : '',"</td>
  <td>",isset($rsss[$i]['student_exam']) ? $rsss[$i]['student_exam'] : '',"</td>
  <td>",isset($rsss[$i]['student_mark']) ? $rsss[$i]['student_mark'] : '',"</td>";
}
if($firsttermcheck == true && $secondtermcheck ==true){  //student not present for first and second term

echo"<tr><td>3rd(100)</td>";
for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";
  echo"<td>",isset($rsss[$i]['student_mark']) ? $rsss[$i]['student_mark']: '',"</td>";
}

echo"<tr><td>2nd(NP)</td>";
for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";

  echo"<td><b>--</b></td>";
  }
  echo"<tr><td>1st(NP)</td>";
   for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";
echo"<td><b>--</b></td>";
}
echo"<tr><td>Total</td>";
$thd = 0;
 $Totalaverage3 = 0;
for ($i=0; $i <$sub_total ; $i++) {
 $rt3 = round($rsss[$i]['student_mark'],1);
   $rrt = $rt3;
 $Totalaverage3 += $rrt;
if($c > 3){
   if(!in_array($rsss[$i]['subject_id'],$compulsary_subject )){
  $elect_sub[] = $rsss[$i]['student_mark'];
 $max =max(array_values($elect_sub));
 }
   if(in_array($rsss[$i]['subject_id'],$compulsary_subject )){
  $total_thd = $rsss[$i]['student_mark'];
$thd += $total_thd;
  }
}

echo"<td colspan='2'></td>
  <td><b>",!empty($rrt) ? $rrt : '',"</b></td>";
  }

}elseif($firsttermcheck == true && $secondtermcheck ==false){  //student not present for first term

echo"<tr><td>3rd(80)</td>";
for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";

  if(!in_array($rsss[$i]['subject_id'], $e1)){
 $T_80=$rsss[$i]['student_mark'];

echo"<td>",!empty($T_80) ?$T_80 : '',"</td>";


  }else{
  $T_80=round($rsss[$i]['student_mark'] * 0.8,1);


echo"<td>",!empty($T_80) ?$T_80 : '',"</td>";
}
}
echo"<tr><td>2nd(20)</td>";
for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";
   $S_20 =round($rss[$i]['student_mark']* 0.2,1); 
  echo"<td>",!empty($S_20) ? $S_20: '',"</td>";
  }
  echo"<tr><td>1st(NP)</td>";
  for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";
  
echo"<td><b>--</b></td>";
}
echo"<tr><td>Total</td>";
$thd =0;
 $Totalaverage3 = 0;
for ($i=0; $i <$sub_total ; $i++) {
if(!in_array($rsss[$i]['subject_id'], $e1)){
$rt3 = $rsss[$i]['student_mark'];
   $rrt =$rt3;
   if($c > 3){
    if(!in_array($rsss[$i]['subject_id'],$compulsary_subject )){
  $elect_sub[] = $rsss[$i]['student_mark'];
 $max =max(array_values($elect_sub));
}
if(in_array($rsss[$i]['subject_id'],$compulsary_subject )){
  $total_thd = $rsss[$i]['student_mark'];
  //$thd += $total_thd;
}
}

}else{
   $rt2 =round($rss[$i]['student_mark'] * 0.2,1);
   $rt3 = round($rsss[$i]['student_mark']* 0.8,1);
   $rrt =$rt2 + $rt3;
if($c > 3){

    if(!in_array($rsss[$i]['subject_id'],$compulsary_subject )){
  $total_2 = round($rss[$i]['student_mark'] * 0.2,1);
  $total_3 = round($rsss[$i]['student_mark'] * 0.8,1);
  $elect_total_thd= $total_2 + $total_3;
  $elect_sub[] = $elect_total_thd;
 $max =max(array_values($elect_sub));
}
if(in_array($rsss[$i]['subject_id'],$compulsary_subject )){
  $total_2 = round($rss[$i]['student_mark'] * 0.2,1);
  $total_3 = round($rsss[$i]['student_mark'] * 0.8,1);
  $total_thd= $total_2 + $total_3;
  //$thd += $total_thd;
}
}

 }
 if($c > 3){
if(in_array($rsss[$i]['subject_id'],$compulsary_subject )){
  $thd += $total_thd;
}
}
   $Totalaverage3 += $rrt;
echo"<td colspan='2'></td>
  <td><b>",!empty($rrt) ? $rrt : '',"</b></td>";
}

}else{      //student  present for third term

  echo"<tr><td>3rd(60)</td>";
  for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";

if(!in_array($rsss[$i]['subject_id'], $e2) && in_array($rsss[$i]['subject_id'], $e1)){
$T_60=round($rsss[$i]['student_mark'] * 0.8,1);
    echo"<td>",!empty($T_60) ?$T_60 : '',"</td>";
}
elseif(!in_array($rsss[$i]['subject_id'], $e3)){
$T_60=$rsss[$i]['student_mark'];
    echo"<td>",!empty($T_60) ?$T_60 : '',"</td>";
  }else{

    $T_60=round($rsss[$i]['student_mark'] * 0.6,1);
    echo"<td>",!empty($T_60) ?$T_60 : '',"</td>";
  }
}

echo"<tr><td>2nd(20)</td>";
for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";
  $S_20 =round($rss[$i]['student_mark']* 0.2); 
  echo"<td>",!empty($S_20) ? $S_20: '',"</td>";
  }
  echo"<tr><td>1st(20)</td>";
  for ($i=0; $i < $sub_total; $i++) {
  echo"<td colspan='2'></td>";
  $F_20 = round($rs[$i]['student_mark']* 0.2);
echo"<td>",!empty($F_20) ? $F_20 : '',"</td>";
}
echo"<tr><td>Total</td>";
$thd = 0;
 $Totalaverage3 = 0;
for ($i=0; $i <$sub_total ; $i++) {

if(!in_array($rsss[$i]['subject_id'], $e2) && in_array($rsss[$i]['subject_id'], $e1)){

 $rt2 =round($rss[$i]['student_mark'] * 0.2,1);
 $rt3 = round($rsss[$i]['student_mark']* 0.8,1);
$rrt =$rt2 + $rt3;
if($c > 3){
      if(!in_array($rsss[$i]['subject_id'],$compulsary_subject )){
        $total_2 = round($rss[$i]['student_mark'] * 0.2,1);
        $total_3 = round($rsss[$i]['student_mark'] * 0.8,1);
        $elct_total_thd =$total_2 +$total_3;
        $elect_sub[] = $elct_total_thd;
        $max =max(array_values($elect_sub));
  }
if(in_array($rsss[$i]['subject_id'],$compulsary_subject )){
  $total_2 = round($rss[$i]['student_mark'] * 0.2,1);
  $total_3 = round($rsss[$i]['student_mark'] * 0.8,1);
  $total_thd =$total_2 +$total_3;
}
}
}
elseif(!in_array($rsss[$i]['subject_id'], $e3)){
$rt3 = $rsss[$i]['student_mark'];
   $rrt =$rt3;
if($c > 3){
      if(!in_array($rsss[$i]['subject_id'],$compulsary_subject )){
  $total_3 = $rsss[$i]['student_mark'];
  $total_thd =$total_3;
  $elect_sub[] = $total_thd;
 $max =max(array_values($elect_sub));
 }
if(in_array($rsss[$i]['subject_id'],$compulsary_subject )){
 $total_3 =$rsss[$i]['student_mark'];
  $total_thd =$total_3;
}
}

}else{
  $rt1 =round($rs[$i]['student_mark'] * 0.2,1);
   $rt2 =round($rss[$i]['student_mark'] * 0.2,1);
   $rt3 = round($rsss[$i]['student_mark']* 0.6,1);
   $rrt =$rt1 + $rt2 + $rt3;
if($c > 3){
      if(!in_array($rsss[$i]['subject_id'],$compulsary_subject )){
  $total_1 = round($rs[$i]['student_mark'] * 0.2,1);
  $total_2 = round($rss[$i]['student_mark'] * 0.2,1);
  $total_3 = round($rsss[$i]['student_mark'] * 0.6,1);
  $elect_total_thd = $total_1 + $total_2 +$total_3;
  $elect_sub[] = $elect_total_thd;
  $max =max(array_values($elect_sub));
  }
if(in_array($rsss[$i]['subject_id'],$compulsary_subject )){
   $total_1 = round($rs[$i]['student_mark'] * 0.2,1);
  $total_2 = round($rss[$i]['student_mark'] * 0.2,1);
  $total_3 = round($rsss[$i]['student_mark'] * 0.6,1);
  $total_thd = $total_1 + $total_2 +$total_3;
//$thd += $total_thd;
}
}
 }
   $Totalaverage3 += $rrt;
   if($c > 3){
      if(in_array($rsss[$i]['subject_id'],$compulsary_subject )){
       $thd += $total_thd;
      }
    }
echo"<td colspan='2'></td>
  <td><b>",!empty($rrt) ? $rrt: '',"</b></td>";
  }
}

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
    
    echo grade($v['student_id'],$c,$sc,$s,$rs[$i]['subject_id'],$term);
  }

  echo"</td>";
}echo"<tr class='resultbg'><td></td><td colspan='4'><b>Total mark</b></td><td colspan='3'><b>";
if($c > 3){ if(!empty($max)){ echo $thd+$max; }else{ echo $thd ;}}else{ echo $Totalaverage3;}echo"</b></td><td colspan='3'></td>
   <td colspan='3'><b>Average</b></td><td colspan='3'><b>";
     if($c > 3){$third_average = round(($thd + $max)/$nine,1);}else{ $third_average =  round($Totalaverage3/$sb_num ,1);}echo $third_average.
  "</b></td><td colspan='3'></td><td colspan='3'><b>Class Position</b></td><td colspan='2'>";



$position = position_first($c,$sc,$s,$term,$v['class_option_id']);

           foreach ($position as $key => $value) {

            $postion_id =$value['student_id'];
            $class_position=$value['position'];
            if($v['student_id'] == $postion_id){
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
         }
         }
         }

echo"</td></tr>";


}
}


}
}
echo"</table>";
?>
</div>
<div class="row">
<div class="col-sm-12 tail">
<div class="col-sm-4">
  <p>Number Of Registered Students <b>&nbsp;: &nbsp; <?php echo $no; ?></b></p>
  <p>Number Of Registered Subjects <b>&nbsp;: &nbsp; <?php echo $sb_num; ?></b></p>
</div>
<div class="col-sm-4">
  <p>Class Teacher`s Name <b>&nbsp;:&nbsp;</b>-------------------------------------</p>
  <p>Class Teacher`s Sign <b>&nbsp;:&nbsp;</b>-------------------------------------</p>
</div>
<div class="col-sm-3">
  <p>Principal`s Name <b>&nbsp;:&nbsp; MRS ALADESUYI</b></p>
  <p><img src="../images/sign.png" class="img-responsive"/></p>
  <p>Principal`s Sign</p>
</div>
</div>
</div>

</body>
</html>


