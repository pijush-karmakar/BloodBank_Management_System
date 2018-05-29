<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/BloodProcess.php'; ?>


<?php 
   $bp = new BloodProcess();
   if( isset($_GET['delgallery']) ) {
       $id = preg_replace('/[^-a-zA-Z0-9_]/', '',  $_GET['delgallery'] );
       $delgallery = $bp->delCampGalleryById($id);
   }


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gallery
        <small>camps gallery List</small>
      </h1>
    </section>

              <?php 
                if( isset($delgallery) ){
                  echo $delgallery;
                 }

             ?>
   
    <!-- Main content -->
    <section class="content">
       <div class="row">
         <div class="col-xs-12">
            <div class="box">
            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Camp Title</th>
                    <th>Image Title</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  <?php 
                     $getGallery = $bp->getCampGallery();
                     if($getGallery){
                        $i = 0;
                        while($result = $getGallery->fetch_assoc() ){
                           $i++;
                     
                   ?>
                <tr>
                  
                  <td><?php echo $result['campTitle']; ?></td>
                  <td><?php echo $result['imageTitle']; ?></td>
                  <td><img src="<?php echo $result['galleryImage']; ?>" alt="" height="60" width="60"></td>
                  

                  <td><a href="galleryedit.php?galleryId=<?php echo $result['galleryId']; ?>" class="btn btn-info">Edit </a>  <a onclick=" return confirm('Are You Sure To Delete'); " href="?delgallery=<?php echo $result['galleryId']; ?>" class="btn btn-danger"> Delete</a></td>
                </tr>

                <?php } } ?>

                </tbody>

                <tfoot>
                <tr>
                     <th>Camp Title</th>
                    <th>Image Title</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </tfoot>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
         </div>
       </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include 'inc/footer.php';?>