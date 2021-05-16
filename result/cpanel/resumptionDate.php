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
                     <div class="col-sm-12 whitecolor">
	  <div class="col-sm-12 headbanner">Resumption Date </div>
	  <?php
	  if(isset($_GET['r'])){
      
      if($_GET['r'] == 1){
      	echo" <p class='text-success'> date of resumption Successfull set.</p>";
      }elseif($_GET['r'] == 0){
      		echo" <p class='text-danger'> setting of  resumption date faild.</p>";
      }


	  }

	  ?>
	 

	  <div class="col-sm-12 nopaddling formBg" style="margin-top:25px;padding-top:25px;">
	  <form action="resumptiondatequery.php" method="post" class="form-group">
	  	<div class="col-sm-7 form-group">
	  		<label>Term Of Resumption</label>
	  		<select class="form-control" name="term" id="term">
                <option value=""> Select Academic Term</option>
                <option value="First Term">First Term</option>
                <option value="Second Term">Second Term</option>
                <option value="Third Term">Third Term</option>
            </select>
	  	</div>
	  	<div class="col-sm-5"></div>


		<div class="col-sm-7 form-group">

			<label> Present Session</label>

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
<div class="col-sm-7 form-group">



    <label>Set Date OF Resumption</label>
    <input type="text" name="date" value="" size="30" id="datepicker" class="form-control" placeholder="Enter Resumption Date">
   
 
	  	</div>
	  	<div class="col-sm-7 form-group">
	  		<input type="submit" name="submit" value="Click To Set Resumption Date" id="submit" class="btn btn-danger btn-block"/>

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
      $("#submit").click(function(){
            
      var  d =$("#datepicker").val();
      var  y =$("#year").val();
      var  t =$("#term").val();
      
            if(d == ""){

                  alert("resumption date is empty");
                  
                  return false;
            }

             if(y == ""){

                  alert("present Session is empty");
                  
                  return false;
            }

             if(t == "" ){

                  alert("resumption term field is required");
                  
                  return false;
            }
            
      });
  });



       </script>