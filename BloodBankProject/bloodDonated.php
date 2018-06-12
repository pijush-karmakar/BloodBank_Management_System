
<?php 

include 'inc/header.php';

 ?>
<?php 

    $logIn = Session::get("donorLogin");
    if( $logIn == false ){
         header('location:login.php');
    }

 ?>

<?php  
      $donorId = Session::get("donorId");
     if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
       
       $insertDonation = $bp->donationInseret($_POST);
   }

 ?>

<div class="custom_grid" id="tender">
   	 <div class="container">
            <div class="row">
         
   	 	     <div class="col-md-8 col-md-offset-2">
                <div class="contact-form form-border">

                <div class="log-title">
                  <h2> Blood Donated </h2>
                </div>

              <?php 
                                   
                  if( isset( $insertDonation ) ){
                      echo $insertDonation;
                  }

              ?>

   	 	     		<form  action="" method="post" >

                          <div>     
                             <span><label> Camp</label></span>
                              <select id="country"  class="fm-field required"  name="campId">
                                            <option>Select Camp</option>
                                            <?php 
                                                $getCamp = $bp->getCamp();
                                                if( $getCamp ){
                                                    while( $result = $getCamp->fetch_assoc() ){
                                            ?>
                                            <option value="<?php echo $result['campId']; ?>"><?php echo $result['campTitle']; ?></option>
                                            
                                            <?php   }  } ?>
                                            
                              </select>
                          </div>

                          <div>
                            <span><label> Date</label></span>
                            <span><input name="donation_date" type="datetime-local" class="textbox"></span> 
                          </div>

                          <div>               
                            <span><label>Other Details</label></span>
                            <span><textarea name="details"> </textarea></span>
                          </div>

                          <div>
                              <span><label></label></span>
                              <span><input type="submit" name="submit" value="Save" class="myButton"></span>
                         </div>

              </form>

            

   	 	     </div> 
   	   	</div>
   	 	 </div>   
     </div>
</div> 
<?php 

include 'inc/footer.php'; 

?>