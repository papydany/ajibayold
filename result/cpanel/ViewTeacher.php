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

     //$query="SELECT `teacher`.`Teacher_id` ,`teacher`.`username`,`teacher`.`password`,`teacher`.`surname`,`teacher`.`firstname`,`teacher`.`othername`,category_of_class.`class_category_name` FROM teacher LEFT JOIN category_of_class ON category_of_class.`class_category_id` =`teacher`.`class_category_id`";
    
  echo'<div class="col-sm-12 whitecolor">
    <div class="col-sm-12 headbanner">Class Teacher <a href="createteacher.php" class="btn btn-danger btn-sm navbar-right">Add New Class Teacher</a></div>';


     $query="SELECT `teacher`.`Teacher_id`, `teacher`.`username`,`teacher`.`password`,`teacher`.`surname`,`teacher`.`firstname`,`teacher`.`othername`,`category_of_class`.`class_category_name`,`class`.`class_name` FROM teacher LEFT JOIN category_of_class ON `category_of_class`.`class_category_id` =`teacher`.`class_category_id` LEFT JOIN class ON `class`.`class_id` = `teacher`.`class_id` ORDER BY `teacher`.`class_id`";
     
     $sql=mysqli_query($conn,$query) or die(mysqli_query($conn));

     if(mysqli_num_rows($sql) != 0){
      $sn =0;
      echo "<table class='table table-striped table-bordered'>
      <tr class='success'><th>S/N</th>
      <th> Surname </th>
      <th>First Name</th>
      <th>Other Name</th>
      <th> Username </th>
      <th>Password</th>
      <th>Class</th>
      <th>Class Type</th>
      <th colspan='2'>Action</th></tr>";
     
     while ($r = mysqli_fetch_assoc($sql)) {
    
    $sn++;

    if(($sn % 2)== 0){
  echo"<tr class='warning'>";

}else{
echo"<tr class='danger'>";
}
     echo" <td>$sn</td>
      <td>". $r['surname']." </td>
      <td>".$r['firstname']."</td>
      <td>".$r['othername']."</td>
      <td>".$r['username']."</td>
      <td>".$r['password']."</td>
      <td>".$r['class_name']."</td>
      <td>".$r['class_category_name'].'</td>
       <td><a href="edit_teacher.php?s='.$r['Teacher_id'].'" class="btn btn-success btn-xs">Edit</a></td>
      <td><a href="delete.php?i='.$r['Teacher_id'].'" class="btn btn-danger btn-xs">Delete</a></td></tr>';
           # code...
     }
echo "</table>";

     }else{
      echo"<p class='success'> No class Teacher present.click add class teacher button to create teachers.</p>";
     }


?>
      </div>
    </div>
    <div>
</div>


      


 <?php
       footer2();
       ?>

       
       