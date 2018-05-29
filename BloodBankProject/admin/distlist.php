<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/BloodProcess.php';?>

<?php 

   $bp = new BloodProcess();
   if( isset($_GET['deldist']) ) {
       $id = preg_replace('/[^-a-zA-Z0-9_]/', '',  $_GET['deldist'] );
       $deldist = $bp->deldistById($id);
   }
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            District
            <small>District Lists</small>
        </h1>
    </section>

            <?php 
                if( isset($deldist) ){
                    echo $deldist;
                 }

            ?>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">
                       
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>District Name</th>
                                    <th>City Name</th>
                                    <th>Zip-code</th>
                                    <th>Division</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
             <?php 

                 $getdist = $bp->getDistrict();
                 if( $getdist ){
                    $i = 0;
                    while( $result = $getdist->fetch_assoc() ){
                           $i++; 

            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td> <?php echo $result['distName']; ?></td>
                                    <td> <?php echo $result['cityName']; ?></td>
                                    <td> <?php echo $result['zipcode']; ?></td>
                                    <td> <?php echo $result['divName']; ?></td>
                                    <td><a href="distedit.php?distId=<?php echo $result['distId']; ?>" class="btn btn-info">Edit</a>  <a onclick=" return confirm('Are You Sure To Delete'); " href="?deldist=<?php echo $result['distId']; ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
            <?php }  }  ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Serial No</th>
                                    <th>District Name</th>
                                    <th>City Name</th>
                                    <th>Zip-code</th>
                                    <th>Division</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'inc/footer.php';?>


