<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/BloodProcess.php'; ?>


<?php 
   $bp = new BloodProcess();
   $fm = new Format();
   if( isset($_GET['delcamp']) ) {
       $id = preg_replace('/[^-a-zA-Z0-9_]/', '',  $_GET['delcamp'] );
       $delcamp = $bp->delCampById($id);
   }


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Camps
        <small>Camps List</small>
      </h1>
    </section>

              <?php 
                if( isset($delcamp) ){
                  echo $delcamp;
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
                  <th>Camp Title</th>
                  <th>District</th>
                  <th>Division</th>
                  <th>Details</th>
                  <th>Image</th>
                  <th>Organized By</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  <?php 
                     $getCamp = $bp->getAllCamp();
                     if($getCamp){
                        $i = 0;
                        while($result = $getCamp->fetch_assoc() ){
                           $i++;
                     
                   ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td> <?php echo $result['campTitle']; ?></td>
                  <td><?php echo $result['distName']; ?></td>
                  <td><?php echo $result['divName']; ?></td>
                  <td><?php echo $fm->textShorten($result['details'],90 ); ?></td>
                  <td><img src="<?php echo $result['image']; ?>" alt="" height="60" width="60"></td>
                  <td><?php echo $result['organizedBy']; ?></td>
                  

                  <td><a href="campedit.php?campId=<?php echo $result['campId']; ?>" class="btn btn-info">Edit </a>  <a onclick=" return confirm('Are You Sure To Delete'); " href="?delcamp=<?php echo $result['campId']; ?>" class="btn btn-danger"> Delete</a></td>
                </tr>

                <?php } } ?>

                </tbody>

                <tfoot>
                <tr>
                  <th>Serial No</th>
                  <th>Camp Title</th>
                  <th>District</th>
                  <th>Division</th>
                  <th>Details</th>
                  <th>Image</th>
                  <th>Organized By</th>
                  
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