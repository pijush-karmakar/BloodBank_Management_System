<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/BloodProcess.php'; ?>

<?php  
      $bp = new BloodProcess();
     if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
       $bg_name = $_POST['bg_name'];
       
       $insertbg = $bp->bgInsert($bg_name);
   }

 ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ADD Blood Group
            <small>Add blood group name</small>
        </h1>
    </section>
    
    <?php 
                                   
        if( isset( $insertbg ) ){
            echo $insertbg;
        }

     ?>
    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="box box-info">

                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="bgadd.php" method="POST">
                    
                    <div class="box-body">

                        <div class="form-group">
                                
                            <label for="inputEmail3" class="col-sm-2 control-label">Blood Group</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Blood Group Name" name="bg_name">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <!-- <button class="btn btn-default"><a href="catlist.php">Back</a></button> -->
                        <button type="submit" class="btn btn-info pull-right">Save</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include 'inc/footer.php'; ?>
