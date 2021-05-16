<?php include_once"function.php";

top(); ?>






<script>

$(document).ready(function(){
$( "#datepicker" ).datepicker();

});
</script>



<!-- **Content Main** -->
            <section class="content-main"> 
            
            	<!-- **Container** -->                
                <div class="container">
                  <div class="content-full-width" id="primary">

<?php basic_form() ;
//registration_form();
?>
</div>
</div>
</section>
       <?php foot();?>

       <script>

$(document).ready(function(){


//$("#surinfo").hide();
$("#dd").click(function(){

var surname=$("#surname").val();
var name=$("#name").val();
var date=$("#datepicker").val();
var sex =$("#sex").val();
var email =$("#email").val();
var pass=$("#password").val();

//if(surname.val()=="" || name.val()=="" && date.val()=="" && sex.val()=="" && email.val()=="" && pass.val()=="" ){
	if (surname =="" ||name =="" ||date =="" ||email =="" || pass =="") {
if(surname == ""){

 $("#surinfo").fadeIn();
	return false;	
}else{
	 $("#surinfo").fadeOut();
}
if(name == ''){

 $("#nameinfo").fadeIn();
	
	return false;	
}else{
	 $("#nameinfo").fadeOut();
}

if(date == ''){

 $("#dateinfo").fadeIn();
		
	return false;
}else{
	 $("#dateinfo").fadeOut();
}
/*if(sex ==""){
	$("#sexinfo").fadeIn();

	return false;
}else{
	
if($('#male').attr('checked', true)){
	 $("#sexinfo").fadeOut();
	}
}*/

if(email ==""){
	$("#emailinfo").fadeIn();

	return false;
}else{
	 $("#emailinfo").fadeOut();
}
if(pass ==""){
	$("#passinfo").fadeIn();

	return false;
}else{
	 $("#passinfo").fadeOut();
}


//return false;
}else{	return true;
}
});  //end of click
});
</script>