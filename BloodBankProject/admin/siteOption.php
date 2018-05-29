<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/BloodProcess.php'; ?>

<?php  
      $bp = new BloodProcess();
     if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
       
       $insertSiteOption = $bp->OptionInsert($_POST);
   }

 ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ADD Site Option
            <small>add Email,phone no , social media, copyright...</small>
        </h1>
    </section>
    
    <?php 
                                   
        if( isset( $insertSiteOption ) ){
            echo $insertSiteOption;
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
                <form class="form-horizontal" action="" method="POST">
                    
                    <div class="box-body">

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Contact Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Email" name="site_email">
                            </div>
                        </div>

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Phone No</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Phone number" name="site_phone">
                            </div>
                        </div>

                         <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Copyright text</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter " name="copyright">
                            </div>
                        </div>

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Facebook</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter " name="fb">
                            </div>
                        </div>

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Twitter</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter " name="tw">
                            </div>
                        </div>

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Google Plus</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter " name="gp">
                            </div>
                        </div>

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Instagram</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter " name="ins">
                            </div>
                        </div>

                       

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <a class="btn btn-primary" href="sitelist.php">View List</a>
                        <button type="submit" name="submit" class="btn btn-info pull-right">Save</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
         </div>
       </div>
    </div>
 </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include 'inc/footer.php'; ?>
