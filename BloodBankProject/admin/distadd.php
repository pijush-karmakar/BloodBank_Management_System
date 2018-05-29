<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/BloodProcess.php'; ?>

<?php  
      $bp = new BloodProcess();
     if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
       
       $insertdist = $bp->distInsert($_POST);
   }

 ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ADD District
            <small>add district & city</small>
        </h1>
    </section>
    
    <?php 
                                   
        if( isset( $insertdist ) ){
            echo $insertdist;
        }

     ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-md-12">

            <div class="box box-info">

                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="" method="POST">
                    
                    <div class="box-body">

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">District Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3"  name="distName">
                            </div>
                        </div>

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">City Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" name="cityName">
                            </div>
                        </div>

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Zip-code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" name="zipcode">
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
                                                    while($result = $getdiv->fetch_assoc() ){
                                            
                                            ?>
                                            <option value="<?php echo $result['divId']; ?>"><?php echo $result['divName']; ?></option>
                                            
                                            <?php   }  } ?>
                                            
                                       </select>
                                    
                            </div>
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                         <a class="btn btn-primary" href="distlist.php">View List</a>
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
