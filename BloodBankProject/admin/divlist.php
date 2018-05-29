<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/BloodProcess.php';?>

<?php 

   $bp = new BloodProcess();
   if( isset($_GET['deldiv']) ) {
       $id = preg_replace('/[^-a-zA-Z0-9_]/', '',  $_GET['deldiv'] );
       $deldiv = $bp->deldivById($id);
   }
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            List of Division
            <small>Division List</small>
        </h1>
    </section>

            <?php 
                if( isset($deldiv) ){
                    echo $deldiv;
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
                                    <th>Division Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
             <?php 

                 $getdiv = $bp->getDivision();
                 if( $getdiv ){
                    $i = 0;
                    while( $result = $getdiv->fetch_assoc() ){
                           $i++; 

            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td> <?php echo $result['divName']; ?></td>
                                    <td><a href="divedit.php?divId=<?php echo $result['divId']; ?>" class="btn btn-info">Edit</a>  <a onclick=" return confirm('Are You Sure To Delete'); " href="?deldiv=<?php echo $result['divId']; ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
            <?php }  }  ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Division Name</th>
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


