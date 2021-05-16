<?php  include_once"../function/include.php";  
       include_once"teacherfunction.php";

lodgincheck();
include_once"../function/headerTop.php"; 
       top();
       linkh();
       navigation2();
       section2();


       ?>

   <div class="row bc">
       <?php  leftnav(); ?>
       	
 
  <div class="col-sm-10 nopaddling">
    <div class="col-sm-10 col-sm-offset-1" style="margin-top:15px;">
      <?php

    if(isset($_GET['del'])){
    if( $_GET['del'] = 1 ){
      echo "<p class='success'> delete was successfull. </p>";
    }else{
  echo "<p class='success'> delete was not succefull. Please try agin or contact the school admin.tahnk you. </p>";
    }
    }

    if(isset($_GET['up'])){
    if( $_GET['up'] = 1 ){
      echo "<p class='success'> Student  successfully set to Absent. </p>";
    }else{
  echo "<p class='success'> student was not succefull set to absent. Please try agin or contact the school admin.tahnk you. </p>";
    }
    }
    ?>
  </div>

<div class="col-sm-12" style="padding-top:15px;">



      <?php
   

       teacherBanner(); ?>
  <div class="col-sm-12 formBg bottom_margin">
      
            <div class="col-sm-12 teachheader">
              View Registered  Students
            
      </div>

            <form class="form-group" action="viewregisterstudent.php" method="post">
                  <div class="col-sm-4 form-group">
                  <label>Select Term</label>
                  <select name="term" id="t" class="form-control">
                    <option value="">  select academic Term</option>
                    <option value="First Term">First Term</option>
                    <option value="Second Term">Second Term</option>
                    <option value="Third Term">Third Term</option>
                  </select>
                  </div>
              
             <div class="col-sm-4 form-group">
                      <label>Year / Session</label>

                     <select name="year" id="yearsession" class="form-control">

                      <option value="">  select academic session</option>
              <?php
            for ($year = (date('Y')); $year >= 2012; $year--) {

                            
                                          $yearnext =$year+1;
                                          echo "<option value=\"$year\">$year/$yearnext</option>\n";
                            
                            }
        ?> 
      </select>


              </div>
          <div class="col-sm-3">  <br/><input type="submit" class="btn btn-success" name="submit" id="v_r" value="View Registered Students"></div>


</form>
</div>
            

            <?php
           if(isset($_POST['submit'])){
echo'<div class="col-sm-12 nopaddling formBg" style="padding:10px;">';
  $term = $_POST['term'];
  $year = $_POST['year'];
  $yearplus=$year+1;

$student_reg = select_student_reg_all($year,$_SESSION['class_id'], $_SESSION['subclass'],$term);


if(count($student_reg) == 0){

 echo $msg = "<p class='exist'> Students have not be register for " .$term. " &nbsp;".$year. " / " .$yearplus. " session.please contact the Admin</p>";

}else{
$s = 0;
echo"<p class='text-success'><b>Term : </b>".$term."</p>";
echo"<p class='text-success'><b>Session : </b>".$year." / ".$yearplus."</p>";
echo"<table class='table  table-bordered'>
<tr class='success'>
<th>S/n</th>
<th>Surname</th>
<th>First Name</th>
<th>Other Name</th>
<th>Class Num</th>
<th colspan='2'>Action</th>
</tr>";
foreach ($student_reg as $key => $value) {
$s++;
if(($s % 2)== 0){
  echo"<tr class='warning'>";

}else{
echo"<tr class='danger'>";
}
echo"<td>".$s."</td>
<td>".$value['surname']."</td>
<td>".$value['firstname']."</td>
<td>".$value['othername']."</td>
<td>".$value['student_no']."</td>
<td>".'<a href="delete.php?delete='.$value['reg_id'].'" class="btn btn-danger btn-xs">Delete Registartion</a></td>
<td>'.'<a href="studentstatus.php?absent='.$value['student_id'].'" class="btn btn-success btn-xs">Absent</a></td>
</tr>';
  # code...
}
echo"</table>";


}
echo'</div>';



}



            ?>

      
    </div>

</div>
       	</div>

       </div>

<?php
       footer2();
       ?>

      <script type="text/javascript">
$(document).ready(function(){

  $("#v_r").click(function(){
 if($("#t").val() == ""){

    alert("you need to select the term");
    return false;
  }

 if($("#yearsession").val() == ""){

    alert("you need to select the session");
    return false;
 }
}); // end of click



}); // end of rea

       </script>