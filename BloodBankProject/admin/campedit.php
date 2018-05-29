<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/BloodProcess.php'; ?>

<?php 

if( !isset($_GET['campId']) || $_GET['campId']==NULL ){
    echo '<script>window.location = "camplist.php";</script>';
}
else{
   $id = preg_replace('/[^-a-zA-Z0-9_]/', '',  $_GET['campId'] );
}

?>

<?php  
     $bp = new BloodProcess();
     if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
       
       $updateCamp = $bp->campUpdate($_POST,$_FILES,$id);
   }

 ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Camp
            <small> Update camp's title,image,details etc.... </small>
        </h1>
    </section>
    
 <?php 
                                   
     if( isset( $updateCamp ) ){
               echo $updateCamp;
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
                        <?php 

                              $getCamp = $bp->getCampById($id);
                              if($getCamp){
                                 while ($result = $getCamp->fetch_assoc() ) {
                                     

                        ?>

                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                   
                                <div class="form-group">
                                 

                                    <label for="inputEmail3" class="col-sm-2 control-label">Camp Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="campTitle" class="form-control" id="inputEmail3" value="<?php echo $result['campTitle']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">District</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="distId">
                                            <option>Select Category</option>
                                            <?php 
                                                
                                                $getdist = $bp->getALLDist();
                                                if($getdist){
                                                    while($value = $getdist->fetch_assoc() ){
                                            
                                            ?>
                                            <option 

                                            <?php if($value['distId'] == $result['distId'] ){  ?>
                                                    selected = "selected" 
                                            <?php } ?>

                                            value="<?php echo $value['distId']; ?>"><?php echo $value['distName']; ?>
                                                
                                            </option>
                                            
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
                                                    while($value = $getdiv->fetch_assoc() ){
                                            
                                            ?>
                                            
                                            <option 

                                            <?php if($value['divId'] == $result['divId'] ){  ?>
                                                    selected = "selected" 
                                            <?php } ?>

                                            value="<?php echo $value['divId']; ?>"><?php echo $value['divName']; ?>
                                                
                                            </option>
                                            
                                            <?php } }  ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label"> Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="details">
                                            <?php echo $result['details']; ?>
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label"> Organized By</label>

                                    <div class="col-sm-10">
                                       
                                            <input type="text" class="form-control" name="organizedBy" value="<?php echo $result['organizedBy']; ?>">
                                       
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Upload Image</label>
                                    <div class="col-sm-10">
                                        
                                        <input type="file" id="exampleInputFile" name="image">
                                        <div class="proImg">
                                            <img src="<?php echo $result['image']; ?>" alt="" class="productImage">
                                        </div>
                                        
                                    </div>
                                </div>


                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a class="btn btn-primary" href="camplist.php">Back Camp List</a>
                                <input type="submit" name="submit" class="btn btn-success pull-right" value="Update">
                            </div>
                            <!-- /.box-footer -->
                        </form>

                      <?php } } ?>

                    </div>
                </div>
            </div>

        </div>



    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include 'inc/footer.php'; ?>
