<?php  include_once"../function/include.php";  
       include_once"adminFunction.php";
       admincheck();
      include_once"../function/headerTop.php";

/*   ============    top header and links to css function ==========       */ 
           top();
           
           linkToBoostrap();

            navigation2();
           section2();
 
           $conn =db();
           if(isset($class)){
           $class = cleansql($_POST['class']);
         }
         if(isset($class_cat)){
           $class_cat = cleansql(strtoupper($_POST['class_cat']));
         }

          if(isset($_POST['addclass_cat']) && ($class != " " && $class_cat != " ")){
      
           $queryab = "SELECT * FROM category_of_class WHERE class_category_name = '". $class_cat. "' && class_id ='".$class."'";
          $sqlab = mysqli_query( $conn, $queryab) or die(mysqli_error($conn));
      
         if(mysqli_num_rows($sqlab) < 1 ){
      
         $query2ab = "INSERT INTO category_of_class(class_category_name,class_id) VALUES('$class_cat','$class')";
         $query2ab = mysqli_query( $conn, $query2ab) or die(mysqli_error($conn));
      
      if ($query2ab) {
      $msg = '<div class="success">Class category Successfully Added</div>';
         }else{
               $msg = '<div class="error">Failed: Class category not Added.please try again.</div>';

         }
      
     
      
      }else{
            
            $msg = '<div class="exist">Class Category already exists!</div>';
      }
      
} 

          ?>
 <div class="row bc">
      <?php  leftnavigation(); // left navigation function ?>
       	
      <div class="col-sm-10">
	    <?php  // top navigation?>


 <!--  ==============================  jquery script tocheck if the is empty ======================== -->    
       <script type="text/javascript">
     $(document).ready(function(){
      $("#addclass_cat").click(function(){
            var classname =$("#class").val();
             var class_cat =$("#class_cat").val();
           
            if(classname == ""){

                  $("#classinfo").fadeIn();
                  
                  return false;
            }else{

                  $("#classinfo").fadeOut();
            }

             if(class_cat == ""){

                  $("#class_catinfo").fadeIn();
                  
                  return false;
            }else{

                  $("#class_catinfo").fadeOut();
            }

      });



     });

       </script>
       <!--   =======================end of jquery scripts ==================== -->
       


          <div class="col-sm-12">

                 
           <div class="col-sm-12 whitecolor">
           <div class="col-sm-12 headbanner">Class Created<a href="addclass.php" class="btn btn-danger btn-sm navbar-right">Add New Class</a></div>
               



            <?php

        $query="SELECT `class`.`class_name` FROM class  ORDER BY `class`.`class_id`";
     
     $sql=mysqli_query($conn,$query) or die(mysqli_query($conn));

     if(mysqli_num_rows($sql) != 0){
      $sn =0;
      echo "<table class='table table-striped table-bordered'>
      <tr class='success'><th>S/N</th>
      <th> Class </th>
      
      
      <th>Action</th></tr>";
     
     while ($r = mysqli_fetch_assoc($sql)) {
    
    $sn++;
     echo"<tr> <td>$sn</td>
      
      <td>".$r['class_name']."</td>
     
       <td><a href='#'' class='btn btn-success btn-xs'>Edit</a></td>
      </tr>";
           # code...
     }
echo "</table>";

     }else{
      echo"<p class='success'> No class has been created .click add new class.</p>";
     }


            ?>
          </div>
        </div>
      </div>
</div>
       <?php
       footer2();
       ?>