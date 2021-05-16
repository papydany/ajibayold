<?php  session_start(); ;  

if(isset($_SESSION['id'])){

        unset( $_SESSION['app']);
   		unset($_SESSION['pass']);
   		unset($_SESSION['surname']);
   		unset($_SESSION['name']);
   		unset($_SESSION['othername']);
   		unset($_SESSION['id']);

   		  $result=session_destroy();

   		  if($result){

   		  	header('location:index.php');
   		  }
   	}