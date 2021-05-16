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
	
<div class="col-sm-12" style="padding-top:15px;">

      <?php teacherBanner(); ?>
     <div class="col-sm-12 formBg">

      <div class="col-sm-12 teachheader">
                  Add Students Result
            
      </div>
      <form class="form-horizontal" method="post" action="resultform.php">
           <div class="form-group"> <label class="col-sm-2 control-label">Session</label>
            <div class="col-sm-6 col-sm-offset-2"><select class="form-control" name="session" id="session">
               <option value=""> Select Academic Session</option>
               <?php
                    for ($year = (date('Y')); $year >= 2012; $year--) {
                        $yearnext =$year+1;
                         echo "<option value=\"$year\">$year/$yearnext</option>\n";
                            
                            }
                 ?> 


            </select>

           </div>
     </div>
     

      <div class="form-group"> <label class="col-sm-2 control-label">Term</label>
          <div class="col-sm-6 col-sm-offset-2">
              <select class="form-control" name="term" id="term">
                    <option value=""> Select Academic Term</option>
                    <option value="First Term">First Term</option>
                    <option value="Second Term">Second Term</option>
                    <option value="Third Term">Third Term</option>
              </select>

           </div>
     </div>


      <div class="form-group"> <label class="col-sm-2 control-label">Subject</label>
            <div class="col-sm-6 col-sm-offset-2"><select class="form-control" name="subject" id="subject">
               <option value=""> Select Subject</option>
               <?php
               $conn = db();
               $subject=mysqli_query($conn,"select * from subject order by subject_name") or die(mysqli_error($conn));

              while( $r=mysqli_fetch_assoc($subject)){
                  unset($_SESSION['subject_id'], $_SESSION['term'],$_SESSION['session'],$_SESSION['subject_name']);
                  


                 echo' <option value="'.$r['subject_id'].','.$r['subject_name'].'"> '.$r['subject_name'].'</option>';
              }
                   
                 ?> 


            </select>

           </div>
     </div>
     <div class="form-group">
         <div class="col-sm-6 col-sm-offset-4">
              <input type="submit" name="submit" class="btn btn-warning" id="enter_result" value="Continue">

          </div>
    </div>
     
      </form>
    </div>

</div>
       	</div>

       </div>

<?php
       footer2();
       ?>
       <script type="text/javascript">
$(document).ready(function(){
  $("#enter_result").click(function(){
  if($("#term").val() == ""){
    alert("you need to select term to continue");
    return false;
  }

  if($("#session").val() == ""){
    alert("you need to select session to continue");
    return false;
  }

  if($("#subject").val() == ""){
    alert("you need to select subject to continue");
    return false;
  }
}); // end of click



}); // end of rea

       </script>