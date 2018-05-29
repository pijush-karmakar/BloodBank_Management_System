
<?php 

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
   	 	     		<div class="contact-form form-border">
                <div class="log-title">
                  <h2>Your Profile Details 
                    <a href="editprofile.php" class="editprofile"><i class="glyphicon glyphicon-pencil"></i>Edit</a>
                  </h2>
                </div>

       <?php 

                $donorId = Session::get("donorId");
                $getData = $bp->getDonarData( $donorId );
                if( $getData ){
                    while ($result = $getData->fetch_assoc() ) {
               
             ?>

                  <form action="" enctype="multipart/form-data" method="post">

                           <div>
                               <span><label> Profile picture</label></span>
                               <span>
                                <input type="hidden" name="">
                                   <div class="profileImg " >
                                      <img src="<?php echo $result['donorImage']; ?>" alt="">
                                   </div>
                               </span>       
                          </div>

                          <div>
                            <span><label> Name</label></span>
                            <span><input name="name" type="text" readonly class="textbox" value="<?php echo $result['name'] ?>"></span>
                          </div>

                          <div>
                            <span><label>Gender</label></span>
                            <span><input name="gender" type="text" readonly class="textbox" value="<?php echo $result['gender'] ?>"></span>
                          </div>

                          <div>
                            <span><label>Age</label></span>
                            <span><input name="age" type="text" readonly class="textbox" value="<?php echo $result['age'] ?>"></span>
                          </div>

                          <div>
                            <span><label>Mobile Number</label></span>
                            <span><input name="mobile" type="text"  readonly class="textbox" value="<?php echo $result['mobile'] ?>"></span>
                          </div>

                          <div>
                            <span><label>Blood Group</label></span>
                            <span><input name="bg_id" type="text" readonly class="textbox" value="<?php echo $result['bg_name'] ?>"></span>
                         
                          </div>

                          <div>
                            <span><label>E-Mail</label></span>
                            <span><input name="email" type="text" readonly class="textbox" value="<?php echo $result['email'] ?>"></span>
                          </div>

                  </form>

         <?php  }  } ?>

                  <div class="clearfix"></div>

          </div>
   	 	 </div> 
   	 	
   	 	 </div>   
     </div>
</div> 
<?php 

include 'inc/footer.php'; 

?>