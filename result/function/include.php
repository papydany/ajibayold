<?php
include_once("connect.php");

session_start();



//   ============    footer function    =======
function  footer(){
	
	?>
  <div class="row foot">
    <div class="col-sm-10 col-sm-offset-1 innerfoot">
  <p style="margin:auto;">Copyright &copy;&nbsp;&nbsp; Ajibay Schools <?php  echo date("Y")."&nbsp;&nbsp;"; ?>All Right Reserved</p>

    </div>

    </div>
  <script src="script/jquery1.js" type="text/javascript"></script>
<script src="script/jquery.js" type="text/javascript"></script>
<script src="script/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>

<?php
}

function  footer2(){
  
  ?>
  <div class="">
    <div class="col-sm-12 innerfoot">
  <p style="margin:auto;">Copyright &copy;&nbsp;&nbsp; Ajibay Schools <?php  echo date("Y")."&nbsp;&nbsp;"; ?>All Right Reserved</p>

    </div>

    </div>
  <script src="script/jquery1.js" type="text/javascript"></script>
<script src="script/jquery.js" type="text/javascript"></script>
<script src="script/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>

<?php
}

function navigation(){

?>

<div class="navbar navbar-default navbar-fixed-top " role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ccc">
            <span class="sr-only">Toggole Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
          <div class="navbar-collapse  collapse  col-sm-offset-1 " id="ccc" >
              <ul class="nav navbar-nav col-sm-12 ">
      
            <li><a href="http://ajibayschools.com.ng/" class="bb">Home</a></li>
            <li><a href="index.php">Result Portal</a></li>
              <li><a href="student.php">Student</a></li>
              <?php if(!isset($_SESSION['studentlogin'])){
         echo' <li><a href="teacher/index.php">Teacher</a></li>
            <li><a href="cpanel/index.php">Admin</a></li>';
          }else{
           echo'  <li><a href="#">'. $_SESSION['S_fullname'].'</a></li>
              <li><a href="studentlogout.php">Logout</a></li>';
          }
          ?>
            <li><a href="http://ajibayschools.com.ng/contact.php">Contact</a></li>
            
 
            
            
                </ul>
            </div>

          </div>

          <?php

}

function navigation2(){

?>

<div class="navbar navbar-default navbar-fixed-top " role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ccc">
            <span class="sr-only">Toggole Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
          <div class="navbar-collapse  collapse  col-sm-offset-1 " id="ccc" >
              <ul class="nav navbar-nav col-sm-12 ">
      
            <li><a href="http://ajibayschools.com.ng/" class="bb">Home</a></li>
            <li><a href="../index.php">Result Portal</a></li>
              <li><a href="../student.php">Student</a></li>
              
         
         <?php if(!isset($_SESSION['teacherlog'])){

           echo' <li><a href="../teacher/index.php">Teacher</a></li>
                <li><a href="../cpanel/index.php">Admin</a></li>';
          }else{
          echo'  <li><a href="index.php">Teacher</a></li>
            <li><a href="logout.php">Logout</a></li>';
          }
          ?>
            <li><a href="http://ajibayschools.com.ng/contact.php">Contact</a></li>
            
 
            
            
                </ul>
            </div>

          </div>

          <?php

}

function section1(){

?>
  <div class="row topbanner">
    <div class="col-sm-10 col-sm-offset-1">
      <div class="col-sm-3">
        <img src="images/padge.jpg" alt="school logo"  class="img-responsive" style="width:100px"  />
        </div>
        <div class="col-sm-9 toptext">
                <span> AJIBAY ACADEMY EXAMINATION RESULT PORTAL</span>
            </div>
        </div>
  </div>
  <?php
}

function section2(){

?>
  <div class="row topbanner">
    <div class="col-sm-10 col-sm-offset-1">
      <div class="col-sm-3">
        <img src="../images/padge.jpg" alt="school logo"  class="img-responsive" style="width:100px"   />
        </div>
        <div class="col-sm-9 toptext">
                <span> AJIBAY ACADEMY EXAMINATION RESULT PORTAL</span>
                
            </div>
        </div>
  </div>
  <?php
}
function position_first($c,$sc,$s,$term,$class_option){
$conn =db();


$sb =getsubject($c,$sc,$s,$term);

 $b = count($sb);
 $nine =(int)9;
if($c > 3){
  $comp_sub = get_all_compulsary_subject($class_option,$term,$s);
}

 foreach ($sb as $key => $value) {
  $sb_id[] = $value['subject_id'];
   # code...
 
}
if($term =='First Term'){
$query1 ="SELECT DISTINCT student_id FROM student_result where class_id ='$c' && class_category_id ='$sc' && result_year ='$s' && result_term ='$term'";
$result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
if(mysqli_num_rows($result1) !=0){
while ($r1 =mysqli_fetch_assoc($result1)) {
  $a1[] =$r1['student_id'];
}
}else{ return false;}

foreach ($a1 as $k1 => $v1) {
  
  $reg = get_reg_id($v1,$sc,$c,'First Term',$s);
$rs = select_result_display($v1,$c,$sc,$reg['reg_id'],$sb_id,'First Term',$s);
if($reg){
//for ($i=0; $i <$b ; $i++) { 
  if($c > 3){
$a = select_sub_total($v1,$c,$sc,$comp_sub,'First Term',$s); // total marks function for first term
  }else{
$a = select_sub_total($v1,$c,$sc,$sb_id,'First Term',$s); // total marks function for first term
}
$af = $v1;
  //}
}
if($c > 3){
  $abb[] =array('average'=>round($a / $nine ,1));

  $ab[] =array('average'=>round($a / $nine ,1),"student_id"=>$af);

}
  else{
    $abb[] =array('average'=>round($a,1));
$ab[] =array('average'=>round($a,1),"student_id"=>$af);
}
}

}





//   start
if($term =='Second Term'){

 
$query1 ="SELECT DISTINCT student_id FROM student_result where class_id ='$c' && class_category_id ='$sc' && result_year ='$s' && result_term ='$term'";
$result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
if(mysqli_num_rows($result1) !=0){
while ($r1 =mysqli_fetch_assoc($result1)) {
  $a1[] =$r1['student_id'];
}
}else{ return false;}


foreach ($a1 as $k1 => $v1) {

$reg = get_reg_id($v1,$sc,$c,'First Term',$s);
$rs = select_result_display($v1,$c,$sc,$reg['reg_id'],$sb_id,'First Term',$s);

$reg2 = get_reg_id($v1,$sc,$c,'Second Term',$s);
 $rss = select_result_display($v1,$c,$sc,$reg2['reg_id'],$sb_id,'Second Term',$s);
$e2 = get_subject_In_first_term($c,$sc,$s);
 if($reg2){

   $firsttermcheck = checkstudentterm($v1,$c,$sc,$s,'First Term'); // return true if student is not present in  first term
   if($firsttermcheck == true){

$a=0;
$sec = 0;
for ($i=0; $i <$b ; $i++) {
$Rs2 = $rss[$i]['student_mark'];
   $rrs =$Rs2;
  $a +=$rrs;
  $as =$v1;
 if($c > 3){
   if(!in_array($rss[$i]['subject_id'],$comp_sub)){
  $elect_sub[] = $rss[$i]['student_mark'];
 $max =max(array_values($elect_sub));
  //var_dump($max);
}
   if(in_array($rss[$i]['subject_id'],$comp_sub)){
  $total_sec = $rss[$i]['student_mark'];
 
  $sec += $total_sec;
  //var_dump($sec);
}
}


 
}
 
 if($c > 3){

  $abb[] =array('average'=>round(($sec + $max)/ $nine ,1));

  $ab[] =array('average'=>round(($sec + $max) / $nine ,1),"student_id"=>$as);
  
}
  else{
    $abb[] =array('average'=>round($a / $b ,1));
$ab[] =array('average'=>round($a / $b ,1),"student_id"=>$as);
} 
//$ab[] =array('average'=>round($a / $b ,1),"student_id"=>$as);


   }else{
$a = 0;
$sec =0;
for ($i=0; $i <$b ; $i++) {
    if(!in_array($rss[$i]['subject_id'], $e2)){ // subject not in first term
$Rs2 = $rss[$i]['student_mark'];

 $rrs =$Rs2;
 if($c > 3){
if(in_array($rss[$i]['subject_id'],$comp_sub )){
  $total_sec = $rss[$i]['student_mark'];

}
}
    }else{

      if($c > 3){
      if(!in_array($rss[$i]['subject_id'],$comp_sub )){

        $total_fst = round($rs[$i]['student_mark'] * 0.2,1);
  $total_sec1 = round($rss[$i]['student_mark'] * 0.8,1);
  $total_sec = $total_sec1 + $total_fst;
  $elect_sub[] = $total_sec;
 
  $max =max(array_values($elect_sub));
  //var_dump($max);
}
if(in_array($rss[$i]['subject_id'],$comp_sub)){
  $total_fst = round($rs[$i]['student_mark'] * 0.2,1);
  $total_sec1 = round($rss[$i]['student_mark'] * 0.8,1);
  $total_sec = $total_sec1 + $total_fst;
//$sec += $total_sec;


}


}

$Rs1 =round($rs[$i]['student_mark'] * 0.2,1);
$Rs2 = round($rss[$i]['student_mark']* 0.8,1);

 $rrs =$Rs1 + $Rs2;
}
if($c > 3){
if(in_array($rss[$i]['subject_id'], $comp_sub)){
  $sec += $total_sec;
}
}
   $a +=$rrs;
   $as =$v1;


}
if($c > 3){
  $abb[] =array('average'=>round(($sec + $max) / $nine ,1));
  $ab[] =array('average'=>round(($sec + $max) / $nine ,1),"student_id"=>$as);
}
  else{
    $abb[] =array('average'=>round($a / $nine ,1));
$ab[] =array('average'=>round($a / $b ,1),"student_id"=>$as);
}
//$ab[] =array('average'=>round($a / $b ,1),"student_id"=>$as);

   }
 }

}
}
//    end secod

if($term =='Third Term'){
$query1 ="SELECT DISTINCT student_id FROM student_result where class_id ='$c' && class_category_id ='$sc' && result_year ='$s' && result_term ='$term'";
$result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
if(mysqli_num_rows($result1) != 0){
while ($r1 =mysqli_fetch_assoc($result1)) {
  $a1[] =$r1['student_id'];
}
}else{return false;}
foreach ($a1 as $k1 => $v1) {



  $reg = get_reg_id($v1,$sc,$c,'First Term',$s);
$rs = select_result_display($v1,$c,$sc,$reg['reg_id'],$sb_id,'First Term',$s);

$reg2 = get_reg_id($v1,$sc,$c,'Second Term',$s);
 $rss = select_result_display($v1,$c,$sc,$reg2['reg_id'],$sb_id,'Second Term',$s);

$reg3 = get_reg_id($v1,$sc,$c,'Third Term',$s);
$rsss = select_result_display($v1,$c,$sc,$reg3['reg_id'],$sb_id,'Third Term',$s);

$e2 = get_subject_In_first_term($c,$sc,$s);
$e3 = get_subject_In_first_and_second_term($c,$sc,$s);
$e1 = get_subject_In_second_term($c,$sc,$s);



 $firsttermcheck = checkstudentterm($v1,$c,$sc,$s,'First Term'); // chech if student is present for first term
 $secondtermcheck = checkstudentterm($v1,$c,$sc,$s,'Second Term');  // chech if student is present for second term

if($reg3){
  if($firsttermcheck == true && $secondtermcheck == true){
$a = 0;
$thd = 0;
for ($i=0; $i <$b ; $i++) {
 $rt3 = round($rsss[$i]['student_mark'],1);
   $rrt = $rt3;
 
   $a += $rrt;
   $at=$v1;
if($c > 3){
   if(!in_array($rsss[$i]['subject_id'],$comp_sub)){
  $elect_sub[] = $rsss[$i]['student_mark'];
 
  $max =max(array_values($elect_sub));
  //var_dump($max);
}
   if(in_array($rsss[$i]['subject_id'],$comp_sub)){
  $total_thd = $rsss[$i]['student_mark'];
 
  $thd += $total_thd;
}
}





 }
 if($c > 3){
  $abb[] =array('average'=>round(($thd + $max) / $nine ,1));
  $ab[] =array('average'=>round(($thd + $max)  / $nine ,1),"student_id"=>$at);
}
  else{
    $abb[] =array('average'=>round($a / $nine ,1));
$ab[] =array('average'=>round($a / $b ,1),"student_id"=>$at);
}
//$ab[] =array('average'=>round($a / $b ,1),"student_id"=>$at);
  }elseif($firsttermcheck == true && $secondtermcheck ==false){  //student not present for first term
$a = 0;
for ($i=0; $i <$b ; $i++) {
if(!in_array($rsss[$i]['subject_id'], $e1)){
$rt3 = $rsss[$i]['student_mark'];
   $rrt =$rt3;

   if($c > 3){
   if(!in_array($rsss[$i]['subject_id'],$comp_sub)){
  $elect_sub[] = $rsss[$i]['student_mark'];
 
  $max =max(array_values($elect_sub));
  //var_dump($max);
}
   if(in_array($rsss[$i]['subject_id'],$comp_sub)){
  $total_thd = $rsss[$i]['student_mark'];
 
  //$thd += $total_thd;
}
}

}else{
   $rt2 =round($rss[$i]['student_mark'] * 0.2,1);
   $rt3 = round($rsss[$i]['student_mark']* 0.8,1);
   $rrt =$rt2 + $rt3;
if($c > 3){

    if(!in_array($rsss[$i]['subject_id'],$comp_sub )){
  $total_2 = round($rss[$i]['student_mark'] * 0.2,1);
  $total_3 = round($rsss[$i]['student_mark'] * 0.8,1);
  $elect_total_thd= $total_2 + $total_3;
  $elect_sub[] = $elect_total_thd;
 
  $max =max(array_values($elect_sub));
}
if(in_array($rsss[$i]['subject_id'],$comp_sub)){
  $total_2 = round($rss[$i]['student_mark'] * 0.2,1);
  $total_3 = round($rsss[$i]['student_mark'] * 0.8,1);
  $total_thd= $total_2 + $total_3;
  //$thd += $total_thd;
}
}

 }
 if($c > 3){
if(in_array($rsss[$i]['subject_id'],$comp_sub )){
 $thd += $total_thd;
}
}
   $a += $rrt;
   $at = $v1;
 }
 if($c > 3){
  $abb[] =array('average'=>round(($thd + $max) / $nine ,1));
  $ab[] =array('average'=>round(($thd +$max) / $nine ,1),"student_id"=>$at);
}
  else{
    $abb[] =array('average'=>round($a / $nine ,1));
$ab[] =array('average'=>round($a / $b ,1),"student_id"=>$at);
}
//$ab[] =array('average'=>round($a / $b ,1),"student_id"=>$at);
}else{
$a = 0;
for ($i=0; $i <$b ; $i++) {
  if(!in_array($rsss[$i]['subject_id'], $e2) && in_array($rsss[$i]['subject_id'], $e1)){

 $rt2 =round($rss[$i]['student_mark'] * 0.2,1);
 $rt3 = round($rsss[$i]['student_mark']* 0.8,1);
$rrt =$rt2 + $rt3;

if($c > 3){
      if(!in_array($rsss[$i]['subject_id'],$comp_sub)){

       $total_2 = round($rss[$i]['student_mark'] * 0.2,1);
        $total_3 = round($rsss[$i]['student_mark'] * 0.8,1);
  $elct_total_thd =$total_2 +$total_3;
  $elect_sub[] = $elct_total_thd;
 
  $max =max(array_values($elect_sub));
  //var_dump($max);
}
if(in_array($rsss[$i]['subject_id'],$comp_sub)){
 
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
      if(!in_array($rsss[$i]['subject_id'],$comp_sub )){

  $total_3 = $rsss[$i]['student_mark'];
  $total_thd =$total_3;
  $elect_sub[] = $total_thd;
 
  $max =max(array_values($elect_sub));
  //var_dump($max);
}
if(in_array($rsss[$i]['subject_id'],$comp_sub )){
 
 
  $total_3 =$rsss[$i]['student_mark'];
  $total_thd =$total_3;
//$thd += $total_thd;

}


}

}else{
  $rt1 =round($rs[$i]['student_mark'] * 0.2,1);
   $rt2 =round($rss[$i]['student_mark'] * 0.2,1);
   $rt3 = round($rsss[$i]['student_mark']* 0.6,1);
   $rrt =$rt1 + $rt2 + $rt3;

if($c > 3){
      if(!in_array($rsss[$i]['subject_id'],$comp_sub )){

  $total_3 = $rsss[$i]['student_mark'];
  $total_thd =$total_3;
  $elect_sub[] = $total_thd;
 
  $max =max(array_values($elect_sub));
  //var_dump($max);
}
if(in_array($rsss[$i]['subject_id'],$comp_sub )){
 
 
  $total_3 =$rsss[$i]['student_mark'];
  $total_thd =$total_3;
//$thd += $total_thd;

}


}

 }
 if($c > 3){
      if(in_array($rsss[$i]['subject_id'],$comp_sub )){
        //var_dump($total_thd);
$thd += $total_thd;
      }
    }
   $a += $rrt;
   $at = $v1;
 }
 if($c > 3){
  $abb[] =array('average'=>round(($thd + $max) / $nine ,1));
  $ab[] =array('average'=>round(($thd + $max) / $nine ,1),"student_id"=>$at);
}
  else{
    $abb[] =array('average'=>round($a / $nine ,1));
$ab[] =array('average'=>round($a / $b ,1),"student_id"=>$at);
}
//$ab[] =array('average'=>round($a / $b ,1),"student_id"=>$at);
}
}
 }
} // third term end
//var_dump($ab);
  $gg = max(array_values($abb));

 
  $i=0;
  arsort($ab);
$z = array();

foreach ($ab as $key => $value) {
  
$i ++;

  if($gg >= $value['average'] ){
 
    $z[]=array('student_id'=>$value['student_id'],'position'=>$i,'average'=>$value['average']);
}

}

//var_dump($ab);
//var_dump($z);
return $z;
}

function subject_position($c,$sc,$s,$sub_id,$term){
$conn =db();
$a=array();
$mk=array();

$e2 = get_subject_In_first_term($c,$sc,$s);
$e3 = get_subject_In_first_and_second_term($c,$sc,$s);
$e1 = get_subject_In_second_term($c,$sc,$s);
 
if($term =='First Term'){
  
$query1 ="SELECT DISTINCT student_id FROM student_result where class_id ='$c' && class_category_id ='$sc' && result_year ='$s' && result_term ='$term'";
$result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
if(mysqli_num_rows($result1) !=0){

while ($r1 =mysqli_fetch_assoc($result1)) {
  $a1[] =$r1['student_id'];
}
}else{ return false;}
foreach ($a1 as $k1 => $v1) {
  
$query ="SELECT student_mark, student_id,subject_id FROM student_result where student_id ='$v1' && subject_id ='$sub_id' && class_id ='$c' && class_category_id ='$sc' && result_year ='$s' && result_term ='$term'";
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
if(mysqli_num_rows($result) !=0){
while($r =mysqli_fetch_assoc($result)){
 $sm=$r['student_mark'];
}

}else{
  $sm ='';
}
$a[]=array('student_mark'=>$sm,'student_id'=>$v1);
 }
}

 
if($term =='Second Term'){
 $query1 ="SELECT DISTINCT student_id FROM student_result where class_id ='$c' && class_category_id ='$sc' && result_year ='$s' && result_term ='$term'";
$result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
if(mysqli_num_rows($result1) !=0){
while ($r1 =mysqli_fetch_assoc($result1)) {
  $a1[] =$r1['student_id'];
}
}else{ return false;}
foreach ($a1 as $k1 => $v1) {
  
 $query ="SELECT * FROM student_result where student_id ='$v1' && subject_id='$sub_id' && class_id ='$c' && class_category_id ='$sc' && result_year ='$s' && result_term ='First Term'";
$result_f = mysqli_query($conn,$query) or die(mysqli_error($conn));
if(mysqli_num_rows($result_f) !=0){
while($r_f =mysqli_fetch_assoc($result_f)){
  $sm_f=$r_f['student_mark'];

} }else{$sm_f ='';}

$query ="SELECT student_mark, student_id FROM student_result where student_id ='$v1' && subject_id='$sub_id' && class_id ='$c' && class_category_id ='$sc' && result_year ='$s' && result_term ='$term'";
//echo $query;
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
if(mysqli_num_rows($result) !=0){
while($r =mysqli_fetch_assoc($result)){
  
  $sm_s = $r['student_mark'];
}
}else{$sm_s ='';}
 $firsttermcheck = checkstudentterm($v1,$c,$sc,$s,'First Term'); // return true if student is not present in  first term
 $secondtermcheck = checkstudentterm($v1,$c,$sc,$s,'Second Term');  // return true if student is not present in second term
if($firsttermcheck == true){
$sm =$sm_s;
  $a[]=array('student_mark'=>$sm,'student_id'=>$v1);
 // var_dump($a);
}
  else{
if(!empty($sm_s))
{
    if(!in_array($sub_id, $e2)){ // subject not in first term
   $sm =$sm_s;
  
  }else{
if(!empty($sm_f))
{
$sm1 =round($sm_f * 0.2,1);
//if(!empty($sm_s)){
$sm2 =round($sm_s * 0.8,1);
}else
{
  $sm1 =0;//round($sm_s * 0.2,1);
//if(!empty($sm_s)){
$sm2 =$sm_s;//round($sm_s * 0.8,1);
}
$sm = $sm1 + $sm2;

/*}else{
  $sm = $sm1;
}*/
}
}else
{
  $sm ='';
}
$a[]=array('student_mark'=>$sm,'student_id'=>$v1);
  
  }
  

 
  }
 
}

if($term =='Third Term'){
$query1 ="SELECT DISTINCT student_id FROM student_result where class_id ='$c' && class_category_id ='$sc' && result_year ='$s' && result_term ='$term'";
$result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
if(mysqli_num_rows($result1) != 0){
while ($r1 =mysqli_fetch_assoc($result1)) {
  $a1[] =$r1['student_id'];
}

}else{return false;}

foreach ($a1 as $k1 => $v1) {
 $query ="SELECT student_mark, student_id FROM student_result where student_id ='$v1' && subject_id='$sub_id' && class_id ='$c' && class_category_id ='$sc' && result_year ='$s' && result_term ='First Term'";
$result_f = mysqli_query($conn,$query) or die(mysqli_error($conn));
if(mysqli_num_rows($result_f) !=0){
while($r_f =mysqli_fetch_assoc($result_f)){
  $sm_f=$r_f['student_mark'];

 
  } }else{$sm_f =' ';}
  $query ="SELECT student_mark, student_id FROM student_result where student_id ='$v1' && subject_id='$sub_id' && class_id ='$c' && class_category_id ='$sc' && result_year ='$s' && result_term ='Second Term'";
$result_s = mysqli_query($conn,$query) or die(mysqli_error($conn));
if(mysqli_num_rows($result_s)!=0){
while($r_s =mysqli_fetch_assoc($result_s)){
  $sm_s=$r_s['student_mark'];

  } 
}else{$sm_s ='';}

$query ="SELECT student_mark, student_id FROM student_result where student_id =$v1 && subject_id='$sub_id' && class_id ='$c' && class_category_id ='$sc' && result_year ='$s' && result_term ='$term'";

$result_t = mysqli_query($conn,$query) or die(mysqli_error($conn));
if(mysqli_num_rows($result_t) !=0){
while($r_t =mysqli_fetch_assoc($result_t)){
  $sm_t =$r_t['student_mark'];
}
}else{
  $sm_t ="";
}

 $firsttermcheck = checkstudentterm($v1,$c,$sc,$s,'First Term'); // return true if student is not present in  first term
 $secondtermcheck = checkstudentterm($v1,$c,$sc,$s,'Second Term');  // return true if student is not present in second term
if($firsttermcheck == true && $secondtermcheck ==true){
 $sm =$sm_t;
 
$a[]=array('student_mark'=>$sm,'student_id'=>$v1);

}
  elseif($firsttermcheck == true && $secondtermcheck ==false){
    if(!in_array($sub_id, $e1)){
      $sm =$sm_t;
    }else{

    $sm2 = round($sm_s * 0.2,1);
    $sm3 = round($sm_t * 0.8,1);

    $sm = $sm2 +$sm3;
  }
    $a[]=array('student_mark'=>$sm,'student_id'=>$v1);
  }
    else{
      if(!in_array($sub_id, $e2) && in_array($sub_id, $e1)){
       $sm2 = round($sm_s * 0.2,1);
       $sm3 = round($sm_t * 0.8,1);
       $sm = $sm2 +$sm3;
      }elseif(!in_array($sub_id, $e3)){
        $sm =$sm_t;
      }else{
      $sm1 = round($sm_f * 0.2,1);
      $sm2 = round($sm_s * 0.2,1);
      $sm3 = round($sm_t * 0.6,1);
     $sm = $sm3 + $sm2 +$sm1;
   }
    
$a[]=array('student_mark'=>$sm,'student_id'=>$v1);

} }}

  
if(!empty($a)){
$c = max(array_values($a));
 rsort($a);
//var_dump($a);
$i=0;
foreach ($a as $key => $value) {
$i ++;
if($c >= $value['student_mark'] ){
 $z[]=array('position'=>$i,'subject'=>$value['student_mark'],'student_id'=>$value['student_id']);
}

}


//var_dump($z);
return $z;
}
}



function select_class($c){
  $conn =db();
  $query ="Select * from class where class_id ='$c'";
  $result =mysqli_query($conn,$query) or die(mysqli_error($conn));
  $r =mysqli_fetch_assoc($result);
  return $r;
}

function select_subclass($sc){
  $conn =db();
  $query ="Select * from category_of_class where class_category_id ='$sc'";
  $result =mysqli_query($conn,$query) or die(mysqli_error($conn));
  $r =mysqli_fetch_assoc($result);
  return $r;
}

function select_class_type($ct){
  $conn =db();
  $query ="Select * from class_option where class_option_id ='$ct'";
  $result =mysqli_query($conn,$query) or die(mysqli_error($conn));
  $r =mysqli_fetch_assoc($result);
  return $r;
}

function studentcheck(){
if(!isset($_SESSION['studentlogin']) ){
      header('location:studentlogin.php');
      exit();
}
}



function select_session($id,$sc,$c){
$conn = db();
$query ="SELECT DISTINCT result_year from student_result where student_id = '$id' && class_category_id ='$sc' && class_id ='$c'";
$result =mysqli_query($conn,$query) or die(mysqli_error($conn));
if(!$result){
  echo "query to select session failed";
}

$r=mysqli_fetch_assoc($result);
return $r;
}

function GrandTotal($id,$sc,$c,$reg_id,$s,$term){

  $conn =db();
 
  $query ="SELECT sum(student_mark) as gt from  student_result where student_id = '$id' && class_category_id ='$sc' && class_id ='$c' && reg_id='$reg_id' && result_year = '$s' && result_term ='$term'";
//echo $query;
$result= mysqli_query($conn,$query) or die(mysqli_error($conn));
$r=mysqli_fetch_assoc($result);
$gt =$r['gt'];

return $gt;

}

function getAverage($id,$sc,$c,$reg_id,$s,$term){
  $conn =db();
  $query ="SELECT count(subject_id) as sb from  student_result where student_id = '$id' && class_category_id ='$sc' && class_id ='$c' && reg_id='$reg_id' && result_year = '$s' && result_term ='$term'";
//echo $query;
$result= mysqli_query($conn,$query) or die(mysqli_error($conn));
$r=mysqli_fetch_assoc($result);
$avg =$r['sb'];


$gt = GrandTotal($id,$sc,$c,$reg_id,$s,$term);
$tavg =round( $gt / $avg,2);
return $tavg;
}




function getAverage3($id,$sc,$c,$s,$term){
  $conn =db();
  $avg =array();
 // $query ="SELECT  DISTINCT subject_id  from  student_result where student_id = '$id' && class_category_id ='$sc' && class_id ='$c'  && result_year = '$s' && result_term IN('First Term','Second Term','Third Term')";
//echo $query;
   $query ="SELECT  DISTINCT subject_id  from  student_result where student_id = '$id' && class_category_id ='$sc' && class_id ='$c'  && result_year = '$s' && result_term='$term'";

$result= mysqli_query($conn,$query) or die(mysqli_error($conn));
while  
  # code...
($r=mysqli_fetch_assoc($result)){

$avg[] =$r['subject_id'];
}
//var_dump($avg);
$num =count($avg);

return $num;
/*$gt = GrandTotal($id,$sc,$c,$reg_id,$s,$term);
$tavg =round( $gt / $avg,2);
return $tavg;*/
}

function getdtudentsubject($id,$class_id,$subclass,$term,$year){
$conn = db();
$sb = array();
  $query = "SELECT DISTINCT student_result.subject_id,subject.subject_name FROM student_result INNER JOIN subject ON student_result.subject_id=subject.subject_id WHERE student_result.student_id ='$id' && student_result.class_id ='$class_id' && student_result.class_category_id='$subclass' && student_result.result_term ='$term' && student_result.result_year='$year' order by subject.subject_id";

  $r=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$r){
    echo "query to fetch subject failed";
    exit();
  }

  if(mysqli_num_rows($r) != 0){

   while($f= mysqli_fetch_assoc($r)){
    $sb [] = $f;
   }
  }
  return $sb;


}


function get_subject_In_first_and_second_term($class_id,$subclass,$year){
$conn = db();
$sb = array();
  $query = "SELECT DISTINCT student_result.subject_id FROM student_result INNER JOIN subject ON student_result.subject_id=subject.subject_id WHERE student_result.class_id ='$class_id' && student_result.class_category_id='$subclass' && student_result.result_year='$year' && student_result.result_term IN ('First Term','Second Term') order by subject.subject_id";

  $r=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$r){
    echo "query to fetch subject failed";
    exit();
  }

  if(mysqli_num_rows($r) != 0){

   while($f= mysqli_fetch_assoc($r)){
    $sb [] = $f['subject_id'];
   }
  }
  return $sb;
  }

function get_subject_In_first_term($class_id,$subclass,$year){
$conn = db();
$sb = array();
  $query = "SELECT DISTINCT student_result.subject_id FROM student_result INNER JOIN subject ON student_result.subject_id=subject.subject_id WHERE student_result.class_id ='$class_id' && student_result.class_category_id='$subclass' && student_result.result_year='$year' && student_result.result_term  IN('First Term') order by subject.subject_id";

  $r=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$r){
    echo "query to fetch subject failed";
    exit();
  }

  if(mysqli_num_rows($r) != 0){

   while($f= mysqli_fetch_assoc($r)){
    $sb [] = $f['subject_id'];
   }
  }
  //var_dump($sb);
  return $sb;

  }

function get_subject_In_second_term($class_id,$subclass,$year){
$conn = db();
$sb = array();
  $query = "SELECT DISTINCT student_result.subject_id FROM student_result INNER JOIN subject ON student_result.subject_id=subject.subject_id WHERE   student_result.class_id ='$class_id' && student_result.class_category_id='$subclass' && student_result.result_year='$year' && student_result.result_term  IN('Second Term') order by subject.subject_id";

  $r=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$r){
    echo "query to fetch subject failed";
    exit();
  }

  if(mysqli_num_rows($r) != 0){

   while($f= mysqli_fetch_assoc($r)){
    $sb [] = $f['subject_id'];
   }
  }
  return $sb;
  }


  function get_subject_student_took_per_term($class_id,$subclass,$year,$term,$student_id){
$conn = db();
$sb = array();
  $query = "SELECT DISTINCT student_result.subject_id FROM student_result INNER JOIN subject ON student_result.subject_id=subject.subject_id WHERE   student_result.class_id ='$class_id' && student_result.class_category_id='$subclass' && student_result.result_year='$year' && student_result.result_term='$term' && student_result.student_id='$student_id' order by subject.subject_id";

  $r=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$r){
    echo "query to fetch subject failed";
    exit();
  }

  if(mysqli_num_rows($r) != 0){

   while($f= mysqli_fetch_assoc($r)){
    $sb [] = $f['subject_id'];
   }
  }
  return $sb;
  }
function checkstudentterm($id,$c,$sc,$s,$term){
  $conn = db();
  $query ="SELECT student_profile.student_id FROM student_profile INNER JOIN student_reg ON student_profile.student_id = student_reg.student_id WHERE student_reg.student_id ='$id' && student_reg.class_category_id = '$sc' && student_reg.class_id ='$c' && student_reg.subject_term = '$term' && student_reg.session ='$s'";
  
  $r = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(mysqli_num_rows($r) == 0){
return true;
    }
   

}


function select_resumption($year,$term){
  $conn =db();
  $query ="SELECT * FROM resumtion_date WHERE year ='$year' && term = '$term'";
  //echo $query;
  $r=mysqli_query($conn,$query) or die(mysqli_error($conn));
    $rr =mysqli_fetch_assoc($r);
    $rrr =$rr['date'];
    return $rrr;
  
    

    
}
function teacherCommet($position,$average,$term){
  if($position < 4 ){
    $comment ="Outstanding Result.Keep it up.";
    if($term =="Third Term"){
      $comment .="Promoted";
    }
  }
  if($average  >= 70){
    $comment ="excellent Result.Keep it up.";
     if($term =="Third Term"){
      $comment .="Promoted";
    }
  }
 if($position < 10 && $position >= 4 ){
    $comment ="Very Good Result.Keep it up.";
     if($term =="Third Term"){
      $comment .="Promoted";
    }
  }

 if($average < 70 && $average>= 60){
    $comment ="Very Good Result.Keep it up.";
     if($term =="Third Term"){
      $comment .="Promoted";
    }
  }

   if($position > 10 && $average >= 60 ){
    $comment ="Good Result.You can do better next Term.";
     if($term =="Third Term"){
      $comment .="Promoted";
    }
  }

  if($average < 60 && $average>= 50){
    $comment ="Good Result.You need to improve on your performance.";
     if($term =="Third Term"){
      $comment .="Promoted";
    }
  }
if($average < 50 && $average>= 40){
    $comment ="avreage Result.You need to improve on your performance.";
     if($term =="Third Term"){
      $comment .="Promoted";
    }
  }
if($average < 40){
    $comment ="Fair Result.";
     if($term =="Third Term"){
      $comment .="Promoted 0n trial";
    }
  }
  return $comment;
}

function grade($std_id,$c,$sc,$s,$sub_id,$term){


 $u = subject_position($c,$sc,$s,$sub_id,$term);

if(!empty($u)){
 foreach ($u as $key => $value) {
    # code...
//$sub=0;
    $sub=!empty($value['subject']) ? $value['subject'] :'';
    $id=isset($value['student_id']) ? $value['student_id']:'';
  
    if($std_id == $id){


  if ($sub >72.4){
    $a="A";
    }
    elseif($sub ==''){
      $a="";
    }
  elseif($sub < 39.5){
    $a="F9";
    }elseif ($sub <= 44.4 && $sub >= 39.5){
    $a="E8";
    }
     elseif ($sub <= 49.4 && $sub >=44.5){
    $a="D7";
    }

     elseif ($sub <= 54.4 && $sub >=49.5){
    $a="C6";
    }

    elseif ($sub <= 59.4 && $sub >=54.5){
    $a="C5";
    }
    elseif ($sub <= 64.4 && $sub >=59.5){
    $a="C4";
    }
    elseif ($sub <= 69.4 && $sub >=64.5){
    $a="B3";
    }
    elseif ($sub <= 72.4 && $sub >=69.5){
    $a="B2";
    }
    
   }
 }

  return $a;
}
}

function select_compulsary_subject($subject_id,$class_option,$status,$term,$year){
$conn =db();
$result= array();

      $query ="SELECT * FROM all_subject WHERE subject_id ='$subject_id' && class_option='$class_option' && subject_status ='$status' && subject_term = '$term' && subject_year = '$year'";
      $rs = mysqli_query($conn,$query) or die (mysqli_error($conn));
      if(!$rs){
            echo " <p class='text-error'>select result query failed.</p>";
      }

      if(mysqli_num_rows($rs) != 0){

      while ($r=mysqli_fetch_assoc($rs)) {
            $result[] = $r;
            # code...
      }
      return $result;
}


return array();
}
function insert_compulsary_subject($subject_id,$class_option,$status,$term,$year){
  $conn =db();
  $query ="INSERT INTO all_subject (subject_id,class_option,subject_status,subject_term,subject_year) VALUES('$subject_id','$class_option','$status','$term','$year')";
  $r =mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$r){
    echo"query of insert result failed";
exit();
  }else{
    return true;
  }
}

function update_compulsary_subject($subject_id,$class_option,$status,$term,$year){
$conn =db();
  $query ="UPDATE all_subject SET class_option = '$class_option',subject_status ='$status',subject_term='$term',subject_year='$year' WHERE subject_id='$subject_id' && class_option = '$class_option' && subject_term = '$term' && subject_year = '$year'";

  $u = mysqli_query($conn,$query) or die(mysqli_error($conn) );
  if(!$u){
    echo " update of result failed";
  }else{
    return true;
  }
}

function get_all_compulsary_subject($class_option,$term,$year){
$conn =db();
$result= array();

      $query ="SELECT subject_id FROM all_subject WHERE  class_option IN('0','$class_option') && subject_status ='C' && subject_term = '$term' && subject_year = '$year'";
     //echo $query;
      $rs = mysqli_query($conn,$query) or die (mysqli_error($conn));
      if(!$rs){
            echo " <p class='text-error'>select result query failed.</p>";
      }

      if(mysqli_num_rows($rs) != 0){

      while ($r=mysqli_fetch_assoc($rs)) {
            $result[] = $r['subject_id'];
            # code...
      }
    }
      return $result;

}


function get_all_elective_subject($c,$sc,$class_option,$term,$s){
$conn =db();
$result= array();
 $comp_sub = get_all_compulsary_subject($class_option,$term,$s);

     $allsub = getsubject($c,$sc,$s,$term);
     foreach ($allsub as $key => $value) {
     // var_dump($value['subject_id']);
      if(!in_array($value['subject_id'], $comp_sub)){
        //unset($value);
    
        $result[] =$value['subject_id'];
      }
     }
     return $result;
   
}

function posinclass($abb,$ave_std){
  $gg = max(array_values($abb));

 
  $i=0;
  arsort($abb);
$z = array();

foreach ($ave_std as $key => $value) {
  
$i ++;

  if($gg >= $value['average'] ){
 
    $z[]=array('student_id'=>$value['student_id'],'position'=>$i,'average'=>$value['average']);
}

}

//var_dump($ab);
//var_dump($z);
return $z;
}

?>