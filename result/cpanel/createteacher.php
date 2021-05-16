<?php  include_once"../function/include.php";  
       include_once"adminFunction.php";

admincheck();

$conn =db();
if(isset($_POST["CreateTeacher"])){
 $surname = cleansql(strtoupper($_POST['surname']));
$firstname = cleansql(strtoupper($_POST['firstName']));
$othername = cleansql(strtoupper($_POST['OtherName']));
$username =cleansql( $_POST['username']);
$password =cleansql( $_POST['password']);
$classname= cleansql($_POST['class']);
$classType =cleansql($_POST['classcat']);
$mydate = date("Y-m-d");


if(isset($_POST['CreateTeacher'])){

            
$queryab = "SELECT * from  teacher WHERE username = '$username' || (class_id = '$classname' && class_category_id ='$classType')";
$sqlab = mysqli_query( $conn, $queryab) or die(mysqli_error($conn));
      
      if(mysqli_num_rows($sqlab) < 1){ 
      
      $query2ab = "INSERT INTO teacher (`class_id`,`class_category_id`,`username`,`password`,`surname`,`firstname`,`othername`,`date_created`,`status1`) VALUES('$classname','$classType','$username','$password','$surname','$firstname','$othername','$mydate',1)";
      //echo $query2ab;
      $query2ab = mysqli_query( $conn, $query2ab) or die(mysqli_error($conn));
      
      if ($query2ab)  {
           // $msg = "<p class='success'>Teacher Account Successfully Added</p>";
      //$msg = '<div class="info">Examiner\'s Account Successfully 
        header('location:ViewTeacher.php?s=1');
      }else{

          $msg = "<p class='error'>Failed : Teacher Account could not be added. please try again</p>";

      }
}else{
      
      $r=mysql_fetch_assoc($sqlab);

      if($r['username'] = $username){
     
     $msg = "<p class='error'>Failed : The <b>username</b> has been assign to a Teacher. choose another username</p>";
     }else{
       $msg = "<p class='error'>Failed : A class teacher is already  assign to this class.</p>";
     }  
}

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
	

      <div class="col-sm-12 whitecolor">
        <?php  if(!empty($msg)){ echo $msg;} ?>

         <div class="col-sm-12 headbanner">Add New Class Teacher <a href="ViewTeacher.php" class="btn btn-danger btn-sm navbar-right">Back To Teacher</a></div>
    
     <form class="form-group" action="createteacher.php" method="post">
         <div class="col-sm-12 formBg2" style="margin-top:10px;margin-bottom:10px;">
              <div class="col-sm-6 form-group">
                  <label>Class Name</label> 
                  <select class="form-control" name="class" id="class">

                        <option value="">-------   Pick a Class Name   -------</option>
                         <?php
                            $ac = mysqli_query($conn, 'SELECT * FROM class');
                          while( $l=mysqli_fetch_assoc($ac) ) {
                                    
                        ?>
                            <option value="<?php echo $l['class_id']; ?>"><?php echo $l['class_name'];?></option>
                            
                      <?php } ?>

                  </select>
            </div>
              <div class="col-sm-6 form-group"><label>Class Category</label> <select class="form-control" name="classcat" id="classcat">
                    <option value="">---Pick a Department---</option>

              </select> </div>
          </div>

          <div class="col-sm-12 formBg">
              <div class="col-sm-4 form-group">
                  <label> Surname</label>
                  <input name="surname" class="form-control" id="surname" type="text" placeholder="Teacher First Name"> 
             </div>
              <div class="col-sm-4 form-group">
                  <label>First Name</label> 
                  <input name="firstName" class="form-control" type="text" id="firstname" placeholder="Teacher Last Name"> 
             </div>
              <div class="col-sm-4 form-group">
                  <label>Other Name &nbsp;<span style="color:red;">(not compulsary)</span></label> 
                  <input name="OtherName" class="form-control" type="text" placeholder="Teacher Other Name"> 
             </div>
          </div>

          <div class="col-sm-12 formBg2">
              <div class="col-sm-4 form-group">
                  <label>username&nbsp;<span style="color:red;">(unique)</span></label>
                  <input name="username" value="" class="form-control" type="text" id="username"> 
             </div>
              <div class="col-sm-4 form-group">
                  <label>Password</label> 
                  <input name="password" class="form-control" type="password" placeholder="Enter Password" id="password"> 
             </div>
              <div class="col-sm-4 form-group">
                  <br/>
                  <input name="CreateTeacher" class="btn btn-success" type="submit" value="Create Teacher" id="createTeacher"> 
             </div>
          </div>

     </form>
   </div>
 </div>

       	

       </div>
       <?php
       footer2();
       ?>

        <script type="text/javascript">
     $(document).ready(function(){
      $("#createTeacher").click(function(){
            
      var  surname =$("#surname").val();
      var  firstname =$("#firstname").val();
      var  classname =$("#class").val();
      var  classcat =$("#classcat").val();
      var  username =$("#username").val();
      var  password =$("#password").val();

            if(surname == ""){

                  alert("Surname can not be empty");
                  
                  return false;
            }

             if(firstname == ""){

                  alert("First Name can not be empty");
                  
                  return false;
            }

             if(classname == "" ){

                  alert("Class Name field is required");
                  
                  return false;
            }
             if(classcat == ""){

                  alert("class Type field is required");
                  
                  return false;
            }
             if(username == ""){

                  alert("username field required");
                  
                  return false;
            }

             if(password == ""){

                  alert("Enter password");
                  
                  return false;
            }

      });




//  ============= script to get class category or type when a class name is selected    =========

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

});




       </script>