<?php
function linkToBoostrap(){
?>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="admincss.css">
<script src="../script/jquery1.js" type="text/javascript"></script>
<script src="../script/bootstrap.min.js" type="text/javascript"></script>
<script src="../script/jquery.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="../script/jquery-ui-1.11.2.custom/jquery-ui.min.css">

<script type="text/javascript" src="../script/jquery-ui-1.11.2.custom/external/jquery/jquery.js"></script>
<script type="text/javascript" src="../script/jquery-ui-1.11.2.custom/jquery-ui.min.js"></script>
<script type="text/javascript">
$(function(){
$( "#datepicker" ).datepicker();
});
       </script>
<script src="../script/respond.js"></script>
<?php


}

function leftnavigation(){
	?>
	<div class="col-sm-2 addpadding addcolorleftnav">
         <ul class="list-group">
      
            <li class="list-group-item"><a href="index.php">Home</a></li>
            <li  class="list-group-item"><a href="ViewTeacher.php">Create Teacher</a></li>
            <li  class="list-group-item"><a href="classTeacher.php"> Reasign Class Teacher</a></li>
            <li class="list-group-item"><a href="addclasscategory.php">Class</a></li>
            <li class="list-group-item"><a href="subject.php">Subject</a></li>
            <li class="list-group-item"><a href="registersubject.php">Register Subject</a></li>
             <li class="list-group-item"><a href="student.php">Add Student</a></li>
            <li class="list-group-item"><a href="pinmanagement.php">Pin Management</a></li>
              <li class="list-group-item"><a href="resumptionDate.php">Set Resumption Date</a></li>
            <li class="list-group-item"><a href="Changepassword.php">Change Password</a></li>
            <li class="list-group-item"><a href="promotion.php">Promote Students</a></li>
            <li class="list-group-item"><a href="logout.php">Logout</a></li>


       	</div>
       	<?php
}

function admincheck(){
if(!isset($_SESSION['superadmin'])){
header('location:../cpanel/login.php');
     exit();
}
}
?>