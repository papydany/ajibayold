<?php include_once"function.php";

top(); ?>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="js/jquery-ui-1.11.2.custom/jquery-ui.min.css">

<script type="text/javascript" src="js/jquery-ui-1.11.2.custom/external/jquery/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.11.2.custom/jquery-ui.min.js"></script>



<script type="text/javascript">
$(document).ready(function(){


$("#stage2").click(function(){
var school=$("#school").val();

var intclass= $("#intendingclass").val();
var state=$("#state").val();
var nat = $("#nationality").val();
var rel =$("#religion").val();
var res =$("#residential").val();
var postal =$("#postal").val();
var sch =$("#schoolname1").val();
var yr =$("#year1").val();
var cls =$("#class1").val();

var sch2 =$("#schoolname2").val();
var yr2 =$("#year2").val();
var cls2 =$("#class2").val();
var parent =$("#parent").val();
var phome=$("#parentaddress").val();
var relation=$("#relation").val();
var occptn=$("#occupation").val();
var phone =$("#phone").val();
var chealth=$("#healthstatus").val();
var pport=$("#file").val();
	

	if(school==""){
		$("#sch").removeClass('stage');
		$("#sch").addClass('showstage');
		return false;
	}else{
		$("#sch").removeClass('showstage');
		$("#sch").addClass('stage');
	}

if(intclass ==""){
		$("#intclass").removeClass('stage');
		$("#intclass").addClass('showstage');
		return false;
	}else{
		$("#intclass").removeClass('showstage');
		$("#intclass").addClass('stage');
	}
   if(state ==""){
		$("#st").removeClass('stage');
		$("#st").addClass('showstage');
		return false;
	}else{
		$("#st").removeClass('showstage');
		$("#st").addClass('stage');
	}
if(nat ==""){
		$("#nat").removeClass('stage');
		$("#nat").addClass('showstage');
		return false;
	}else{
		$("#nat").removeClass('showstage');
		$("#nat").addClass('stage');
	}

if(rel ==""){
		$("#rel").removeClass('stage');
		$("#rel").addClass('showstage');
		return false;
	}else{
		$("#rel").removeClass('showstage');
		$("#rel").addClass('stage');
	}

	if(res ==""){
		$("#res").removeClass('stage');
		$("#res").addClass('showstage');
		return false;
	}else{
		$("#res").removeClass('showstage');
		$("#res").addClass('stage');
	}

	if(postal ==""){
		$("#pst").removeClass('stage');
		$("#pst").addClass('showstage');
		return false;
	}else{
		$("#pst").removeClass('showstage');
		$("#pst").addClass('stage');
	}

if(sch !==""){

if(yr ==""){
		$("#yr1").removeClass('stage');
		$("#yr1").addClass('showstage');
		return false;
	}else{
		$("#yr1").removeClass('showstage');
		$("#yr1").addClass('stage');
	}
if(cls ==""){
		$("#cls1").removeClass('stage');
		$("#cls1").addClass('showstage');
		return false;
	}else{
		$("#cls1").removeClass('showstage');
		$("#cls1").addClass('stage');
	}

}


if(sch2 !==""){

if(yr2 ==""){
		$("#yr2").removeClass('stage');
		$("#yr2").addClass('showstage');
		return false;
	}else{
		$("#yr2").removeClass('showstage');
		$("#yr2").addClass('stage');
	}
if(cls2 ==""){
		$("#cls2").removeClass('stage');
		$("#cls2").addClass('showstage');
		return false;
	}else{
		$("#cls2").removeClass('showstage');
		$("#cls2").addClass('stage');
	}

}

if(parent ==""){
		$("#pn").removeClass('stage');
		$("#pn").addClass('showstage');
		return false;
	}else{
		$("#pn").removeClass('showstage');
		$("#pn").addClass('stage');
	}

	if(phome ==""){
		$("#pa").removeClass('stage');
		$("#pa").addClass('showstage');
		return false;
	}else{
		$("#pa").removeClass('showstage');
		$("#pa").addClass('stage');
	}

	if(relation ==""){
		$("#pr").removeClass('stage');
		$("#pr").addClass('showstage');
		return false;
	}else{
		$("#pr").removeClass('showstage');
		$("#pr").addClass('stage');
	}

	if(occptn ==""){
		$("#pc").removeClass('stage');
		$("#pc").addClass('showstage');
		return false;
	}else{
		$("#pc").removeClass('showstage');
		$("#pc").addClass('stage');
	}

	if(phone ==""){
		
		$("#phn").removeClass('stage');
		$("#phn").addClass('showstage');
		return false;
	}else{
		$("#phn").removeClass('showstage');
		$("#phn").addClass('stage');
	}



	if(chealth ==""){
		$("#ch").removeClass('stage');
		$("#ch").addClass('showstage');
		return false;
	}else{
		$("#ch").removeClass('showstage');
		$("#ch").addClass('stage');
	}
	if(pport ==""){
		$("#pport").removeClass('stage');
		$("#pport").addClass('showstage');
		return false;
	}else{
		$("#pport").removeClass('showstage');
		$("#pport").addClass('stage');
	}

});




});





</script>


<div class="row nav_rule nomargin bd_padding">

	<?php
	

		$male='unchecked';
		$female='unchecked';
if(isset($_POST['submit'])){

	$surname=cleansql($_POST['surname']);
	$name=cleansql($_POST['name']);
	$other=cleansql($_POST['other']);
	$date=cleansql($_POST['dob']);
	$sex=cleansql($_POST['sex']);
	if($sex=='male'){
		cleansql($male='checked');
	}

   if($sex=='female'){
		cleansql($female='checked');
	}
   $email=cleansql($_POST['email']);
   $pass=cleansql($_POST['password']);


   $insert= insertreg($pass,$surname,$name,$other,$date,$sex,$email);

   if($insert){
    
   if(logf($email,$pass)){

   $selet=	selectname($email,$pass);
   if($selet){
   		$_SESSION['app']=$email;
   		$_SESSION['pass']=$pass;
   		$_SESSION['surname']=ucwords($selet['surname']);
   		$_SESSION['name']=ucwords($selet['name']);
   		$_SESSION['othername']=ucwords($selet['othername']);
   		$_SESSION['id']=$selet['id'];


   		$_SESSION['fullname']=$_SESSION['surname']. '&nbsp; ' .$_SESSION['name']. ' &nbsp;' .$_SESSION['othername'];

   		echo "<div class='col-xs-12 rd' style='margin-top:40px;'>".$_SESSION['fullname']."</div>";

   }
   registration_form();
   }

	}
}else{
		if(logf($_SESSION['app'],$_SESSION['pass'])){
			
  
			echo "<div class='col-xs-12 rd' style='margin-top:40px;'>".$_SESSION['fullname']."</div>";

			 registration_form();

		}else{
		echo "<div class='col-xs-12 oldstudent' style='margin-top:40px;'>You can view thse page</div>";
	}

	}



	?>



</div>
     <?php foot();?>