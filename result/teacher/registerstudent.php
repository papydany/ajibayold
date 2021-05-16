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

<div class="col-sm-10 c0l-sm-offset-1">
      <?php
       
        if(isset($_GET['r'])){


        switch ($_GET['r']) {
          case '0':
          echo "<p class='exist'> No Students is available. contact the School admin.</p>";
            break;

             case '1':
          echo "<p class='success'>  Students successfull registered.</p>";
            break;

             case '2':
          echo "<p class='error'>  Students could not be registered. Try again later .</p>";
            break;
          
          default:
            # code...
            break;
        }
         }

      ?>
    </div>
      <?php
     

       teacherBanner(); ?>

      <div class="col-sm-12 formBg">
            <div class="col-sm-12 teachheader">
                  Registration Of  Students
            
      </div>

            <form class="form-group" action="process_registerstudent.php" method="post">
                  <div class="col-sm-2">
                  <div class="radio"><label><input type="radio" name="term" id="term" value="First Term">First Term</label></div></div>
               <div class="col-sm-2">   <div class="radio"><label><input type="radio" name="term" id="term" value="Second Term">Second Term</label></div></div>
            <div class="col-sm-2">      <div class="radio"><label><input type="radio" name="term" id="term" value="Third Term">Third Term</label></div></div>
             <div class="col-sm-3">
                      <label>Year / Session</label>

                     <select name="year" id="yearsession" class="form-control">
              <?php
            for ($year = (date('Y')); $year >= 2012; $year--) {

                            
                                          $yearnext =$year+1;
                                          echo "<option value=\"$year\">$year/$yearnext</option>\n";
                            
                            }
        ?> 
      </select>


              </div>
          <br/><br/><br/><div class="col-sm-3">  <input type="submit" class="btn btn-success" name="submit" id="register" value="Register"></div>



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
  $("#register").click(function(){
  if(!$("input[name='term']:checked").val()){
    alert("you need to choose term to continue");
    return false;
  }
}); // end of click



}); // end of rea

       </script>