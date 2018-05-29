<?php include 'inc/header.php'; ?>

<div class="top_banner two">
	<div class="container">
	       <div class="sub-hd-inner">
				<h3 class="tittle">View Request for Blood</h3>
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
                  <th>Blood Group</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Gender</th>
                  <th>Mobile No</th>
                  <th>E-mail</th>
                  <th>Till Required Date</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>
        <?php 

                 $getReq = $bp->getBloodReq();
                 if( $getReq ){
                    while( $result = $getReq->fetch_assoc() ){
                        
        ?>         
                
                <tr>
                  <td><?php echo $result['bg_name']; ?></td>
                  <td><?php echo $result['reqName']; ?></td>
                  <td><?php echo $result['reqAge']; ?></td>
                  <td><?php echo $result['reqGender']; ?></td>
                  <td><?php echo $result['reqMobile']; ?></td>
                  <td><?php echo $result['reqEmail']; ?></td>
                  <td><?php echo $fm->formatDate($result['reqDate']); ?></td>
                  <td><?php echo $result['reqDetail']; ?></td>
                </tr>

          <?php }  }  ?> 
                
              </tbody>
            </table>
          
       </div>
       </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>