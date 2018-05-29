<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/BloodProcess.php'; ?>

<?php  
      $bp = new BloodProcess();
      if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
       
       $insertGallery = $bp->galleryInsert( $_POST,$_FILES );
    }

 ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ADD Gallery
            <small>add gallery for Camp</small>
        </h1>
    </section>
    
    <?php 
                                   
        if( isset( $insertGallery ) ){
            echo $insertGallery;
        }

     ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-md-12">

            <div class="box box-info">

                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="" method="POST"  enctype="multipart/form-data" >
                    
                    <div class="box-body">
                      
                       
                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Camp</label>
                            <div class="col-sm-10">

                                        <select class="form-control" name="campId">
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
                        </div>

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Image title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" name=" imageTitle">
                            </div>

                        </div>

                         <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Upload Image</label>
                                    <div class="col-sm-10">
                                        
                                        <input type="file" id="exampleInputFile" name="galleryImage">
                                    </div>
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                         <a class="btn btn-primary" href="gallerylist.php">View List</a>
                        <button type="submit" class="btn btn-info pull-right">Save</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
   </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include 'inc/footer.php'; ?>
