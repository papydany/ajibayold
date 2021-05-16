<?php include_once"function.php";

top(); ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />

 <script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
<?php
echo'<div class="row nav_rule nomargin bd_padding">
<div class="col-xs-12 thurbnail" style="background-color:#FAF3E1" >';
registration_form();
echo"</div></div>";
echo foot();;
?>