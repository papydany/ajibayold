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

        if(isset($_GET['s'])){
     echo"<div class='col-sm-10 col-sm-offset-1'>";

        switch ($_GET['s']) {
          case '0':
          echo "<p class='error'> failed to register compulsary subject for S S students.please try again or contact admin.</p>";
            break;

             case '1':
          echo "<p class='success'> Compulsary Subjects for Senior Secondary Students Successfull .</p>";
            break;

            case '2':
          echo "<p class='error'>  You did not check any subjects .</p>";
            break;

          
          default:
            # code...
            break;
        }

        echo" 
        </div>";
         }


       ?>
      
<div class="col-sm-12 whitecolor">
    <div class="col-sm-12 headbanner">Register Subjects for Senior class only (SS1 -SS2) <a href="viewregistersubject.php" class="btn btn-danger btn-sm navbar-right">View Register Subjects</a></div>
<div class="col-sm-12 formBg" style="margin-top:15px;">
       <form class="form-group" method="post" action="process_registersubject.php">

        

   <div class ="col-sm-6">
     <div class="col-sm-6">
        <label>Year / Session</label>
        <select name="year" id="yearsession" class="form-control">
          <option value=''>choose a session </option>
          <?php
         for ($year = (date('Y')); $year >= 2012; $year--) {
          $yearnext =$year+1;
          echo "<option value=\"$year\">$year/$yearnext</option>\n";
          }?> 
        </select>
     </div>

     <div class="col-sm-6">    
       <label>Class Type</label>
       <select class='form-control' name='class_option' id='class_option'>
          <option value=''>choose a class type</option>
          <option value='0'>Compulsary Subject for all Senior students</option>
          <?php   $ac = mysqli_query($conn, 'SELECT * FROM class_option');
          while( $l=mysqli_fetch_assoc($ac) ) {
          
          if($l['class_option_id'] > 1){
            ?>
          
         <option value="<?php echo $l['class_option_id']; ?>"><?php echo $l['class_option_name'];?>&nbsp; ONLY</option>
          <?php }} ?>
        </select>
     </div>
     <div class="col-sm-12 form-group">
       <label>Select Term</label>
              <select class="form-control" name="term" id="term">
                    <option value=""> Select Academic Term</option>
                    <option value="First Term">First Term</option>
                    <option value="Second Term">Second Term</option>
                    <option value="Third Term">Third Term</option>
              </select>
       </div>
   </div>
   <div class="col-sm-6">
   <table class="table table-bordered">
   <tr>
   <td>Select</td>
   <td>Subject</td>
   </tr>
     <?php
$query ="SELECT * FROM subject";
   $sql= mysqli_query($conn,$query) or die(mysqli_query($conn));
   if(mysqli_num_rows($sql) != 0){
    $i = 0;
    while ($r=mysqli_fetch_assoc($sql)) {
      $i ++;
      echo"<tr>
      <td><input type=\"checkbox\" name=\"check[$i]\"  id=\"check[$i]\" value=\"$i\" />
       <input type='hidden' name='sub[$i]' value='".$r['subject_id']."'>
      </td>
      <td>".$r['subject_name']."</td></tr>";

    }
   }

     ?>

</table>
   </div>
   <div class="col-sm-12"><input type="submit" name="submit" id="sub" value="Register Subjects" class="btn btn-success"></div>
</form>          
</div>




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
      $("#sub").click(function(){
            
      
      var  session =$("#yearsession").val();
      var  c =$("#class_option").val();
      var  term =$("#term").val();
      

           

             if(session == "" ){

                  alert("Year / session field is required");
                  
                  return false;
            }
             if(c == ""){

                  alert("class Type field is required");
                  
                  return false;
            }
             if(term == ""){

                  alert("select term field required");
                  
                  return false;
            }

            
      });
    });
</script>





        