<?php  include_once"../function/include.php";  
       include_once"adminFunction.php";

       
       

         if(isset($_POST['addSubject'])){
$conn =db();
              $subjectArray = array();
              $subject = $_POST['subject'];


              foreach ($subject as $key => $value) {
                     # code...
                     if( !empty($value) ) {
                     if( !in_array($value, $subjectArray) ) {
                     $subjectArray[$key] =cleansql(strtoupper($subject[$key]));
              }
              }
          }

       //  ===================== check existing subjects========================
$query="SELECT subject_id, subject_name FROM subject WHERE  subject_name IN ('".implode("','", $subjectArray)."')";

       $exist_subject = mysqli_query($conn,$query) or die('failed'.mysqli_error($conn));
       if(0!= mysqli_num_rows($exist_subject)){

       while( $f=mysqli_fetch_assoc($exist_subject) ) {
              
                     $f['subject_name'] = strtoupper($f['subject_name']);
                     $key1 = array_search( $f['subject_name'], $subjectArray );
                     unset( $subjectArray[$key1]);
              }


       }
//var_dump($subjectArray);
    //  exit();
       //           =============  end =============================

       // =======   insert new subject   ===========================


       if(count($subjectArray) != 0){

foreach ($subjectArray as $key => $value) {
       # code...
       $sub =$subjectArray[$key];
  $query="INSERT INTO subject (subject_name) values('".$sub."')";
       $e = mysqli_query($conn,$query)or die(mysqli_error($conn, 'error'));
}
       if($e){
              header('Location:subject.php');
   //   $msg="<p class='success'>subject successfully created.</p>";
       }else{
        header('Location:subject.php');
        // $msg="<p class='error'>Failed :Please try again.</p>";
       }
}else{

        header('Location:subject.php');
    //   $msg="<p class='success'>subject successfully created.successfully</p>"; 
}

  }
 include_once"../function/headerTop.php";
  top();
       admincheck();
       linkToBoostrap();
       navigation2(); 
       section2();
       ?>

        <div class="row bc">
       <?php  leftnavigation(); ?>
       	
       	<div class="col-sm-10">
	

       <div class="col-sm-12 whitecolor">

            
         <div class="col-sm-12 headbanner">Add New Subjects <a href="subject.php" class="btn btn-danger btn-sm navbar-right">Back To Subject</a></div>
         <?php  
               //====== status report from the server
                if(!empty($msg)){ echo $msg; }

                  ?>
             <div class="col-sm-12 formBg" style="margin-top:10px;">
              <form class="form-group" method="post" action="addSubject.php">
                    
                    
                            <?php for($i=0; $i < 10; $i++ ){

                                   ?>

                       <div class="col-sm-6 form-group">
                             <label>Subject Title</label>
                             <input type="text" value="" name="subject[<?php echo $i ?>]" class="form-control" />
                      </div>

                         <?php   } ?>
 
        
                       <div class="col-sm-12"><br/>
                           <input type="submit" name="addSubject" value="Add Subject" id="addsubject" class="btn btn-success">
                       </div>
                  
              </form>
              </div>
       </div>

       	</div>

       </div>

<?php
       footer2();
       ?>
<script type="text/javascript">
       $(document).ready(function(){
      $("#addsubject").click(function(){

       var class_option =$("#class_option").val();
       if(class_option == ""){
              alert("school option can not be empty");
              return false;
       }
});
});


       </script>