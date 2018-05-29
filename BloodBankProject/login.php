<?php 

ob_start();
include 'inc/header.php'; 

?>
<?php 

    $logIn = Session::get("donorLogin");
    if( $logIn == true ){
         header('location:donordashboard.php');
    }

 ?>
<div class="custom_grid" id="tender">
   	 <div class="container">
            <div class="row">
         
   	 	     <div class="col-md-6">
   	 	     		<div class="contact-form form-border">
   	 	     			<div class="log-title">
   	 	     				<h2>Donor Registration</h2>
   	 	     			    <p>I Want to become a donor</p>
   	 	     
   	 	  			</div>
   <?php  

        if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register']) ) {
            $donorReg = $bp->donorRegistration($_POST,$_FILES );
   			}

  ?>
  <?php 

	if(isset($donorReg) ){
	    echo $donorReg;
	}

 ?>
					     <form  action="" method="POST" enctype="multipart/form-data" >
					    	<div>
						    	<span><label>Donor Name</label></span>
						    	<span><input name="name" type="text" class="textbox"  pattern="[a-zA-Z0-9]{2,10}" title="please enter only character or numbers between 2 to 10 for donor name"></span>
						    </div>
						    <div>
						    	<span><label>Gender</label></span>
						    	<span><input name="gender" type="radio" value="male" class="radio-button" checked="checked">Male</span>
						    	<span><input name="gender" type="radio" value="female" class="radio-button">Female</span>
						    </div>
						    <div>
						    	<span><label>Age</label></span>
						    	<span><input name="age" type="number" class="textbox" pattern="[0-9]{2,2}" title="please enter only  numbers between 2 to 2 for age"></span>
						    </div>
						    <div>
						    	<span><label>Mobile Number</label></span>
						    	<span><input name="mobile" type="text" class="textbox" pattern="[0-9]{10,11}" title="please enter only numbers between 10 to 11 for mobile no."></span>
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
						    	<span><input name="email" type="text" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>Password</label></span>
						    	<span><input name="password" type="password" class="textbox" pattern="[a-zA-Z0-9]{5,10}" title="please enter only character or numbers between 2 to 10 for password"></span>
						    </div>
						    
						    <div>
						     	<span><label>Upload Pic</label></span>
						    	<span><input name="donorImage" type="file" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label></label></span>
								<span><input type="submit" name="register" value="Register" class="myButton"></span>
							 </div>
					    </form>
					    
					    <div class="clearfix"></div>

				  </div>
   	 	     </div>
   	 	
   	 	 
   	 	 
   	 	    <div class="col-md-6">
   	 	    	<div class="contact-form form-border">
   	 	     			<div class="log-title">
   	 	     				<h2>Donor LogIn</h2>
   	 	     			</div>
<?php  

     	if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) ) {       
        $donorLog = $bp->donorLogIn($_POST);
   }

 ?>
 <?php 

              if( isset($donorLog) ){
                echo $donorLog;
               }

  ?>
					     <form method="post" action="" >
					    	
						    <div>
						    	<span><label>E-Mail</label></span>
						    	<span><input name="email" type="text" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>Password</label></span>
						    	<span><input name="password" type="password" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label></label></span>
								<span><input type="submit" value="Log In" name="login" class="myButton"></span>
								
							 </div>
							 <div>
							 	<span><label></label></span>
							 	<span><h4>Not a Donor ? <a href="">Click Here </a> to register </h4></span>
							 </div>
						    
					    </form>
					    <div class="clearfix"></div>

				  </div>
   	 	    </div>  
   	 	
   	 	 </div>   
     </div>
</div>   	 	
<?php 

include 'inc/footer.php';
ob_end_flush();

 ?>