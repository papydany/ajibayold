<?php
function linkh(){
?>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="admincss.css">
<script src="../script/jquery1.js" type="text/javascript"></script>
<script src="../script/bootstrap.min.js" type="text/javascript"></script>
<script src="../script/jquery.js" type="text/javascript"></script>
<script src="../script/respond.js"></script>
<?php


}

function leftnav(){
	?>
	<div class="col-sm-2 addpadding addcolorleftnav" >
    
         <ul class="list-group">
      
            <li class="list-group-item "><a href="index.php">Home</a></li>
            <li class="list-group-item"><a href="registerstudent.php">Register Student</a></li>
            <li  class="list-group-item"><a href="viewregisterstudent.php">View Students</a></li>
            <li class="list-group-item"><a href="enter_result.php">Add Result</a></li>
            <li class="list-group-item"><a href="viewresult.php">View Result</a></li>
           


       	</div>
       	<?php
}
function lodgincheck(){
if(!isset($_SESSION['teacherlog']) ){
      header('location:loginteacher.php');
      exit();
}
}


function load_teacher($username){

$conn =db();

        $query="SELECT `teacher`.`Teacher_id`, `teacher`.`surname`,`teacher`.`firstname`,`teacher`.`othername`,`category_of_class`.`class_category_name`,`class`.`class_name` FROM teacher LEFT JOIN category_of_class ON `category_of_class`.`class_category_id` =`teacher`.`class_category_id` LEFT JOIN class ON `class`.`class_id` = `teacher`.`class_id` where teacher.username ='".$username."' ";
     
     $sql=mysqli_query($conn,$query) or die(mysqli_query($conn));
     if(!$sql){
      echo "query failed";
     }

     if(mysqli_num_rows($sql) != 0){
      $a =array();
      while($r =mysqli_fetch_assoc($sql)){
            $a[] = $r;

            return $a;
      }
      return array();
     }

}


/*echo"<tr class='resultbg'><td></td><td colspan='4'><b>Total mark</b></td><td colspan='3'><b>",isset($Tm_first) ? $Tm_first : '',"</b></td><td colspan='3'></td>
   <td colspan='4'><b>Average</b></td><td colspan='3'><b>",isset($av_f) ? $av_f: '',
    "</b></td><td colspan='3'></td><td colspan='5'><b>Class Position</b></td><td colspan='2'><b>";

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
         }*/

function teacherBanner(){




      $a= load_teacher($_SESSION['username']);
      $b = array();
      foreach ($a as $key => $value) {
       $class=$value['class_name'];
       $class_cat=$value['class_category_name'];


             # code...
      }
//var_dump($value);
      ?>
<div class="col-sm-12 headbanner2"><?php echo $_SESSION['fullname']; ?><span class="navbar-right"><?php  echo $class ."&nbsp;&nbsp;".$class_cat; ?></span></div>

<?php
}

function select_student_reg($session,$class_id,$classcat,$term){
      $conn = db();
      $std_id =array();

$query="SELECT student_id FROM student_reg WHERE session='$session' && class_id='$class_id' && class_category_id='$classcat' && subject_term='$term'";
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
if(!$result){
      echo "query failed";
}
if(mysqli_num_rows($result) != 0){

      while ($r=mysqli_fetch_assoc($result)) {
            $std_id[] = $r;
            # code...
      }
      return $std_id;
}


return array();
}


function select_student_reg_all($session,$class_id,$classcat,$term){
      $conn = db();
      $std =array();

$query="SELECT student_profile.student_id,surname,firstname,othername,student_reg.reg_id,student_reg.student_no,student_reg.subject_term,student_reg.session FROM student_profile INNER JOIN student_reg ON student_profile.student_id = student_reg.student_id WHERE student_reg.session='$session' && student_profile.class_id='$class_id' && student_profile.class_category_id='$classcat' && student_reg.subject_term='$term' && student_profile.status='present'";

$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
if(!$result){
      echo "query failed";
}
if(mysqli_num_rows($result) != 0){

      while ($r=mysqli_fetch_assoc($result)) {
            $std[] = $r;
            # code...
      }
      return $std;
}


return array();
}



function insert_student_reg($std_id,$std_no,$class_category_id,$class_id,$term,$session,$date){
  $conn = db();
  
  $query="INSERT INTO student_reg (student_id,student_no,class_category_id,class_id,subject_term,session,date_reg) VALUES('$std_id','$std_no','$class_category_id','$class_id','$term','$session','$date')";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if($result){
      return true;
  }else{
      return false;
  }



}



function select_student_profile_id($class_id,$class_category_id){
$conn =db();
$student = array();

      $query ="SELECT student_id FROM student_profile WHERE class_id ='$class_id' && class_category_id ='$class_category_id' && status='present'";
      $result = mysqli_query($conn,$query) or die (mysqli_error($conn));
      if(!$result){
            echo " query faild select";
      }

      if(mysqli_num_rows($result) != 0){

      while ($r=mysqli_fetch_assoc($result)) {
            $student[] = $r;
            # code...
      }
      return $student;
}


return array();
}


function select_student_profile($class_id,$class_category_id){
$conn =db();
$student = array();

      $query ="SELECT DISTINCT sr.student_id,sp.class_option_id,sp.surname,sp.firstname,sp.othername,sp.student_no,sp.gender FROM student_profile as sp LEFT JOIN student_reg as sr ON sp.student_id = sr.student_id   WHERE sr.class_id ='$class_id' && sr.class_category_id ='$class_category_id' && sp.status='present' order by sp.student_no";
      $result = mysqli_query($conn,$query) or die (mysqli_error($conn));
      if(!$result){
            echo " query faild select";
      }

      if(mysqli_num_rows($result) != 0){

      while ($r=mysqli_fetch_assoc($result)) {
            $student[] = $r;
            # code...
      }
    }
      return $student;
}

function select_student_profile_to_reg($id,$c,$sc){
  $conn =db();
  $pr =array();
  $query = "Select student_id,student_no from student_profile where student_id ='$id' && class_id ='$c' && class_category_id ='$sc'";

 $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
while( $r = mysqli_fetch_assoc($result)){
 $pr[] = $r;
}
return $pr;
}



function select_result($student_id,$class_no,$class_id,$class_category_id,$reg_id,$subject_id,$term,$year){
$conn =db();
$result= array();

      $query ="SELECT * FROM student_result WHERE student_id ='$student_id' && class_no='$class_no' && class_id ='$class_id' && class_category_id ='$class_category_id' && reg_id ='$reg_id' && subject_id ='$subject_id' && result_term = '$term' && result_year = '$year'";
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

function select_result_display($student_id,$class_id,$class_category_id,$reg_id,$subject_id,$term,$year){
$conn =db();

 
  if( empty($subject_id) ){
    return array();
  }
$result= array();
$sub_id=array();

      $query ="SELECT subject_id,student_ca2,student_exam,student_mark FROM student_result WHERE student_id ='$student_id'  && class_id ='$class_id' && class_category_id ='$class_category_id' && reg_id ='$reg_id' && subject_id IN (".implode(',', $subject_id).") && result_term = '$term' && result_year = '$year' order by subject_id";
      
//echo $query;
      $rs = mysqli_query($conn,$query) or die (mysqli_error($conn));
      if(!$rs){
            echo " <p class='text-error'>select result query failed.</p>";
      }

      if(mysqli_num_rows($rs) != 0){

      while ($r=mysqli_fetch_assoc($rs)) {
            $subj_id[$r['subject_id']] = $r;
            # code...
      }
    }

   // $query2 ="SELECT subject_id FROM subject WHERE "
    //if(isset($subj_id)){
     if(!empty($subj_id)){
    if(count($subj_id) != 0){
      
    $keys = array_keys($subj_id);
  }
  }else{
    $keys =array('');
  }

  foreach( $subject_id as $k=>$v ) {
    

    if( in_array($v, $keys) ) {
      /*if( empty($subj_id[$v]['student_mark']) || $subj_id[$v]['student_mark']==0 ) {
        $result[] = array( 'student_ca2'=>$subj_id[$v]['student_ca2'], 'student_exam'=>'','student_mark'=>'' );
      } else {*/
        $result[] = array( 'subject_id'=>$v,'student_ca2'=>$subj_id[$v]['student_ca2'], 'student_exam'=>$subj_id[$v]['student_exam'],'student_mark'=>$subj_id[$v]['student_mark'] );
      
      }else{
 $result[] = array('subject_id'=>$v, 'student_ca2'=>'', 'student_exam'=>'','student_mark'=>'');
      
      }
    
  }
  

      return $result;
      
}

function percentageOfFirstTerm($student_id,$class_id,$class_category_id,$reg_id,$subject_id,$term,$year){

$r =  select_result_display($student_id,$class_id,$class_category_id,$reg_id,$subject_id,$term,$year);
var_dump($r['student_mark']);
$per = round($r['student_mark'] * 0.2,2);
return $per;

}

function insert_result($student_id,$class_no,$class_id,$class_category_id,$reg_id,$subject_id,$ca,$exam,$mark,$term,$year){
  $conn =db();
  $query ="INSERT INTO student_result (student_id,class_no,class_id,class_category_id,reg_id,subject_id,student_ca2,student_exam,student_mark,result_term,result_year) VALUES('$student_id','$class_no','$class_id','$class_category_id','$reg_id','$subject_id','$ca','$exam','$mark','$term','$year')";
  $r =mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$r){
    echo"query of insert result failed";
exit();
  }else{
    return true;
  }
}

function update_result($student_id,$class_no,$class_id,$class_category_id,$reg_id,$subject_id,$ca,$exam,$mark,$term,$year){



  $conn =db();
  $query ="UPDATE student_result SET student_ca2 = '$ca',student_exam ='$exam',student_mark='$mark' WHERE student_id='$student_id' && class_no = '$class_no' && class_id = '$class_id' && class_category_id = '$class_category_id' && reg_id = '$reg_id' && subject_id ='$subject_id' && result_term = '$term' && result_year = '$year'";

  $u = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$u){
    echo " update of result failed";
  }else{
    return true;
  }
}

function getsubject($class_id,$subclass,$year,$term){
$conn = db();
$sb = array();
  $query = "SELECT DISTINCT student_result.subject_id,subject.subject_name FROM student_result INNER JOIN subject ON student_result.subject_id=subject.subject_id WHERE student_result.class_id ='$class_id' && student_result.class_category_id='$subclass' && student_result.result_term='$term' && student_result.result_year='$year' order by subject.subject_id";

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

function get_reg_id($student_id,$sc,$c,$term,$s){
$conn =db();
$reg_id =0;
$query =" SELECT student_reg.reg_id FROM student_reg,student_result WHERE student_reg.reg_id=student_result.reg_id &&  student_reg.student_id ='$student_id' && student_reg.class_category_id ='$sc' && student_reg.class_id='$c' && subject_term='$term' && session ='$s'";

$r =mysqli_query($conn, $query) or die (mysqli_error($conn));

if(!$r){
  echo "query to get student reg_id failed";
}

if(mysqli_num_rows($r) != 0){

   while($f= mysqli_fetch_assoc($r)){
    $reg_id = $f;
   }
  }
  
return $reg_id;

}

function fetch_annual_result2($std_id,$c,$sc,$sub,$s){

  
  $conn =db();
  $query =" SELECT sum(student_mark) as sm FROM student_result WHERE student_id ='$std_id' && class_id='$c' && class_category_id ='$sc'  && subject_id ='$sub' && result_term IN('First Term','Second Term','Third Term')  && result_year ='$s'";
$r =mysqli_query($conn,$query) or die(mysqli_query($conn));
while( 
  $rs = mysqli_fetch_assoc($r)){
  $a = $rs;
   }
//var_dump($a);
return $a;

}



function fetch_annual_result($std_id,$c,$sc,$sub,$s){

   
  $conn =db();
  $query =" SELECT student_mark FROM student_result WHERE student_id ='$std_id' && class_id='$c' && class_category_id ='$sc'  && subject_id = '$sub' && result_term IN('First Term')  && result_year ='$s' GROUP BY subject_id";

$query2 = "SELECT student_mark  FROM student_result WHERE student_id ='$std_id' && class_id='$c' && class_category_id ='$sc'  && subject_id = '$sub' && result_term ='Second Term' && result_year ='$s' GROUP BY subject_id";

$query3 =" SELECT student_mark  FROM student_result WHERE student_id ='$std_id' && class_id='$c' && class_category_id ='$sc' && subject_id = '$sub'  && result_term ='Third Term' && result_year ='$s'";







  $r =mysqli_query($conn,$query) or die(mysqli_query($conn));

  if(!$r){
    echo "query failed to select result first term";
  }
 //while( 
  $rs = mysqli_fetch_assoc($r);//){
  $annual = $rs['student_mark'];
  
// }

 
//------------------------------------------------------
$r2 =mysqli_query($conn,$query2) or die(mysqli_query($conn));

  if(!$r2){
    echo "query failed to select result first term";
  }
 
// while(  
  $rs2 = mysqli_fetch_assoc($r2);//){
  $annual2 =$rs2['student_mark'];
   
// }
  $a =$annual + $annual2;
//echo $a ;
//echo $annual2;
 //var_dump($annual2);
 
//---------------------------------------------------------------
 $r3 =mysqli_query($conn,$query3) or die(mysqli_query($conn));

  if(!$r3){
    echo "query failed to select result first term";
  }
  
  //while(
    $rs3 = mysqli_fetch_assoc($r3);//){
  $annual3 =$rs3['student_mark'];
    $aa =$a  + $annual3;
    
 // }
//var_dump($aa);

 
 //---------------------------------------

 

 return $aa;
}


function select_sub_number($std_id,$c,$sc,$term,$s){
  $conn =db();
 $sum = array();
  $query =" SELECT * FROM student_result WHERE student_id ='$std_id' && class_id='$c' && class_category_id ='$sc' && result_term ='$term' && result_year ='$s'";
 // echo $query;
  $r=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$r){
    echo "query failed to select subject total";
  }
  while($rs = mysqli_fetch_assoc($r)){
    $sum []= $rs['result_id'];
  }
 return $sum =count($sum);

}


function select_sub_total($std_id,$c,$sc,$sub,$term,$s){
 if( empty($sub) ){
    return array();
  }
//var_dump($sub);
  $conn =db();
  
 //$elect_sub = get_all_elective_subject($c,$sc,$class_option,$term,$s);
 $sum = 0;
  $query =" SELECT sum(student_mark) as tm  FROM student_result WHERE student_id ='$std_id' && class_id='$c' && class_category_id ='$sc'  && subject_id IN (".implode(',', $sub).") && result_term ='$term' && result_year ='$s'";
 // echo $query;
  $r=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$r){
    echo "query failed to select subject total";
  }
  while($rs = mysqli_fetch_assoc($r)){
    $sum = $rs['tm'];
  }
  if($s < 2017)
  {
  if($c >3){
    $s_m = array();

 $query =" SELECT student_mark   FROM student_result WHERE student_id ='$std_id' && class_id='$c' && class_category_id ='$sc'  && subject_id NOT IN (".implode(',', $sub).") && result_term ='$term' && result_year ='$s'";
 //echo $query;
  $r=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$r){
    echo "query failed to select subject total";
  }
  if(mysqli_num_rows($r) != 0){
   
  while($rs = mysqli_fetch_assoc($r)){
    $s_m[] = $rs['student_mark'];
  }
  mysqli_free_result($r);
  $max =max(array_values($s_m));
  $sum =$sum + $max;
  }else{
    $sum =$sum;
  }
}
}
  
  return $sum;

}



function p_f($std_id,$c,$sc,$sub,$term,$s){
 if( empty($sub) ){
    return array();
  }
  $ab =array();
  $conn =db();
   $num = total_subject_number($std_id,$c,$sc,$term,$s);
 $sum = array();
  $query_id =" SELECT DISTINCT student_id FROM student_result WHERE   class_id='$c' && class_category_id ='$sc'  && subject_id IN (".implode(',', $sub).") && result_term ='$term' && result_year ='$s'  ";
 // echo $query;
  $r_id=mysqli_query($conn,$query_id) or die(mysqli_error($conn));
  if(!$r_id){
    echo "query failed to select subject total";
  }
  if(mysqli_num_rows($r_id) != 0){
  while($rs_id = mysqli_fetch_assoc($r_id)){
    
    $id[] =$rs_id['student_id'];
  }


}
$len = count($id);


foreach ($id as $key => $value) {
  # code...

 $num = total_subject_number($value,$c,$sc,$term,$s);




  $query =" SELECT sum(student_mark) as sm, student_id FROM student_result WHERE student_id ='$value' && class_id='$c' && class_category_id ='$sc'  && subject_id IN (".implode(',', $sub).") && result_term ='$term' && result_year ='$s'  ";
// echo $query;
  $r=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$r){
    echo "query failed to select subject total";
  }
  
  if(mysqli_num_rows($r) != 0){
  while($rs = mysqli_fetch_assoc($r)){
    
   $sum[]=$rs;
   $mark[] =$rs['sm'];


  }
 // var_dump($sum);


}
}

$m = max($mark); 
rsort($sum);
$i =0;
foreach ($sum as $k => $v) {
  # code...
$i++;
//for ($i=0; $i < $len ; $i++) { 
if(max($mark )>= $v['sm']  ){
//$m=$v['sm'];
  $z[]=array('student_id'=>$v['student_id'],'position'=>$i);
  

//}
}
}
//$s=array();
 // $ss =array_sum($sum);
//var_dump($z);
 




 return $z;

}
/*function student_with_result($c,$sc,$term,$s){
 
  $conn =db();
 //$num = 0;
  $query =" SELECT DISTINCT student_id FROM student_result WHERE  class_id='$c' && class_category_id ='$sc' && result_term ='$term' && result_year ='$s'";
// echo $query;
  $r=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$r){
    echo "query failed to select subject total";
  }
  while($rs = mysqli_fetch_assoc($r)){
    $num[] = $rs['student_id'];
  }
 
 //var_dump($num); 
  return $num;

}*/
/*function student_with_result_inall_term($c,$sc,$s){
 
  $conn =db();
 //$num = 0;
  $query =" SELECT DISTINCT student_id FROM student_result WHERE  class_id='$c' && class_category_id ='$sc' && result_term IN('First Term','Second Term','Third Term') && result_year ='$s'";
// echo $query;
  $r=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$r){
    echo "query failed to select subject total";
  }
  while($rs = mysqli_fetch_assoc($r)){
    $num[] = $rs['student_id'];
  }
 
 //var_dump($num); 
  return $num;

}*/

function total_subject_number($std_id,$c,$sc,$term,$s){
 
  $conn =db();
 //$num = 0;
  $query =" SELECT DISTINCT count(subject_id) as sb  FROM student_result WHERE student_id ='$std_id' && class_id='$c' && class_category_id ='$sc' && result_term ='$term' && result_year ='$s'";
// echo $query;
  $r=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$r){
    echo "query failed to select subject total";
  }
  while($rs = mysqli_fetch_assoc($r)){
    $num = $rs['sb'];
  }
 
  if($num != 0){
  return $num;
}
//echo $num;
//var_dump($num);
}

function all_subject_number($std_id,$c,$sc,$s){
 
  $conn =db();
 //$num = 0;
  $query =" SELECT  subject_id FROM student_result WHERE student_id ='$std_id' && class_id='$c' && class_category_id ='$sc'  && result_year ='$s'";
// echo $query;
  $r=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if(!$r){
    echo "query failed to select subject total";
  }
  while($rs = mysqli_fetch_assoc($r)){
    $num[] = $rs['subject_id'];
  }
 //$rr =array_unique($num);

  $rr =count($num);
  return $rr;

//var_dump($num);
}
?>