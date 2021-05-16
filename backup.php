<?php include_once('functions.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enter Username</title><script type="text/javascript" src="jscript.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
HD();

echo'<div class="row nav_rule nomargin bd_padding">
<div class="col-sm-4 col-sm-offset-4" style="background-color:#FAF3E1;padding:10px;padding-top:25px;">';


//<a href="backupmanager.php" class="btn btn-danger">BACK UP</a>';

echo '<a href="mydump.php" class="btn btn-danger">BACK UP</a>';

echo"</div></div>";

FT();
?>