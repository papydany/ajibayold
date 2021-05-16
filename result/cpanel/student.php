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
    ?>
  <div class="col-sm-12 whitecolor">
    <?php
    if(isset($_GET['es'])){
      
      if($_GET['es'] == 1){
        echo" <p class='text-success'> Edith Of Student Record Successfull .</p>";
      }elseif($_GET['es'] == 0){
          echo" <p class='text-danger'>Edith  Of Student not Successfull.Please try again.</p>";
      }


    }


    ?>
    <div class="col-sm-12 headbanner">View Register Students<a href="addstudent.php" class="btn btn-danger btn-sm navbar-right">Add Students</a></div>
  <div class="col-sm-12 formBg2" style="margin-bottom:20px;">
       <form class="form-group" method="post" action="student.php">

        <div class="col-sm-3">    
        <label>Class</label> <select class='form-control' name='class' id='class'>

                        <option value=''>-----  choose a class   -------</option>";
                         
                         <?php   $ac = mysqli_query($conn, 'SELECT * FROM class');
                          while( $l=mysqli_fetch_assoc($ac) ) {
                                    
                        ?>
                            <option value="<?php echo $l['class_id']; ?>"><?php echo $l['class_name'];?></option>
                            
                      <?php } ?>

                  </select></div>
      <div class="col-sm-3">
        <label>Sub Class</label><select class="form-control" name="classcat" id="classcat">
                    <option value="">--  choose a sub class ---</option>

              </select></div>

     <div class="col-sm-3">    
        <label>Class Type</label> <select class='form-control' name='school' id='schooll'>

                        <option value=''>choose a class type</option>
                         
                         <?php   $ac = mysqli_query($conn, 'SELECT * FROM class_option');
                          while( $l=mysqli_fetch_assoc($ac) ) {
                                    
                        ?>
                            <option value="<?php echo $l['class_option_id']; ?>"><?php echo $l['class_option_name'];?></option>
                            
                      <?php } ?>

                  </select></div>              



               <div class="col-sm-3">
                      <label>Student Status</label><select class="form-control" name="status" id="status">
                    <option value="">student status</option>
                     <option value="present">present</option>
                      <option value="absent">absent</option>
              </select></div>

              <div class="col-sm-12">
                  <br/> <input type="submit" id="viewstudent" value="submit" name="submit" class="btn btn-success">
              </div>

       </form>

  </div>
<?php
if(isset($_POST['submit'])){

       //$query ="select * from student_profile";
  $query="SELECT DISTINCT student_profile.student_id, student_profile.student_no,student_profile.surname,student_profile.firstname,student_profile.othername,student_profile.gender FROM student_profile WHERE `student_profile`.`class_category_id` ='".$_POST['classcat']."' && `student_profile`.`class_id`='".$_POST['class']."' && student_profile.status = '".$_POST['status']."' && student_profile.class_option_id = '".$_POST['school']."' ORDER BY `student_profile`.`student_no`";


   //  $query="SELECT DISTINCT student_profile.student_id, student_profile.student_no,student_profile.surname,student_profile.firstname,student_profile.othername,student_profile.gender,category_of_class.class_category_name,class.class_name FROM student_profile LEFT JOIN category_of_class ON `student_profile`.`class_category_id` ='".$_POST['classcat']."' LEFT JOIN class ON `student_profile`.`class_id`='".$_POST['class']."' WHERE student_profile.status = '".$_POST['status']."' && student_profile.class_option_id = '".$_POST['school']."' ORDER BY `student_profile`.`student_no`";
   //  echo $query;
     $sql=mysqli_query($conn,$query) or die(mysqli_query($conn));

     if(mysqli_num_rows($sql) == 0){

      echo"<p>&nbsp;</p><p class='error'> No students is available.</p>";
     }else{

      /* $query1 =" select category_of_class.class_category_name, class.class_name from class INNER JOIN category_of_class ON category_of_class.class_id=class.class_id  where category_of_class.class_category_id ='".$_POST['classcat']."' &&  class.class_id = '".$_POST['class']."'";
//echo $query1;
       $q = mysqli_query($conn,$query1) or die(mysqli_query($conn));
       $c =mysqli_fetch_assoc($q);*/
       $c =select_class($_POST['class']);
       $sc =select_subclass($_POST['classcat']);
       $ct = select_class_type($_POST['school']);
      $sn =0;

        $to =mysqli_num_rows($sql);
      echo"<div class='col-sm-12' style='background-color:#ccc;padding-top:10px;'><p>

      <b>Class  &nbsp;&nbsp;</b>".$c['class_name']."";
      if($sc['class_id'] > 1){ echo":".$sc['class_category_name']."";}
    echo "&nbsp;&nbsp;&nbsp;&nbsp;<b>Number Of Students :&nbsp;</b>".$to."
         &nbsp;&nbsp;&nbsp;&nbsp;<b>Class Type :&nbsp;</b>".$ct['class_option_name']."
      </p></div>";

      echo "<table class='table table-striped table-bordered'>
      <tr class='success'><th>S/N</th>
      <th> Class Number </th>
      <th> Surname </th>
      <th>First Name</th>
      <th>Other Name</th>
      
      <th>SEX</th>
     
      <th colspan='2'>Action</th></tr>";
    
      //echo $to;
      
     
     while ($r = mysqli_fetch_assoc($sql)) {
    
    $sn++;
     echo"<tr> <td>$sn</td>
     <td>".$r['student_no']."</td>
      <td>". $r['surname']." </td>
      <td>".$r['firstname']."</td>
      <td>".$r['othername']."</td>
      
      <td>".$r['gender'].'</td>
      
       <td><a href="edit_student.php?s='.$r['student_id'].'" class="btn btn-success btn-xs">Edit</a></td>
      <td><a href="#" class="btn btn-danger btn-xs">Delete</a></td></tr>';
      //<td><a href="delete.php?student='.$r['student_id'].'" class="btn btn-danger btn-xs">Delete</a></td></tr>';
           # code...
     }
echo "</table>";

     }
   }
       ?>
</div>
<div>

       	</div>

       </div>

<?php
       footer2();
       ?>



<script type="text/javascript">
     $(document).ready(function(){
      $("#viewstudent").click(function(){
            
      
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