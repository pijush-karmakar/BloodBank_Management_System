<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/BloodProcess.php';?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Site Option
            <small>Available Site Option Lists</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">
                       
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Copyright</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>G-plus</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
             <?php 
                 $bp = new BloodProcess();
                 $getSocial = $bp->getSocial();
                 if( $getSocial ){
                    while( $result = $getSocial->fetch_assoc() ){

            ?>
                                <tr>
                                    <td> <?php echo $result['site_email']; ?></td>
                                    <td> <?php echo $result['site_phone']; ?></td>
                                    <td> <?php echo $result['copyright']; ?></td>
                                    <td> <?php echo $result['fb']; ?></td>
                                    <td> <?php echo $result['tw']; ?></td>
                                    <td> <?php echo $result['gp']; ?></td>

                                    <td><a href="siteedit.php?social_id=<?php echo $result['social_id']; ?>" class="btn btn-info">Edit</a></td>
                                </tr>
            <?php }  }  ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Copyright</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>G-plus</th>
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


