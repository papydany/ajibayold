<?php  include_once"../function/include.php";  
       include_once"adminFunction.php";
       admincheck();
       include_once"../function/headerTop.php";
       top();
       linkToBoostrap();
       navigation(); 
       section2();
       $conn =db();
       ?>

      <div class="row bc">
       <?php  leftnavigation(); ?>
       	
       	<div class="col-sm-10">
	<?php 
	echo'<div class="col-sm-12 whitecolor">
	  <div class="col-sm-12 headbanner">School Subjects <a href="addSubject.php" class="btn btn-danger btn-sm navbar-right">Add New Subject</a></div>';
	
   
   $query ="SELECT * FROM subject";
   $sql= mysqli_query($conn,$query) or die(mysqli_query($conn));
   if(mysqli_num_rows($sql) != 0){

   	$sn =0;
      echo "<table class='table table-striped table-bordered'>
      <tr class='success'><th>S/N</th>
     
      <th>Subject Name</th>
      
      <th colspan='2'>Action</th></tr>";

      while ($r=mysqli_fetch_assoc($sql)) {
      	# code...
       $sn++;
     echo"<tr> <td>$sn</td>
   
      <td>".$r['subject_name'].'</td>
      <td><a href="edit.php?s='.$r['subject_id'].'" class="btn btn-success btn-xs">Edit</a></td>
      <td><a href="delete.php?s='.$r['subject_id'].'" class="btn btn-danger btn-xs">Delete</a></td></tr>';
           # code...
     }
echo "</table>";

   }
   



	?>
</div>
</div>
</div>
<?php
       footer2();
       ?>