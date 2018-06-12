
    <div class="slider">
        <div class="fluid_container">
            <div class="camera_wrap camera_magenta_skin" id="camera_wrap_1">

<?php 
  $query = "SELECT * FROM tbl_slider ORDER BY slider_id DESC";
  $slider = $db->select($query);
  if($slider){
      while($result = $slider->fetch_assoc() ){                    
                     
 ?>
                <div data-src="admin/<?php echo $result['slider_image'] ?>">
                    <div class="camera_caption fadeFromBottom"> </div>
                </div>
                
    <?php } } ?>       

            </div>
            <div class="clear"> </div>
        </div>
    </div>

    

