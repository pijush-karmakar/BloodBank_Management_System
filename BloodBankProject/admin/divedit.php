<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/BloodProcess.php'; ?>

<?php 

if( !isset($_GET['divId']) || $_GET['divId']==NULL ){
    echo '<script>window.location = "divlist.php";</script>';
}
else{
   $id = preg_replace('/[^-a-zA-Z0-9_]/', '',  $_GET['divId'] );
}


?>

<?php  
     $bp = new BloodProcess();
     if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
       $divName = $_POST['divName'];
       
       $updatediv = $bp->divUpdate($divName, $id);
   }

 ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Division
            <small>update name of the division </small>
        </h1>
    </section>
    <?php 
                                   
        if( isset( $updatediv ) ){
            echo $updatediv;
        }

     ?>
    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="box box-info">



                <?php 
                    $getdiv = $bp->getdivById($id);
                    if($getdiv){
                        while( $result = $getdiv->fetch_assoc() ){
                ?>
                
                <form class="form-horizontal" action=" " method="post">
                    
                    <div class="box-body">

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Division</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" value="<?php echo $result['divName']; ?>" name="divName">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <a class="btn btn-primary" href="divlist.php">Back Blood Group List</a>
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
