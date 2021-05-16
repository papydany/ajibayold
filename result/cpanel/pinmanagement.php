<?php  include_once"../function/include.php";  
       include_once"adminFunction.php";
include_once"../function/headerTop.php";

  // admincheck();
       top();
       
       linkToBoostrap();
       navigation2();
       section2();
     $conn=db();

       if(isset($_POST['generate'])){
              $term =$_POST['term'];
              $year =$_POST['year'];
              $yearplus =$year + 1;
             // var_dump($term);

              $q="SELECT  DISTINCT student_id from student_reg where subject_term ='$term' && session='$year'";
              
              $r=mysqli_query($conn,$q) or die (mysqli_error($conn));

              if(!$r){
                     echo "student reg fail";
              }
              
            
              if(mysqli_num_rows($r) != 0){
              $c =count($r);
             while($f =mysqli_fetch_assoc($r)){
              $std_id =$f['student_id'];

              for($i = 0; $i < $c; $i++){
     $pin = generate_random_password($length = 10);

        



              $sp="UPDATE student_profile set pin ='$pin', pin_term='$term',pin_year='$year' where student_id='$std_id' && status='present'";
              $up=mysqli_query($conn,$sp);
       }
}
              if($up){
                     $msg="<p class='success'> Pin successfull generated for ".$term. "in " .$year." / ".$yearplus.  " session</p>";
              }else{
                     $msg="<p class='error'>failed: Pin generation not successfull.please try again or contact your support team</p>"; 
              }

            


      }
       }
       ?>

       <div class="row bc">
       <?php  leftnavigation(); ?>
       	
       	<div class="col-sm-10">
                     <div class="col-sm-12 headbanner2">Welcome <?php echo $_SESSION['admin_surname']; ?>  </div>
                     <div class="col-sm-12 whitecolor">
                       <div class="col-sm-12 teachheader">
              Pin Management


            
      </div>
      <div class="col-sm-7 nopaddling formBg" style="padding-top:25px;">
       <?php
       if(!empty($msg)){
              echo $msg;
       }
              ?>
      <form action="pinmanagement.php" method="POST" class=" form-group">

       <div class="col-sm-12 form-group">
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
       <div class="col-sm-12 form-group">
       <label>Select Term</label>
              <select class="form-control" name="term" id="term">
                    <option value=""> Select Academic Term</option>
                    <option value="First Term">First Term</option>
                    <option value="Second Term">Second Term</option>
                    <option value="Third Term">Third Term</option>
              </select>
       </div>
       <div class="col-sm-12">
              <input type="submit" name="generate" value="Generate Pin" class="btn btn-danger">
       </div>

      </form>
      
</div>
<div class="col-sm-4 col-sm-offset-1 nopaddling formBg" style="padding-top:25px;">
   <form action="generatepin.php" method="POST" class=" form-group" target="_blank">
     <div class="col-sm-12 form-group">
      <label>Select Class</label>
    <select class='form-control' name="c" id="c">

                        <option value="">-----  Select  class   -------</option>";
                         
                         <?php   $ac = mysqli_query($conn, 'SELECT * FROM class');
                          while( $l=mysqli_fetch_assoc($ac) ) {
                                    
                        ?>
                            <option value="<?php echo $l['class_id']; ?>"><?php echo $l['class_name'];?></option>
                            
                      <?php } ?>

                  </select>
                </div>
                 <div class="col-sm-12 form-group">
       <input type="submit" id="print" Value="Print Pin" class="btn btn-danger btn-block"/>
     </div>
       </div>
</div>
	
       	</div>

       </div>

<?php

 function generate_random_password($length = 10){
    $alphabets = range('A','Z');
    $numbers = range('1','9');
    
    $final_array = array_merge($alphabets,$numbers);
         
    $password = '';
  
    while($length--) {
      $key = array_rand($final_array);
      $password .= $final_array[$key];
    }
  
    return $password;
  }
       footer2();
       ?>
       <script type="text/javascript">
       $(document).ready(function(){
        $('#print').click(function(){
          if($('#c').val() ==""){
            alert('you have not select a class');
            return false;
          }

        });

       });


       </script>