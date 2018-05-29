<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/BloodProcess.php'; ?>

<?php 

if( !isset($_GET['distId']) || $_GET['distId']==NULL ){
    echo '<script>window.location = "distlist.php";</script>';
}
else{
   $id = preg_replace('/[^-a-zA-Z0-9_]/', '',  $_GET['distId'] );
}


?>

<?php  
     $bp = new BloodProcess();
     if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
           $updateDist = $bp->distUpdate($_POST,$id);
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
                                   
        if( isset( $updateDist ) ){
            echo $updateDist;
        }

     ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-md-12">
            <div class="box box-info">



                <?php 
                    $getdist = $bp->getdistById($id);
                    if($getdist){
                        while( $result = $getdist->fetch_assoc() ){
                ?>
                
                <form class="form-horizontal" action=" " method="post">
                    
                    <div class="box-body">

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">District Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" value="<?php echo $result['distName']; ?>" name="distName">
                            </div>
                        </div>

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">City Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" value="<?php echo $result['cityName']; ?>" name="cityName">
                            </div>
                        </div>

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Zip-code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" value="<?php echo $result['zipcode']; ?>" name="zipcode">
                            </div>
                        </div>

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Division</label>
                            <div class="col-sm-10">
                                 <select class="form-control" name="divId">
                                            <option>Select Division</option>
                                            <?php 
                                                 $getdiv = $bp->getALLdiv();
                                                 if($getdiv){
                                                    while($value = $getdiv->fetch_assoc() ){
                                            
                                            ?>
                                            <option 

                                            <?php if($result['divId'] == $value['divId'] ){  ?>
                                                    selected = "selected" 
                                            <?php } ?>

                                            value="<?php echo $value['divId']; ?>"><?php echo $value['divName']; ?>
                                                
                                            </option>
                                            
                                            <?php   }  } ?>
                                            
                                       </select>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <a class="btn btn-primary" href="distlist.php">Back District List</a>
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
