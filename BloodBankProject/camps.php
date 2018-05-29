
<?php include 'inc/header.php'; ?>

<div class="top_banner two">
	<div class="container">
	       <div class="sub-hd-inner">
				<h3 class="tittle">Camps</h3>
			</div>
	</div>
</div>

		
<div class="custom_grid" id="tender">
  <div class="container"> 	
    <div class="row">   	 	
	 <div class="box_1 one"> 


		        <?php 
                     $getGallery = $bp->getAllCamp();
                     if($getGallery){
                        while($result = $getGallery->fetch_assoc() ){                   
                     
         		?>	
   	 	<div class="col-md-6 gallery-box">
   	 	       <div class="col_1_of_2 span_1_of_2 multi-gd-text">
				   <a href="gallery.php?campId=<?php echo $result['campId']; ?>"><img src="admin/<?php echo $result['image']; ?>" class="img-responsive" alt=""></a>
				   <div class="story_desc">
				   	  <h3><?php echo $result['organizedBy'] ?></h3>
				   </div>
 				</div>
				<div class="col_1_of_2 span_1_of_2">
				   <h4><?php echo $result['campTitle'] ?></h4>
				   <ul class="ab camp">
						<li><h6>Organized By:</h6><?php echo $result['organizedBy'] ?></li>
               
						<li><h6>Division:</h6> <?php echo $result['divName'] ?></li>

						<li><h6>District:</h6> <?php echo $result['distName'] ?></li>

					</ul>
					<div class="view-camp">
						<a href="gallery.php?campId=<?php echo $result['campId']; ?>" class="label label-success">View Camp Gallery</a>
					</div>
				  
 				</div>
				
		</div>

   	  <?php } } ?>

        </div>	
   	  </div> 
  </div>
</div>

	
<?php include 'inc/footer.php'; ?>