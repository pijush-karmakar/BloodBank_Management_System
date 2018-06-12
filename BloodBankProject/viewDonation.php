<?php include 'inc/header.php'; ?>

<?php 

    $logIn = Session::get("donorLogin");
    if( $logIn == false ){
         header('location:login.php');
    }

?>

<div class="top_banner two">
	<div class="container">
	       <div class="sub-hd-inner">
				<h3 class="tittle">View Donation</h3>
			</div>
	</div>
</div>

<div class="custom_grid" id="tender">
   	 <div class="container">
   	 	<div class="row"> 
   	 	 <div class="col-md-12">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Camp</th>
                  <th>Date</th>
                  <th>Details</th>
                  <th>E-mail</th>
                </tr>
              </thead>
              <tbody>
        <?php 
                 $donorEmail = Session::get("donorEmail");
                 $getDonation = $bp->getBloodDonation( $donorEmail );
                 if( $getDonation ){
                    while( $result = $getDonation->fetch_assoc() ){
                        
        ?>         
                
                <tr>
                  <td><?php echo $result['campTitle']; ?></td>
                  <td><?php echo $fm->formatDate($result['donation_date']); ?></td>
                  <td><?php echo $result['details']; ?></td>
                  <td><?php echo $result['email']; ?></td>
                </tr>

          <?php }  }  ?> 
                
              </tbody>
            </table>
          
       </div>
       </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>