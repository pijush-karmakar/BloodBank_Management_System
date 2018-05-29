
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
       
       $updateDonor = $bp->donorUpdate($_POST,$_FILES,$donorId);
   }

 ?>

<div class="custom_grid" id="tender">
   	 <div class="container">
            <div class="row">
         
   	 	     <div class="col-md-8 col-md-offset-2">
                <div class="contact-form form-border">

                <div class="log-title">
                  <h2> Update your profile </h2>
                </div>

             <?php 

                $donorId = Session::get("donorId");
                $getData = $bp->getDonarData($donorId);
                if( $getData ){
                    while ($result = $getData->fetch_assoc() ) {
               
             ?>

              <?php 
                                   
                  if( isset( $updateDonor ) ){
                      echo $updateDonor;
                  }

              ?>

   	 	     		<form  action="" method="post" enctype="multipart/form-data" >

                          <div>
                            <span><label> Profile picture</label></span>
                            <span>
                              <input name="donorImage" type="file" class="textbox"></span>
                                   <div class="profileImg">
                                      <img src="<?php echo $result['donorImage']; ?>" alt="">
                                   </div>
                               </span> 
                          </div>

                          <div>
                            <span><label> Name</label></span>
                            <span><input name="name" type="text"  class="textbox" value="<?php echo $result['name'] ?>"></span>
                          </div>

                          <div>
                            <span><label>Gender</label></span>
                            <span><input name="gender" type="text"  class="textbox" value="<?php echo $result['gender'] ?>"></span>
                          </div>

                          <div>
                            <span><label>Age</label></span>
                            <span><input name="age" type="text"  class="textbox" value="<?php echo $result['age'] ?>"></span>
                          </div>

                          <div>
                            <span><label>Mobile Number</label></span>
                            <span><input name="mobile" type="text"   class="textbox" value="<?php echo $result['mobile'] ?>"></span>
                          </div>

                          <div>
                            <span><label>Blood Group</label></span>
                            <span>

                             <select id="country"  class="fm-field required" name="bg_id">
                                            <option>Select Blood group</option>
                                            <?php 
                                                $getbg = $bp->getBloodGroup();
                                                if($getbg){
                                                    while($value = $getbg->fetch_assoc() ){
                                            
                                            ?>
                                            <option 

                                            <?php if($result['bg_id'] == $value['bg_id'] ){  ?>
                                                    selected = "selected" 
                                            <?php } ?>

                                            value="<?php echo $value['bg_id']; ?>"><?php echo $value['bg_name']; ?>
                                                
                                            </option>
                                            
                                            <?php   }  } ?>
                                            
                                       </select>

                            </span>
                         
                          </div>

                          <div>
                            <span><label>E-Mail</label></span>
                            <span><input name="email" type="text"  class="textbox" value="<?php echo $result['email'] ?>"></span>
                          </div>

                          <div>
                              <span><label></label></span>
                              <span><input type="submit" name="submit" value="Update" class="myButton"></span>
                         </div>

              </form>

              <?php } } ?>

   	 	     </div> 
   	   	</div>
   	 	 </div>   
     </div>
</div> 
<?php 

include 'inc/footer.php'; 

?>