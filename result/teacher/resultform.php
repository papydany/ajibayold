<?php  include_once"../function/include.php";  
       include_once"teacherfunction.php";

lodgincheck();
include_once"../function/headerTop.php"; 
       top();
       linkh();
       navigation2(); 
         section2();
       ?>
<style type="text/css">
.table > tbody > tr > td{
  padding: 4px;
}
</style>
       <div class="row bc">
       <?php  leftnav(); ?>
       	
       	<div class="col-sm-10 nopadding">
	
<div class="col-sm-12" style="padding-top:15px;">
    

      <?php teacherBanner(); 
 echo' <div class="col-sm-12 formBg">
    <div class="col-sm-12 teachheader">
                  Enter / Edith Students Result
            
      </div>';


        if(isset($_GET['s'])){
     echo"<div class='col-sm-10 col-sm-offset-1'>";

        switch ($_GET['s']) {
          case '0':
          echo "<p class='error'> failed to insert result.please try again or contact admin.</p>";
            break;

             case '1':
          echo "<p class='success'>  Result Input Successfull .</p>";
            break;

            case '2':
          echo "<p class='error'>  you did not insert or update any result .</p>";
            break;

          
          default:
            # code...
            break;
        }

        echo" <a href='enter_result.php' class='btn btn-success'>Go Back To Add Result </a>
        </div>";
         }

    echo'<div class="col-sm-12" style="background-color:#fff;">';
 if(isset($_POST['submit'])){

      list($subject_id,$subject_name) = explode(',', $_POST['subject']);
      $_SESSION['session'] = $_POST['session'];
      $yearplus =  $_SESSION['session'] + 1;
      $_SESSION['subject_id'] = $subject_id;
      $_SESSION['subject_name'] =$subject_name;
      $_SESSION['term'] = $_POST['term'];




       $student_info = select_student_reg_all($_SESSION['session'] ,$_SESSION['class_id'], $_SESSION['subclass'], $_SESSION['term']);

    if(count($student_info) == 0){

 echo $msg = "<p class='exist'> No Students is available in " .$_SESSION['term']. " &nbsp;".$_SESSION['session']. " / " .$yearplus. " session.</p>

 <a href='enter_result.php' class='btn btn-success btn-block'> Click To Go Back </a>";

}else{
$s = 0;
$i=0;
echo "<p class='text-success'><b>".$_SESSION['term']."&nbsp;".$_SESSION['session']."/".$yearplus."</b></p>
<p class='text-success'><b>Subject : </b>".$_SESSION['subject_name']."</p>";

 
       

    

echo"<table class='table table-striped  table-bordered'>
<tr class='success'>
<th width='2%'></th>
<th width='3%'>S/n</th>
<th>Surname</th>
<th>First Name</th>
<th>Other Name </th>
<th>Class Num</th>
<th class='text-center' width='7%'>CA</th>
<th width='10%'>Exam Score</th>
<th width='9%'>Total Mark</th>
</tr>
<form class='form-group' method='post' action='insert_result.php'>";
foreach ($student_info as $key => $value) {

$s++;
$r = select_result($value['student_id'],$value['student_no'],$_SESSION['class_id'],$_SESSION['subclass'],$value['reg_id'],$_SESSION['subject_id'],$_SESSION['term'],$_SESSION['session']);



      # code...

$i++;
$no =count($r);
if(count($r) == 0){
//e#
//  echo "3";

  if(($s % 2)== 0){
  echo"<tr class='warning'>";

}else{
echo"<tr class='danger'>";
}
echo"
<td><input type=\"checkbox\" name=\"check[$i]\"  id=\"check[$i]\" value=\"$i\" /></td>
<td>".$s."<input type='hidden' name='reg[$i]' value='".$value['reg_id']."'></td>
<td>".$value['surname']."<input type='hidden' name='student_id[$i]' value='".$value['student_id']."'></td>
<td>".$value['firstname']."</td>
<td>".$value['othername']."</td>
<td>".$value['student_no']."<input type='hidden' name='student_no[$i]' value='".$value['student_no']."'></td>
<td><input class='form-control navbar-right' type='text' name='ca[$i]' id='ca$i' onKeyUp=\"CA(this,'exam$i','d$i','check[$i]') \"  value=''></td>
<td><input class='form-control' type='text' name='exam[$i]' value='' id='exam$i' onKeyUp=\"updA(this,'ca$i','d$i','check[$i]') \"></td>
<td><input class='form-control' type='text' name='total[$i]' value='' id='d$i' readonly='true' onChange=\"if (this.value!='') document.getElementById('check[$i]').checked=true\" ></td>
</tr>";
}else{
foreach ($r as $k => $v) {
  //echo "string";

  if(($s % 2)== 0){
  echo"<tr class='warning'>";

}else{
echo"<tr class='danger'>";
}
echo"
<td><input type=\"checkbox\" name=\"check[$i]\"  id=\"check[$i]\" value=\"$i\" /></td>
<td>".$s."<input type='hidden' name='reg[$i]' value='".$value['reg_id']."'></td>
<td>".$value['surname']."<input type='hidden' name='student_id[$i]' value='".$value['student_id']."'></td>
<td>".$value['firstname']."</td>
<td>".$value['othername']."</td>
<td>".$value['student_no']."<input type='hidden' name='student_no[$i]' value='".$value['student_no']."'></td>
<td><input class='form-control' type='text' size='20' name='ca[$i]' id='ca$i' onKeyUp=\"CA(this,'exam$i','d$i','check[$i]') \"  value='".$v['student_ca2']."'></td>
<td><input class='form-control' type='text' name='exam[$i]'  id='exam$i' onKeyUp=\"updA(this,'ca$i','d$i','check[$i]') \" value='".$v['student_exam']."'></td>
<td><input class='form-control' type='text' name='total[$i]' value='".$v['student_mark']."' id='d$i' onChange=\"if (this.value!='') document.getElementById('check[$i]').checked=true\" readonly='true'></td>
</tr>";

}
  # code...
}
}

echo"
<tr>
<td colspan='9'><input type='submit' name='result' value='Send Result' id='result' class='btn btn-success'></td></tr>
</form></table>";

}

 
}
echo'</div></div>';

      ?>

</div>
       	</div>

       </div>
       <script type="text/javascript">
      function updA(e,c,d,h){if(e.value > 60){alert('Exam scores can not be more than 60');e.value='';

    }
else{var c=document.getElementById(c); var t=document.getElementById(d); var chk=document.getElementById(h);
 
if(e.value < 61){
var ca =c.value;
var ex =e.value;
var total =Number(ca) + Number(ex);
  t.value = total;
  
}
if(t.value!=''){chk.checked=true;}else{chk.checked=false;}}}


 function CA(e,c,d,h){if(e.value > 40){alert('Exam scores can not be more than 40');e.value='';}
else{var c=document.getElementById(c); var t=document.getElementById(d); var chk=document.getElementById(h);
 
if(e.value < 41){
var ca =c.value;
var ex =e.value;
var total =Number(ca) + Number(ex);
  t.value = total;
  
}
if(t.value!=''){chk.checked=true;}else{chk.checked=false;}}}




       </script>

<?php
       footer2();
       ?>
     