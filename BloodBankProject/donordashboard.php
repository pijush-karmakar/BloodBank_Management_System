
<?php 

ob_start();
include 'inc/header.php';

 ?>
<?php 

    $logIn = Session::get("donorLogin");
    if( $logIn == false ){
         header('location:login.php');
    }

 ?>
<div class="custom_grid" id="tender">
   	 <div class="container">
            <div class="row">
         
   	 	     <div class="col-md-8 col-md-offset-2">
   	 	     		<h1>Welcome to the Admin panel</h1>
   	 	     </div> 
   	 	
   	 	 </div>   
     </div>
</div> 
<?php 

include 'inc/footer.php'; 
ob_end_flush();

?>