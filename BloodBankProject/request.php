
<?php include 'inc/header.php'; ?>

<div class="custom_grid" id="tender">
   	 <div class="container">
            <div class="row">
         
   	 	     <div class="col-md-8 col-md-offset-2">
   	 	     		<div class="contact-form form-border">
   	 	     			<div class="log-title">
   	 	     				<h2>Request For Blood</h2>
   	 	     			</div>
    <?php  

        if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
            $sendRequest = $bp->sendBloodRequest( $_POST );
   			}

  ?>

  <?php 

	if(isset($sendRequest) ){
	    echo $sendRequest;
	}

 ?>
					     <form method="POST" action="" >
					    	<div>
						    	<span><label> Name</label></span>
						    	<span><input name="reqName" type="text"  pattern="[a-zA-Z0-9]{3,10}" class="textbox" title="please enter only character or numbers between 3 to 10 for request"></span>
						    </div>
						    <div>
						    	<span><label>Gender</label></span>
						    	<span><input name="reqGender" type="radio" value="male" class="radio-button" checked="checked">Male</span>
						    	<span><input name="reqGender" type="radio" value="female" class="radio-button">Female</span>
						    </div>
						    <div>
						    	<span><label>Age</label></span>
						    	<span><input name="reqAge" pattern="[0-9]{2,2}" type="number" class="textbox" title="please enter only  numbers between 2 to 2 for age"></span>
						    </div>
						    <div>
						    	<span><label>Mobile Number</label></span>
						    	<span><input name="reqMobile" type="text"  pattern="[0-9]{10,11}" title="please enter only numbers between 10 to 11 for mobile no." class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>Blood Group</label></span>
						    	<select id="country"  class="fm-field required" name="bg_id">
									 <option>Select Blood Group</option>
                                            <?php 

                                                $getbg = $bp->getBloodGroup();
                                                if($getbg){
                                                    while($result = $getbg->fetch_assoc() ){
                                            
                                            ?>
                                            <option value="<?php echo $result['bg_id']; ?>"><?php echo $result['bg_name']; ?></option>
                                            
                                            <?php   }  } ?>
								</select>
						    </div>
						    <div>
						    	<span><label>E-Mail</label></span>
						    	<span><input name="reqEmail" type="text" class="textbox"></span>
						    </div>

						    <div>
						     	<span><label>Till Required Date</label></span>
						    
						    	<span><input name="reqDate" type="datetime-local" class="textbox"></span>	
						    	
						    </div>
						    <div>					    	
									<span><label>Details</label></span>
									<span><textarea name="reqDetail"> </textarea></span>
							</div>
						    
						    <div>
						    	<span><label></label></span>
								<span><input type="submit" value="Submit" name="submit" class="myButton"></span>
							 </div>
					    </form>
					    
					    <div class="clearfix"></div>

				  </div>
   	 	     </div> 
   	 	
   	 	 </div>   
     </div>
</div>   	 	



<?php include 'inc/footer.php'; ?>