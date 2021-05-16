<?php 
include_once"function.php";

top(); ?>

<?php echo'<div class="nav_rule nomargin bd_padding" style="padding-top:10%;">';
if(check_admin_user()){
?>


 	<div class="col-sm-12 admin_header"><p>View School Fee</p></div>

 	<form method="post" action="viewschoolfeescript.php" >
 		
 		<div class="form-group col-xs-12"> 
    <label class="col-sm-4 control-label">Session</label>
            <div class="col-sm-6 col-sm-offset-2">
            <select class="form-control" name="session" id="session">
               <option value=""> Select Academic Session</option>
               <?php
                    for ($year = (date('Y')); $year >= 2012; $year--) {
                        $yearnext =$year+1;
                         echo '<option value="'.$year.'">'.$year."/".$yearnext.'</option>';
                            
                            }
                 ?> 


            </select>

           </div>
     </div>

 <div class="form-group col-xs-12"> 
 <label class="col-sm-4 control-label">Term</label>
          <div class="col-sm-6 col-sm-offset-2">
              <select class="form-control" name="T" id="T">
                    <option value=""> Select Academic Term</option>
                    <option value="First Term">First Term</option>
                    <option value="Second Term">Second Term</option>
                    <option value="Third Term">Third Term</option>
              </select>

           </div>
     </div>

 
     <div class=" form-group col-xs-12">
      <label class="col-sm-4 control-label">Select Class</label>
      <div class="col-sm-6 col-sm-offset-2">
    <select name="class_id" class='form-control'  id="class_id">

                        <option value="">-----  Select  class   -------</option>";
                         
                         <?php 
               // connect to result database    
                         $con = dbresult();
                         $query = 'SELECT * FROM class';
                         $result = mysqli_query($con, $query);
 echo $query;

                      while($row = mysqli_fetch_assoc($result)) {
                          # code...
                          
                        
                           echo'<option value="'. $row['class_id'] .'">'. $row['class_name'].'</option>';
                            
                      } ?>

                  </select>
                </div>
              </div>

  <div class=" form-group col-xs-12">
      <label class="col-sm-4 control-label">Students status</label>
      <div class="col-sm-6 col-sm-offset-2">
        <select class="form-control" id="status" name="status" >
                    <option value=""> Select students status</option>
                    <option value="1">All students</option>
                    <option value="2">All Completed Student</option>
                    <option value="3">Students with outstanding</option>
              </select>

      </div>
      </div>


<div class=" form-group col-xs-12">
<div class="col-xs-12"><input type="submit" id="view" name="view" value="view student status">
</div>
</div>

</form>
 	

	


<?php	admin_do_url("admin_account.php","back to account menu");

} 	
echo"</div>";
foot();?>



<script>

$(document).ready(function(){


$("#view").click(function(){ 

	
    if($("#session").val() ==""){
    alert("you need to select session to continue");
    return false;
  }

  if($("#T").val() ==""){
    alert("you need to select Term to continue");
    return false;
  }

  if($("#class").val() ==""){
    alert("you need to select class to continue");
    return false;
  }


  if($("#status").val() ==""){
    alert("you need to select a students status to continue");
    return false;
  }


});


});
</script>