<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/BloodProcess.php'; ?>

<?php 

if( !isset($_GET['bg_id']) || $_GET['bg_id']==NULL ){
    echo '<script>window.location = "bglist.php";</script>';
}
else{
   $id = preg_replace('/[^-a-zA-Z0-9_]/', '',  $_GET['bg_id'] );
}


?>

<?php  
     $bp = new BloodProcess();
     if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
       $bg_name = $_POST['bg_name'];
       
       $updatebg = $bp->bgUpdate($bg_name, $id);
   }

 ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Blood Group
            <small>Update Blood Group </small>
        </h1>
    </section>
    <?php 
                                   
        if( isset( $updatebg ) ){
            echo $updatebg;
        }

     ?>
    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="box box-info">






                <?php 
                    $getbg = $bp->getbgById($id);
                    if($getbg){
                        while( $result = $getbg->fetch_assoc() ){
                ?>
                
                <form class="form-horizontal" action=" " method="post">
                    
                    <div class="box-body">

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Blood Group</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" value="<?php echo $result['bg_name']; ?>" name="bg_name">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <a class="btn btn-primary" href="bglist.php">Back Blood Group List</a>
                        <button type="submit" class="btn btn-info pull-right">Update</button>
                    </div>
                    <!-- /.box-footer -->
                </form>

                <?php  }  }  ?>

            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include 'inc/footer.php'; ?>
