<?php  include_once"../function/include.php";  
       include_once"adminFunction.php";
       admincheck();
       include_once"../function/headerTop.php";

/* ================================      addclass process script ====================*/
      
       if(isset($_POST['addclass'])){
      
            $conn=db();

       $addclass =cleansql(strtoupper($_POST['class']));
       if($addclass !=""){
     $sel="SELECT * from class where class_name='$addclass'";
     $find =mysqli_query($conn,$sel) or die(mysqli_error($conn));
     if(mysqli_num_rows($find) == 0){

       $query="insert into class(class_id, class_name) values('','$addclass')";
      $insert= mysqli_query($conn, $query) or die(mysqli_error($conn));

      if($insert){
           $message="<p class='success'>  class was successfully created.</p>";
      }else{
            $message="<p class='error'> Failed: class was not  created. please try again later.</p>";
      }
}else{ $message ="<p class='exist'>these class exist in the database. Thank you.</p>";}
}
}
/*   ======================End of process script      ========================*/

     
  /*   ============    top header and links to css function ==========       */     
         top();
         linkToBoostrap();
        navigation2();
           section2();
 

/*    =========================   End=======================================*/
?>
<!--  ==============================  jquery script tocheck if the is empty ======================== -->
     
       <script type="text/javascript">
     $(document).ready(function(){
      $("#addclass").click(function(){
            var classname =$("#class").val();
      

            if(classname == ""){

                  $("#classinfo").fadeIn();
                  
                  return false;
            }else{

                  $("#classinfo").fadeOut();
            }

      });



     });

       </script>
       <!--   =======================end of jquery scripts ==================== -->
       

      <div class="row bc">
                  <?php  leftnavigation(); // left navigation function   ?>
       	
             <div class="col-sm-10">
	            
          
                   

                          <?php  
                             //====== status report from the server
                                if(!empty($message)){

                                echo $message;

                                 }

                              ?>
           <div class="col-sm-12 whitecolor">
           <div class="col-sm-12 headbanner" style="margin-bottom:15px;">Add New Class<a href="addclasscategory.php" class="btn btn-danger btn-sm navbar-right">Go Back </a></div>
                         <form action="addclass.php" method="post" class="form-group">
                                <div class="col-sm-12 formBg">
                                  <div class="col-sm-8">
                                      <label>Class Name</label>
                                       <input name="class" id="class" type="text" placeholder="Enter class Name" class="form-control">
                                            <span id="classinfo">class name can not be empty</span>
                                       </div>
                              
               
                                  
                                        <div class="col-sm-2 col-sm-offset-1">
                                            <br/>  <input type="submit" name="addclass" value="Add Class" id="addclass" class="btn btn-success">
                                        </div>
                                 </div>
                            </form>
                       </div>
                    
       	   </div>

          </div>
       <?php
       footer2();
       ?>