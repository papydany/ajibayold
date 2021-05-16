<?php  include_once"../function/include.php";  
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
      <?php  

      $conn = db();

       if(isset($_GET['s'])){

      if($_GET['s'] = 1){

       echo" <div class'col-sm-10 col-sm-offset-1'>
       <p class='success'>  Teacher successfull registered.</p></div>";
      }


       }

     ?>
    
  <div class="col-sm-12 whitecolor">
    <div class="col-sm-12 headbanner">View Registered Subjects <a href="registersubject.php" class="btn btn-danger btn-sm navbar-right">Back To Register Subjects</a></div>

<div class="col-sm-12 formBg" style="margin-top:15px;">
       <form class="form-group" method="post" action="viewregistersubject.php">

     <div class="col-sm-4">
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

     <div class="col-sm-4">    
       <label>Class Type</label>
       <select class='form-control' name='class_option' id='class_option'>
          <option value=''>choose a class type</option>
         
          <?php   $ac = mysqli_query($conn, 'SELECT * FROM class_option');
          while( $l=mysqli_fetch_assoc($ac) ) {
          
          if($l['class_option_id'] > 1){
            ?>
          
         <option value="<?php echo $l['class_option_id']; ?>"><?php echo $l['class_option_name'];?>&nbsp; ONLY</option>
          <?php }} ?>
        </select>
     </div>
     <div class="col-sm-4 form-group">
       <label>Select Term</label>
              <select class="form-control" name="term" id="term">
                    <option value=""> Select Academic Term</option>
                    <option value="First Term">First Term</option>
                    <option value="Second Term">Second Term</option>
                    <option value="Third Term">Third Term</option>
              </select>
       </div>
   
    <div class="col-sm-12"><input type="submit" name="submit" id="sub" value=" View Registered Subjects" class="btn btn-success"></div>
</form>          
</div>
<?php
if(isset($_POST['submit'])){
  $c = 0;
  $class_option =$_POST['class_option'];
  $year =$_POST['year'];
  $term =$_POST['term'];
$query ="SELECT subject.subject_name FROM all_subject,subject WHERE all_subject.subject_id = subject.subject_id && all_subject.class_option IN('$c', '$class_option') && all_subject.subject_term ='$term' && all_subject.subject_year ='$year' order by class_option";
//echo $query;

 $sql=mysqli_query($conn,$query) or die(mysqli_error($conn));

 if(mysqli_num_rows($sql) != 0){

$sn =0;

 $registersubject = mysqli_query($conn, "SELECT class_option_name FROM class_option WHERE class_option_id ='$class_option'");
 
 $fetch_registersubject=mysqli_fetch_assoc($registersubject);  

echo "<div class='row col-sm-12 text-success'>";
echo"<h4>Registered Subject for ". $fetch_registersubject['class_option_name']."</h4>";
echo"</div>";
echo "<table class='table table-striped table-bordered'>
      <tr class='success'>
      <th>S/N</th>
      <th> Subjects </th>";

    while ($r = mysqli_fetch_assoc($sql)) {
    $sn++;
  if(($sn % 2)== 0){
  echo"<tr class='warning'>";
}else{
echo"<tr class='danger'>";
}
echo" <td>$sn</td>
      <td>". $r['subject_name']." </td>
      </tr>";
    }
    echo"</table>";
  }else{
    echo"<div class='col-sm-12 row'>";
    echo"<p class='text-danger'>No register Subjects is available for this term.</p>";
    echo"</div>";

  }
    
}
     
?>
      </div>
    </div>
    <div>
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
   
       