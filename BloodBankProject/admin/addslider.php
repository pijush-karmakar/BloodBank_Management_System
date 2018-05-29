<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/BloodProcess.php'; ?>

<?php  
      $bp = new BloodProcess();
      if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
       
       $insertSlider = $bp->sliderInsert( $_POST,$_FILES );
    }

 ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ADD Slider
            <small>add slider for home page</small>
        </h1>
    </section>
    
    <?php 
                                   
        if( isset( $insertSlider ) ){
            echo $insertSlider;
        }

     ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-md-12">

            <div class="box box-info">

                <form class="form-horizontal" action="" method="POST"  enctype="multipart/form-data" >
                    
                    <div class="box-body">


                         <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Upload Image</label>
                                    <div class="col-sm-10">
                                        
                                        <input type="file" id="exampleInputFile" name="slider_image">
                                    </div>
                        </div>

                         <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label"> Details  </label>
                                <div class="col-sm-10">
                                    <textarea name="body"></textarea>
                                </div>
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                         <a class="btn btn-primary" href="sliderlist.php">View List</a>
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
