<?php include_once("function/include.php") ;

 studentcheck();
 include_once"function/headerTop.php"; 
top();

 navigation();
 section1();
 $conn =db();
 ?>
<div class="col-sm-12 nopaddling">
	<div class="col-sm-10 col-sm-offset-1 std_main">

		<div class="col-sm-4">

		<?php 
        $std_id =$_SESSION['S_ID'];
        $c =$_SESSION['S_class_id'];

        $sc =$_SESSION['S_subclass'];
        $no=$_SESSION['S_student_no'];
//var_dump($std_id);


		$f =select_class($c);
   $subClass = select_subclass($sc);
   
   
   if(isset($subClass['class_category_id']) == 1){
    $sub = " ";
   }else{
    $sub = $subClass['class_category_name'];
   }

       echo "<p><b> Welcome : ".ucwords($_SESSION['S_fullname'])."</b></p>";
		echo "<p><b>Class : ". $f['class_name']. ' ' .$sub."</b></p>";
       echo "<p><b>Reg Num : ". $no."</b></p>";

		

		?>
      </div>

<div class="col-sm-6">
	<div class="col-sm-12 spanheader">
	<span class="">VIEW RESULT</span>
</div>
<form class="form-group" action="processresult.php" method="get" target="_blank">

              <div class="col-sm-12 form-group">
              <label>Select session</label>

              <select class="form-control" name="year" id="year">
               <option value=""> Select Academic Session</option>
               <?php
                    for ($year = (date('Y')); $year >= 2012; $year--) {
                        $yearnext =$year+1;
                         echo "<option value=\"$year\">$year/$yearnext</option>\n";
                            
                            }
                 ?> 


            </select>
       </div>


                  <div class="col-sm-12 form-group">
                  <label>Select Term</label>
                  <select name="term" id="term" class="form-control">
                    <option value="">  select academic Term</option>
                    <option value="First Term">First Term</option>
                    <option value="Second Term">Second Term</option>
                    <option value="Third Term">Third Term</option>
                  </select>
                  </div>
              

               <div class="col-sm-12 form-group">
      <label>Select Class</label>
    <select class='form-control' name="c" id='class'>

                        <option value="">-----  Select  class   -------</option>";
                         
                         <?php   $ac = mysqli_query($conn, 'SELECT * FROM class where class_id <="'.$f['class_id'].'"');
                          while( $l=mysqli_fetch_assoc($ac) ) {
                                    
                        ?>
                            <option value="<?php echo $l['class_id']; ?>"><?php echo $l['class_name'];?></option>
                            
                      <?php } ?>

                  </select>
                </div>

                <div class="col-sm-12 form-group">
        <label>Sub Class</label><select class="form-control" name="classcat" id="classcat">
                    <option value="">--  choose a sub class ---</option>

              </select></div>
            
          <div class="col-sm-6 ">  <input type="submit" class="btn btn-success btn-block" name="submit" id="view_result" value="View Result"></div>


</form>
</div>


	</div>

</div>
 

 <?php
footer();
?>
<script type="text/javascript">

$(document).ready(function(){
  $("#view_result").click(function(){

    if($("#year").val() ==""){
    alert("you need to select session to continue");
    return false;
  }

  if($("#term").val() ==""){
    alert("you need to select term to continue");
    return false;
  }

  if($("#class").val() ==""){
    alert("you need to select class to continue");
    return false;
  }


  if($("#classcat").val() ==""){
    alert("you need to select a sub class to continue");
    return false;
  }
}); // end of click



//}); // end of ready




//$(document).ready(function(){
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

