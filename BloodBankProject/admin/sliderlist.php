<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/BloodProcess.php'; ?>


<?php 
   $bp = new BloodProcess();
   $fm = new Format();
   if( isset($_GET['delslide']) ) {
       $id = preg_replace('/[^-a-zA-Z0-9_]/', '',  $_GET['delslide'] );
       $delslide = $bp->delSlideById($id);
   }


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Slider
        <small>Slides List</small>
      </h1>
    </section>

              <?php 
                if( isset($delslide) ){
                  echo $delslide;
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
                   <th>Serial No</th>
                  <th>slide Image</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  <?php 
                     $getSlide = $bp->getAllSlide();
                     if($getSlide){
                        $i = 0;
                        while($result = $getSlide->fetch_assoc() ){
                           $i++;
                     
                   ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><img src="<?php echo $result['slider_image']; ?>" alt="" height="120" width="220"></td>
                   <td><?php echo $fm->textShorten($result['body'],90 ); ?></td>
                  

                  <td><a href="slideedit.php?slider_id=<?php echo $result['slider_id']; ?>" class="btn btn-info">Edit </a>  <a onclick=" return confirm('Are You Sure To Delete'); " href="?delslide=<?php echo $result['slider_id']; ?>" class="btn btn-danger"> Delete</a></td>
                </tr>

                <?php } } ?>

                </tbody>

                <tfoot>
                <tr>
                  <th>Serial No</th>
                  <th>slide Image</th>
                  <th>Description</th>
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