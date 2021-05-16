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
	<?php 

        if( isset($_GET['i']) ) {
              switch( $_GET['i']) {
                     case 0:
                            echo '<p class="error">Students could not be added now.please try again.</p>';
                     break;
                     case 1:
                            echo '<p class="success">Students Successfully Added</p>';
                     break;
                     case 2:
                            echo '<p class="success">Students Successfully Added</p>';
                     break;
                     default:
                     break;
              }
       }


       ?>
      
<div class="col-sm-12 whitecolor">
    <div class="col-sm-12 headbanner">Student<a href="student.php" class="btn btn-danger btn-sm navbar-right">Back To Studens</a></div>
<div class="col-sm-12 formBg" style="margin-top:15px;">
       <form class="form-group" method="post" action="addstudentScript.php">

        <div class="col-sm-3">    
        <label>Class</label> <select class='form-control' name='class' id='class'>

                        <option value=''>-----  choose a class   -------</option>";
                         
                         <?php   $ac = mysqli_query($conn, 'SELECT * FROM class') or die(mysql_error($conn));
                          while( $l=mysqli_fetch_assoc($ac) ) {
                                    
                        ?>
                            <option value="<?php echo $l['class_id']; ?>"><?php echo $l['class_name'];?></option>
                            
                      <?php  } ?>

                  </select></div>

      <div class="col-sm-3">
        <label>Sub Class</label><select class="form-control" name="classcat" id="classcat">
                    <option value="">--  choose a sub class ---</option>

              </select></div>

               <div class="col-sm-3">
                      <label>Year / Session</label>

                     <select name="year" id="yearsession" class="form-control">
                       <option value=''>choose a session </option>
              <?php
            for ($year = (date('Y')); $year >= 2012; $year--) {

                            
                                          $yearnext =$year+1;
                                          echo "<option value=\"$year\">$year/$yearnext</option>\n";
                            
                            }
        ?> 
      </select>


              </div>

              <div class="col-sm-3">    
        <label>Class Type</label> <select class='form-control' name='school' id='schooll'>

                        <option value=''>choose a class type</option>
                         
                         <?php   $ac = mysqli_query($conn, 'SELECT * FROM class_option');
                          while( $l=mysqli_fetch_assoc($ac) ) {
                                    
                        ?>
                            <option value="<?php echo $l['class_option_id']; ?>"><?php echo $l['class_option_name'];?></option>
                            
                      <?php } ?>

                  </select></div>

              
       </div>



<table class="table table-striped table-bordered">
       <?php
       for($i=1; $i<30; $i++) {


          if(($i % 2)== 0){
  echo"<tr class='warning'>";

}else{
echo"<tr class='danger'>";
}
       ?>
  
    <td><span>Surname</span><p><input type="text" value="" class="form-control"  name="sn[<?php echo $i ?>]" /></p></td>
    <td><span>First Name</span><p><input type="text" value="" class="form-control" name="fn[<?php echo $i ?>]" /></p></td>
    <td><span>Other Names</span><p><input type="text" value="" class="form-control"  name="on[<?php echo $i ?>]" /></p></td>
    <td><span>Student No</span><p><input type="text" value=""  class="form-control" name="mn[<?php echo $i ?>]" /></p></td>
    <td><span>Sex</span><p><select  name="sex[<?php echo $i ?>]" class="form-control">
         <option value="">Select Sex</option>
         <option value="male">Male</option>
       <option value="female">Female</option>
</select></p></td>

  </tr>
  <?php
}





       ?>
</table>
<div class="col-sm-2">
                   <input type="submit" id="addstudent" value="submit" name="submit"  class="btn btn-success">
              </div>
       </form>

  </div>
</div>
</div>
       

       	</div>

       </div>

<?php
       footer2();
       ?>

 <script type="text/javascript">
     $(document).ready(function(){
      $("#addstudent").click(function(){
            
      
      var  classname =$("#class").val();
      var  classcat =$("#classcat").val();
      var  year =$("#year").val();
      var  password =$("#school").val();

           

             if(classname == "" ){

                  alert("Class Name field is required");
                  
                  return false;
            }
             if(classcat == ""){

                  alert("class Type field is required");
                  
                  return false;
            }
             if(year == ""){

                  alert("Session field required");
                  
                  return false;
            }

             if(password == ""){

                  alert("Enter school type");
                  
                  return false;
            }

      });
    });
</script>





        <script type="text/javascript">

$(document).ready(function(){
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