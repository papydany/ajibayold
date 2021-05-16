<?php  include_once"../function/include.php";  
       include_once"adminFunction.php";
       admincheck();
      
      

        $conn =db();
       if(isset($_POST['update'])){
        $query ="UPDATE student_profile SET surname ='".strtoupper($_POST['surname'])."',firstname ='".strtoupper($_POST['firstname'])."',othername ='".strtoupper($_POST['othername'])."',class_option_id ='".$_POST['school']."',gender ='".$_POST['gender']."' WHERE student_id='".$_POST['student_id']."'";
       $sql = mysqli_query($conn,$query) or die(mysqli_error($conn));
       if($sql){
       header('location:student.php?es=1');
     }else{
      header('location:student.php?es=0');
     }

       }
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

        echo'<div class="col-sm-12 whitecolor">
         <div class="col-sm-12 headbanner">Edit Student Details <a href="student.php" class="btn btn-danger btn-sm navbar-right">Back To Student</a></div>';

         if(isset($_GET['s'])){
             

              $query="SELECT * FROM student_profile WHERE student_id='".$_GET['s']."'";
              $sql=mysqli_query($conn,$query) or die(mysqli_error($conn));
              if(mysqli_num_rows($sql) != 0){
                while($r=mysqli_fetch_assoc($sql)){


                     echo'<div class="col-sm-12 formBg" style="padding-top:15px;">

                    
                     <form class="form-group" method="post" action="edit_student.php">
                     <div class="col-sm-6 form-group">
                     <label>Surname:</label>
                     <input type="text" class="form-control" name="surname" value="'.$r['surname'].'"/></div>
                    
                    <div class="col-sm-6 form-group">
                    <label>First Name:</label>
                    <input type="text" class="form-control" name="firstname" value="'.$r['firstname'].'"/></div>

                    <div class="col-sm-6 form-group">
                     <label>Other Name:</label>
                   <input type="text" class="form-control" name="othername" value="'.$r['othername'].'"/></div>
                    
                    <div class="col-sm-6 form-group">
                     <label>Sex:</label>
                    <select class="form-control" name="gender">
                   <option value="male">Male</option>
                   <option value="female">Female</option>


                    </select>
                     </div>';

                    


                     



                       echo'<div class="col-sm-12"><input type="hidden" class="form-control" name="student_id" value="'.$r['student_id'].'"/></div>
                <div class="col-sm-6">    
        <label>Class Type</label> <select class="form-control" name="school" id="school">

                        <option value="">choose a class type</option>';
                         
                            $ac = mysqli_query($conn, 'SELECT * FROM class_option');
                          while( $l=mysqli_fetch_assoc($ac) ) {
                                    
                        ?>
                            <option value="<?php echo $l['class_option_id']; ?>"><?php echo $l['class_option_name'];?></option>
                            
                      <?php } ?>

                  </select></div>
                    <br/><br/> <div class="col-sm-6">
                       <input type="submit" class="btn btn-warning " name="update" value="Update Student Profile"/></div>
                       </form></div>';
                       <?php

              }
       }





         }
       ?>
</div>
       	</div>

       </div>

<?php
       footer2();
       ?>