<?php  include_once"../function/include.php";  
       include_once"adminFunction.php";

      admincheck();

$conn = db();


 if(isset($_POST['update'])){


 /* var_dump($_POST['c']);
var_dump($_POST['ct']);
var_dump($_POST['Teacher_id']);
exit();*/
       if($_POST['Teacher_id']){
        $query ="UPDATE teacher SET class_id ='".$_POST['c']."', class_category_id ='".$_POST['ct']."' WHERE Teacher_id='".$_POST['Teacher_id']."'";

       // echo $query;
       $sql = mysqli_query($conn,$query) or die(mysqli_error($conn));

if($sql){

 
     header('location:ViewTeacher.php');
}else{ echo "string";}


       
       } }



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
    <div class="col-sm-12 headbanner">Reasign Class Teacher <a href="ViewTeacher.php" class="btn btn-danger btn-sm navbar-right">Back To Class Teacher</a></div>';


     $query="SELECT `teacher`.`Teacher_id`,`teacher`.`surname`,`teacher`.`firstname`,`teacher`.`othername` FROM teacher WHERE `teacher`.`status1`='1' ORDER BY `teacher`.`class_id`";
     
     $sql=mysqli_query($conn,$query) or die(mysqli_query($conn));

     if(mysqli_num_rows($sql) != 0){
      $sn =0;

       echo "
      <table class='table table-striped table-bordered'>
      <form class='form-group' method='post' action='classTeacher.php'>";
      ?>

      <div class="col-sm-12 formBg" style="padding-top:15px; margin-top:5px;">
        <div class="col-sm-6">     <select class='form-control' name="c" id="class">

                        <option value="">-----  choose a class   -------</option>";
                         
                         <?php   $ac = mysqli_query($conn, 'SELECT * FROM class');
                          while( $l=mysqli_fetch_assoc($ac) ) {
                                    
                        ?>
                            <option value="<?php echo $l['class_id']; ?>"><?php echo $l['class_name'];?></option>
                            
                      <?php } ?>

                  </select></div>
      <div class="col-sm-6"><select class="form-control" name="ct" id="classcat">
                    <option value="">--  choose a sub class ---</option>

              </select></div>
              </div>
      <?php
      
     echo"
      <tr class='success'><th>S/N</th>
      <th> Surname </th>
      <th>First Name</th>
      <th>Other Name</th>
     
      
      <th>Choose Teacher</th></tr>";
     
     while ($r = mysqli_fetch_assoc($sql)) {
    
    $sn++;
     echo"<tr> <td>$sn</td>
      <td>". $r['surname']." </td>
      <td>".$r['firstname']."</td>
      <td>".$r['othername']."</td>";
     
      echo' <td><input type="radio" id="radio" name="Teacher_id" value="'.$r['Teacher_id'].'"></td></tr>';
           # code...
     }

echo "<tr>
<td colspan='5'>
    <div class='col-sm-12 formBg2'>
      <input type='submit' name='update' id='update' value='Reasign Teacher' class='btn btn-warning'>
      </td>
      </tr>
      </form></table>
";
}

       ?>

       	</div>

       </div>

<?php
       footer2();
       ?>



<script type="text/javascript">

$(document).ready(function(){
       $("#classcat").show();

$("#class").change( function() {
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



$("#update").click(function(){
            
      var  radio =$("input[name='Teacher_id']:checked").val();
    
           if(!radio){

                  alert("you must choose a teacher for Reasignment");
                  
                  return false;
            }

            if($('#class').val() == ""){
              alert('you need to select a class to assign to a teacher');
              return false;
            }

            if($('#classcat').val() == ""){
              alert('you need to select a class subclass to assign to a teacher');
              return false;
            }
     });

});




       </script>