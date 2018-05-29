<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/BloodProcess.php'; ?>

<?php 

if( !isset($_GET['galleryId']) || $_GET['galleryId']==NULL ){
    echo '<script>window.location = "gallerylist.php";</script>';
}
else{
   $id = preg_replace('/[^-a-zA-Z0-9_]/', '',  $_GET['galleryId'] );
}

?>

<?php  
     $bp = new BloodProcess();
     if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
       
       $updateGallery = $bp->galleryUpdate($_POST,$_FILES,$id);
   }

 ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Camp Gallery
            <small> Update gallery Image.... </small>
        </h1>
    </section>
    
 <?php 
                                   
     if( isset( $updateGallery ) ){
            echo $updateGallery;
        }

 ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">

                        <!-- /.box-header -->
                        <!-- form start -->
                        <?php 

                              $getGallery = $bp->getCampGalleryById($id);
                              if($getGallery){
                                 while ($result = $getGallery->fetch_assoc() ) {
                                     

                        ?>

                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                   
                              <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Camp Title</label>
                            <div class="col-sm-10">
                                 <select class="form-control" name="campId" >
                                            <option>Select Camp</option>
                                            <?php 
                                                 $getCamp = $bp->getCamp();
                                                 if($getCamp){
                                                    while($value = $getCamp->fetch_assoc() ){
                                            
                                            ?>
                                            <option 

                                            <?php if($result['campId'] == $value['campId'] ){  ?>
                                                    selected = "selected" 
                                            <?php } ?>

                                            value="<?php echo $value['campId']; ?>"><?php echo $value['campTitle']; ?>
                                                
                                            </option>
                                            
                                            <?php   }  } ?>
                                            
                                       </select>
                            </div>
                        </div>

                                

                                <div class="form-group">
                                        
                                    <label for="inputEmail3" class="col-sm-2 control-label">Image title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" name=" imageTitle" value="<?php echo $result['imageTitle']; ?>">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Update Image</label>
                                    <div class="col-sm-10">
                                        
                                        <input type="file" id="exampleInputFile" name="galleryImage">
                                        <div class="proImg">
                                            <img src="<?php echo $result['galleryImage']; ?>" alt="" class="productImage">
                                        </div>
                                        
                                    </div>
                                </div>


                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a class="btn btn-primary" href="gallerylist.php">Back Camp List</a>
                                <input type="submit" name="submit" class="btn btn-success pull-right" value="Update">
                            </div>
                            <!-- /.box-footer -->
                        </form>

                      <?php } } ?>

                    </div>
                </div>
            </div>

        </div>



    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include 'inc/footer.php'; ?>
