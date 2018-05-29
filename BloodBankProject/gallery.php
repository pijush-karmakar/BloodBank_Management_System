<?php include 'inc/header.php'; ?>


<?php 
    if(!isset($_GET['campId']) || $_GET['campId']==NULL ){
    	header('Location:404.php');
    }
    else{
    	 $id = preg_replace('/[^-a-zA-Z0-9_]/', '',  $_GET['campId'] );
    }
 ?>

<div class="top_banner two">
	<div class="container">
	       <div class="sub-hd-inner">
				<h3 class="tittle">Camps Gallery</h3>
			</div>
	</div>
</div>

		
<div class="custom_grid" id="tender">
  <div class="container">
				

		<div class="gallery-grids">

			<?php 
			      $query = "SELECT * FROM tbl_campgallery WHERE campId = $id";
                  $gallery = $db->select($query);
                  if( $gallery ){ 
  	              while( $result = $gallery->fetch_assoc() ){ 

			 ?>
			
			<div class="col-md-4 gallery-grid">
				<div id="nivo-lightbox-demo">			
					
						<img src="admin/<?php echo $result['galleryImage']; ?>" class="img-responsive " alt=""/>
										
				</div>
			</div>

<?php } } ?>

		</div>
		<!--script-->
	        <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
			<script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
				<script type="text/javascript">
				$(document).ready(function(){
				    $('#nivo-lightbox-demo a').nivoLightbox({ effect: 'fade' });
				});
				</script>

			<!---->			
			<?php 
			      $query = "SELECT * FROM tbl_camp WHERE campId = $id";
                  $gallery = $db->select($query);
                  if( $gallery ){ 
  	              while( $result = $gallery->fetch_assoc() ){ 

			 ?>
            <div class="main1">
                <div class="c_left">
                    <div class="left">
                        <?php echo $result['details']; ?>
                    </div>
                </div>           
            </div>
          <?php } } ?>  

	
	</div>
	</div>


	

<?php include 'inc/footer.php'; ?>