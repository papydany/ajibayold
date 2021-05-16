<?php  include_once"../function/include.php";  
       include_once"adminFunction.php";
       admincheck();
      
      

        $conn =db();
       if(isset($_POST['update'])){
        $query ="UPDATE teacher SET surname ='".strtoupper($_POST['surname'])."',firstname ='".strtoupper($_POST['firstname'])."',othername ='".strtoupper($_POST['othername'])."',password ='".$_POST['password']."' WHERE Teacher_id='".$_POST['Teacher_id']."'";
       $sql = mysqli_query($conn,$query) or die(mysqli_error($conn));

       header('location:ViewTeacher.php');

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
         <div class="col-sm-12 headbanner">Edit Class Teacher Details <a href="ViewTeacher.php" class="btn btn-danger btn-sm navbar-right">Back To Teacher</a></div>';

         if(isset($_GET['s'])){
             

              $query="SELECT * FROM teacher WHERE Teacher_id='".$_GET['s']."'";
              $sql=mysqli_query($conn,$query) or die(mysqli_error($conn));
              if(mysqli_num_rows($sql) != 0){
                while($r=mysqli_fetch_assoc($sql)){


                     echo'<div class="col-sm-12 formBg" style="padding-top:15px;">

                    
                     <form class="form-group" method="post" action="edit_teacher.php">
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
                     <label>Password:</label>
                    <input type="text" class="form-control" name="password" value="'.$r['password'].'"/></div>';

                    


                     



                       echo'<div class="col-sm-12"><input type="hidden" class="form-control" name="Teacher_id" value="'.$r['Teacher_id'].'"/></div><br/><br/>

                       <div class="col-sm-12">
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