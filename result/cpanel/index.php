<?php error_reporting(E_ALL);
ini_set("display_errors", 1);
  include_once"../function/include.php";  
  include_once"adminFunction.php";
 admincheck();
 include_once"../function/headerTop.php";
      
       
        top();
       linkToBoostrap();
       navigation2();
       section2();
       ?>

       <div class="row bc">
       <?php  leftnavigation(); ?>
       	
       	<div class="col-sm-10">
                     <div class="col-sm-12 headbanner2">Welcome <?php echo $_SESSION['admin_surname']; ?>  </div>

        <div class="col-sm-12 whitecolor">
           <div class="col-sm-12 headbanner" style="margin-bottom:15px;">View Result</div>
          
                     <form class="form-horizontal" method="get" action="c_processresult.php" target="_blank">
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
<div class=" form-group">
      <label class="col-sm-2 control-label">Select Class</label>
      <div class="col-sm-6 col-sm-offset-2">
    <select class='form-control' name="class_id" id="class">

                        <option value="">-----  Select  class   -------</option>";
                         
                         <?php  $conn = db(); $ac = mysqli_query($conn, 'SELECT * FROM class');
                          while( $l=mysqli_fetch_assoc($ac) ) {
                                    
                        ?>
                            <option value="<?php echo $l['class_id']; ?>"><?php echo $l['class_name'];?></option>
                            
                      <?php } ?>

                  </select>
                </div>
              </div>

     <div class="form-group">
        <label class="col-sm-2 control-label">Sub Class</label>
         <div class="col-sm-6 col-sm-offset-2">
        <select class="form-control" name="subclass" id="classcat">
                    <option value="">--  choose a sub class ---</option>

              </select></div></div>
       

           <div class="form-group"> <label class="col-sm-2 control-label">Session</label>
            <div class="col-sm-6 col-sm-offset-2">
              <select class="form-control" name="session" id="session">
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


     <div class="form-group">
         <div class="col-sm-6 col-sm-offset-4">
              <input type="submit" name="submit" class="btn btn-warning" id="view_result"  value="View Rwsult">

          </div>
    </div>
     
      </form>
	
       	</div>

       </div>
     </div>

<?php
       footer2();
       ?>

       <script type="text/javascript">


       $(document).ready(function(){

$("#view_result").click(function(){

    if($("#session").val() ==""){
    alert("you need to select session to continue");
    return false;
  }

  if($("#term").val() ==""){
    alert("you need to select term to continue");
    return false;
  }

  if($("#class").val() ==""){
    alert("you need to select class to continue");
    return false;
  }


  if($("#classcat").val() ==""){
    alert("you need to select a sub class to continue");
    return false;
  }
});




       $("#classcat").show();

$("#class").change( function() {
     //  alert("hello");
$("#classcat").hide();
$("#result").html('Retrieving …');
$.ajax({
type: "POST",
data: "data=" + $(this).val(),
url: "getClassType.php",
success: function(msg){
if (msg != ''){
$("#classcat").html(msg).show();
$("#result").html('');
}
else{
$("#result").html('<em>No item result</em>');
}
}
});
});
});
</script>