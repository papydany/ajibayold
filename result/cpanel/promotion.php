<?php  include_once"../function/include.php";  
       include_once"adminFunction.php";
     admincheck();
     include_once"../function/headerTop.php";
       top();
      
       linkToBoostrap();
       navigation2();
       section2();
       $conn =db();
       ?>

       <div class="row bc">
       <?php  leftnavigation(); ?>
       	
       	<div class="col-sm-10">
                      <div class="col-sm-12 whitecolor">
                       <div class="col-sm-12 teachheader">
              Promote Student
</div>
  <?php if(isset($_GET['e'])){
echo"<div class='col-sm-10 col-sm-offset-1'>";
if($_GET['e'] == 0){
echo "<p class='success'> students successfull promoted</p>";
}
if($_GET['e'] == 1){
  echo "<p class='error'> students  promotion failed.</p>";
}

if($_GET['e'] == 2){
  echo "<p class='error'> parameters of students supplied can not be promoted now.</p>";
}

  
echo"</div>";
}
  ?>
            
      

                   <form action="promotionscript.php" method="POST" class=" form-group" target="_blank">

 <div class="col-sm-7 form-group">
              <label>Select session</label>

              <select class="form-control" name="year" id="year">
               <option value=""> Select Academic Session</option>
              <?php
                    for ($year = (date('Y')); $year >= 2012; $year--) {
                        $yearnext =$year+1;
                         echo "<option value=\"$year\">$year/$yearnext</option>\n";
                            
                            }
                 ?> 


            </select>
       </div>


     <div class="col-sm-7 form-group">
      <label>Select Class</label>
    <select class='form-control' name="c" id='class'>

                        <option value="">-----  Select  class   -------</option>";
                         
                         <?php   $ac = mysqli_query($conn, 'SELECT * FROM class');
                          while( $l=mysqli_fetch_assoc($ac) ) {
                           /* if($l['class_id'] == 3 || $l['class_id'] == 6){
                             continue;
                                   } */
                        ?>
                            <option value="<?php echo $l['class_id']; ?>"><?php echo $l['class_name'];?></option>
                            
                      <?php } ?>

                  </select>
                </div>

                <div class="col-sm-7 form-group">
        <label>Sub Class</label><select class="form-control" name="classcat" id="classcat">
                    <option value="">--  choose a sub class ---</option>

              </select></div>
                <div class="col-sm-12 form-group">
       <input type="submit" name="s" id="submit"  value="Promote student"  class="btn btn-danger"/>
     </div>

         </form>
  </div>
         
	
       	</div>

       </div>

<?php
       footer2();
       ?> <script type="text/javascript">

$(document).ready(function(){

$('#submit').click(function(){
          if($('#year').val() ==""){
            alert('you have to select a session');
            return false;
          }

 if($('#c').val() ==""){
            alert('you have to select a class');
            return false;
          }

 if($('#classcat').val() ==""){
            alert('you have to select a sub class');
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