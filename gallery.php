<?php include_once"function.php";

top(); 
$conn=db();
echo'
  <div class="breadcrumb-section">
                  <div class="container">
	                  <h3>Gallery</h3>
                      <div class="breadcrumb">
                      	<a href="index.php" title="">Home</a> / <span>Gallery</span>
                      </div>
                  </div>
            </div> 

        <section class="content-main">      
 <div class="container">
                  <div class="content-full-width" id="primary">
                
                        <div class="portfolio-container">'  
;

  
		  
$array_pic=array();	  
 $query="select count(*) from gallery";
  $result=mysqli_query($conn,$query);
if(!$result){
	echo"query failed 1";
}
$r=mysqli_fetch_row($result);
$numrow=$r[0];

// number of row per page
$rowperpage=8;
//find out total page
$totalpages=ceil($numrow/$rowperpage);
 //get current or set a fault
 if(isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])){
	// cast vas as int
	$currentpage= (int )$_GET['currentpage'];
 }else{
	 // defaut page
	 $currentpage= 1;
 }
 //if current page is greater than total page
 if($currentpage > $totalpages){
	 // set page to last
	 $currentpage =$totalpages;
 }

 
 //offset of the list,based on current page
 $offset=($currentpage - 1) * $rowperpage;


$query="select * from gallery order by id desc limit $offset, $rowperpage";
$result=mysqli_query($conn,$query);
if(!$result){
	echo"Query Failed";
}
if(mysqli_num_rows($result) ==0){
	echo"<p class=\"message\">no picture in the school photo  gallery.we will upload soon</p>
	</div></div></div></section>";
foot();
	exit();
	
	
	}else{
	

	if(isset($_SESSION['admin_user'])){
		
		
		
while($pic=mysqli_fetch_assoc($result)){
		$array_pic[]=$pic;
		}
		
		$lent=count($array_pic);

//foreach ($array_pic as $key => $value) {
		for ($i=0; $i <$lent ; $i++) { 
			
		$a=$array_pic[$i]['name'];
	    $write=$array_pic[$i]['write'];
	    $d=$array_pic[$i]['id'];
		$name="images/".$a;
		$id=$pic['id'];

		echo'<div class="portfolio dt-sc-one-fourth column gallery design">
                                <div class="portfolio-thumb">
                                    <img src="'.$name.'" alt="gallery-thumb1">
                                    <div class="image-overlay">
                                        <a href="'.$name.'" data-gal="prettyPhoto[gallery]" title="'.$write.' " class="link"> <span class="fa fa-plus"> </span> </a>
                                       
                                    </div>
                                </div>
                                <div class="portfolio-detail">
                                    <p>'.$write.'  </p>
                                </div>
                          
		
	<div class="col-sm-3 col-sm-offset-1" style="margin-top:5px;""><a href="delete_pic.php?id='.$d.'" class="btn btn-danger btn-xs">Delete</a></div></div>
	';
	
   
	
}
	
	
	
	
	
	

		  
		  
  }else{
?>
  	
   <?php 
	
while($pic=mysqli_fetch_assoc($result)){
		$array_pic[]=$pic;
		}
		
		$lent=count($array_pic);


		for ($i=0; $i <$lent ; $i++) { 
			
		$a=$array_pic[$i]['name'];
	    $write=$array_pic[$i]['write'];
	    $d=$array_pic[$i]['id'];
		$name="images/".$a;
		$id=$pic['id'];
	

	

	
    
	

 echo'<div class="portfolio dt-sc-one-fourth column gallery design thumbnail">
                                <div class="portfolio-thumb">
                                    <img src="'.$name.'" alt="gallery-thumb1" class="">
                                    <div class="image-overlay">
                                        <a href="'.$name.'" data-gal="prettyPhoto[gallery]" title="'.$write.' " class="link"> <span class="fa fa-plus"> </span> </a>
                                       
                                    </div>
                                </div>
                                <div class="portfolio-detail">
                                    <p>'.$write.'  </p>
                                </div>
                            </div>';
  
	

}

}
	
	
	

	
     
      


  }    
  
echo'</div>


                   <div class="clear"> </div>
                        <div class="dt-sc-hr-invisible-small"> </div>   
                        
                        <div class="pagination"> 
                            <ul>';
                            if($currentpage > 1){
	                     // get previous page num
	                     $prevpage=$currentpage - 1;
                              echo" <li> <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage' > <span class='fa fa-angle-double-left'></span>Prev </a> </li>";
                          }
                          for ($i=1; $i <= $totalpages ; $i++) { 
                          	
                           if($currentpage == $i){
                             echo "<li> <a class='active-page' href='{$_SERVER['PHP_SELF']}?currentpage=$i'>".$i."</a></li>";
                           }else{
                           	 echo "<li> <a class='' href='{$_SERVER['PHP_SELF']}?currentpage=$i'>".$i."</a></li>";
                           }
                           } // end of for loop
                                  if($currentpage){
	                    // get next page
	                     $nextpage= $currentpage + 1;
                            echo"<li> <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'> Next<span class='fa fa-angle-double-right'></span>  </a> </li>";
                        }

                            echo'</ul>
                        </div></div></div></section>';
	
	 
	  
	  
	
  

foot();
?>