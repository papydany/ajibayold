<?php  include_once"../function/include.php";  
       include_once"adminFunction.php";

      admincheck();
        $conn =db();
       if(isset($_POST['update'])){
        $query ="UPDATE subject SET subject_name ='".strtoupper($_POST['editsubject'])."' WHERE subject_id='".$_POST['subject_id']."'";
       $sql = mysqli_query($conn,$query) or die(mysqli_error($conn));

       header('location:subject.php');

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
         <div class="col-sm-12 headbanner">Edit Subjects <a href="subject.php" class="btn btn-danger btn-sm navbar-right">Back To Subject</a></div>';

         if(isset($_GET['s'])){
             

              $query="SELECT * FROM subject WHERE subject_id='".$_GET['s']."'";
              $sql=mysqli_query($conn,$query) or die(mysqli_error($conn));
              if(mysqli_num_rows($sql) != 0){
                while($r=mysqli_fetch_assoc($sql)){


                     echo'<div class="col-sm-12 formBg" style="margin-top:10px;">
                     <form class="form-group" method="post" action="edit.php">
                     
                     <label class="col-sm-4   control-label" style="margin-top:10px;">Subject Name:</label>
                    <div class="col-sm-8"  style="margin-top:10px;"> <input type="text" class="form-control" name="editsubject" value="'.$r['subject_name'].'"/></div><br/>';

                       echo'<div class="col-sm-12"><input type="hidden" class="form-control" name="subject_id" value="'.$r['subject_id'].'"/></div><br/><br/>

                       <div class="col-sm-8 col-sm-offset-4">
                       <input type="submit" class="btn btn-warning btn-xs" name="update" value="Update"/></div>
                       </form></div>';

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