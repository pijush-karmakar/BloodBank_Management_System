
<?php 

include 'inc/header.php';

 ?>

<div class="custom_grid" id="tender">
   	 <div class="container">
        <div class="row"> 
   	 	     <div class="col-md-8 col-md-offset-2">
        
            <div class="contact-form form-border">
                 <div class="log-title">
                      <h2>Search Result </h2>
                  </div>

 
       <?php 
 
                $getResult = $bp->searchResult();
                if( $getResult ){
                    while ($result = $getResult->fetch_assoc() ) {

      ?>  

      <div class="media">
        <div class="row">
          <div class=" search-img col-sm-4">
            <img src="<?php echo $result['donorImage'] ?>" alt="">
          </div>

          <div class="col-sm-8 search-media">

               <h3>Name : <?php echo $result['name'] ?></h3>

               <h3>gender : <?php echo $result['gender'] ?></h3>
               
               <h3>Blood group : <?php echo $result['bg_name'] ?></h3>

               <h3>Mobile : <?php echo $result['mobile'] ?></h3>

               <h3>Email : <?php echo $result['email'] ?></h3> 

          </div>

          </div>

      </div>






  

<?php } }  

else{
  echo '<h2 class="text-center">Nothing Found </h2>';
}

 ?>

              </div> 
   	 	     </div>  	 	
   	 	 </div>   
     </div>
</div> 
<?php 

include 'inc/footer.php'; 


?>