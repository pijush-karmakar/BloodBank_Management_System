<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/BloodProcess.php'; ?>

<?php 

if( !isset($_GET['social_id']) || $_GET['social_id']==NULL ){
    echo '<script>window.location = "sitelist.php";</script>';
}
else{
   $id = preg_replace('/[^-a-zA-Z0-9_]/', '',  $_GET['social_id'] );
}


?>

<?php  
     $bp = new BloodProcess();
     if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
           $updateOption = $bp->optionUpdate($_POST,$id);
   }

 ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update District
            <small>Update district and city </small>
        </h1>
    </section>
    <?php 
                                   
        if( isset( $updateOption ) ){
            echo $updateOption;
        }

     ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-md-12">
            <div class="box box-info">



                <?php 
                    $getsite = $bp->getSiteOptionById($id);
                    if($getsite){
                        while( $result = $getsite->fetch_assoc() ){
                ?>
                
                <form class="form-horizontal" action=" " method="post">
                    
                    <div class="box-body">

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Contact Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Email" name="site_email" value="<?php echo $result['site_email'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Phone No</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Phone number" name="site_phone"  value="<?php echo $result['site_phone'] ?>">
                            </div>
                        </div>

                         <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Copyright text</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter " name="copyright"  value="<?php echo $result['copyright'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Facebook</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter " name="fb"  value="<?php echo $result['fb'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Twitter</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter " name="tw"  value="<?php echo $result['tw'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Google Plus</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter " name="gp"  value="<?php echo $result['gp'] ?>">
                            </div>
                        </div>

                          

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <a class="btn btn-primary" href="sitelist.php">View List</a>
                        <button type="submit" class="btn btn-info pull-right">Update</button>
                    </div>
                    <!-- /.box-footer -->
                </form>

                <?php  }  }  ?>

            </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include 'inc/footer.php'; ?>
