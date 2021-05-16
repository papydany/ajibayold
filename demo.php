<?php include_once('functions.php');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Fancybox</title>
<link href="css/site.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />

<link href="fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="fancybox/jquery.fancybox-1.3.4.min.js"></script>
<script>
$(document).ready(function() {
	$('#gallery a').fancybox({
		overlayColor: '#060',
		overlayOpacity: .3,
		transitionIn: 'elastic',
		transitionOut: 'elastic',
		easingIn: 'easeInSine',
		easingOut: 'easeOutSine',
		titlePosition: 'outside' ,		
		cyclic: true
	});
}); // end ready
</script>
</head>
<body>
<div class="row nav_rule nomargin bd_padding">
<div class="wrapper">



<div class="contet">
	<div class="main">
		<h1>Gallery</h1>
		<div class="col-xs-12 col-sm-12 col-md-8" id="gallery">


      		
		<a href="images/large/slide2.jpg" rel="gallery" title="Someplace pretty"><img src="images/small/fac1.jpg" width="130" height="100" alt="rock wall"></a>
		<a href="images/large/slide3.jpg" rel="gallery" title="The Old Course"><img src="images/small/fac2.jpg" width="130" height="100" alt="old course"></a>
		<a href="images/small/lgfac3.jpg" rel="gallery" title="Lotsa tees"><img src="images/small/fac3.jpg" width="130" height="100" alt="tees"></a>
		<a href="images/large/slide5.jpg" rel="gallery" title="Tree and pond"><img src="images/small/fac4.jpg" width="130" height="100" alt="tree"></a>
		<a href="images/small/lgfac6.jpg" rel="gallery" title="Is that the Loch Ness Monster?"><img src="images/small/fac5.jpg" width="130" height="100" alt="ocean course"></a>
		<a href="images/small/lgfac6.jpg" rel="gallery" title="Is that the Loch Ness Monster?"><img src="images/small/fac6.jpg" width="130" height="100" alt="ocean course"></a>
      	<a href="images/small/lgfac7.jpg" rel="gallery" title="Is that the Loch Ness Monster?"><img src="images/small/fac7.jpg" width="130" height="100" alt="ocean course"></a>
      	
      		
		<a href="images/small/lgfac6.jpg" rel="gallery" title="Lotsa golf balls"><img src="images/small/fac6.jpg" width="70" height="70" alt="golf balls"></a>
		<a href="_images/large/slide2.jpg" rel="gallery" title="Someplace pretty"><img src="/_images/small/slide2_h.jpg" width="70" height="70" alt="rock wall"></a>
		<a href="_images/large/slide3.jpg" rel="gallery" title="The Old Course"><img src="_images/small/slide3_h.jpg" width="70" height="70" alt="old course"></a>
		<a href="_images/large/slide4.jpg" rel="gallery" title="Lotsa tees"><img src="_images/small/slide4_h.jpg" width="70" height="70" alt="tees"></a>
		<a href="_images/large/slide5.jpg" rel="gallery" title="Tree and pond"><img src="_images/small/slide5_h.jpg" width="70" height="70" alt="tree"></a>
		<a href="_images/large/slide6.jpg" rel="gallery" title="Is that the Loch Ness Monster?"><img src="_images/small/slide6_h.jpg" width="70" height="70" alt="ocean course"></a>
	</div>
	</div>
</div>

</div>
</div>
</body>
<html>
