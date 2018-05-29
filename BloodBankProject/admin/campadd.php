<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/BloodProcess.php'; ?>

<?php  
     $bp = new BloodProcess();
     if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
       
       $insertCamp = $bp->campInsert($_POST,$_FILES);
   }

 ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ADD Camp
            <small> add camp's title,image,details etc....</small>
        </h1>
    </section>
    
 <?php 
                                   
     if( isset( $insertCamp ) ){
               echo $insertCamp;
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
                       
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                   
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="campTitle" class="form-control" id="inputEmail3" placeholder="Camp Title">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">District</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="distId">
                                            <option>Select District</option>
                                            <?php 
                                                $getdist = $bp->getALLDist();
                                                if($getdist){
                                                    while($result = $getdist->fetch_assoc() ){
                                            
                                            ?>
                                            <option value="<?php echo $result['distId']; ?>"><?php echo $result['distName']; ?></option>
                                            
                                            <?php   }  } ?>
                                            
                                       </select>
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

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label"> Details</label>
                                    <div class="col-sm-10">
                                        <textarea name="details"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label"> Organized By</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="organizedBy">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Upload Image</label>
                                    <div class="col-sm-10">
                                        
                                        <input type="file" id="exampleInputFile" name="image">
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                               <a class="btn btn-primary" href="camplist.php">View Camp</a>
                                <input type="submit" name="submit" class="btn btn-info pull-right" value="Save">
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
