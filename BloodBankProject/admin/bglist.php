<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/BloodProcess.php';?>

<?php 

   $bp = new BloodProcess();
   if( isset($_GET['delbg']) ) {
       $id = preg_replace('/[^-a-zA-Z0-9_]/', '',  $_GET['delbg'] );
       $delbg = $bp->delbgById($id);
   }
?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blood Group
            <small>Blood Group List</small>
        </h1>
    </section>

            <?php 
                if( isset($delbg) ){
                    echo $delbg;
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
                                    <th>Blood Group</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
             <?php 

                 $getbg = $bp->getBloodGroup();
                 if( $getbg ){
                    $i = 0;
                    while( $result = $getbg->fetch_assoc() ){
                           $i++; 

            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td> <?php echo $result['bg_name']; ?></td>
                                    <td><a href="bgedit.php?bg_id=<?php echo $result['bg_id']; ?>" class="btn btn-info">Edit</a>  <a onclick=" return confirm('Are You Sure To Delete'); " href="?delbg=<?php echo $result['bg_id']; ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
            <?php }  }  ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Blood Group</th>
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


