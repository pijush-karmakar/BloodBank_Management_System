<!--
Author: pijush Karmakar
Author URL: http://impijush.com
-->

<?php 

ob_start();
include 'lib/Session.php';
Session::init();

 include_once 'lib/Database.php';
 include_once 'helpers/Format.php';
  
  spl_autoload_register(function($class){
       include_once 'classes/'.$class.'.php'; 
  });

   $db   = new Database();
   $fm   = new Format();
   $bp   = new BloodProcess();
    

?>      

<?php

  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
  
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Blood-Bank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Medicinal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script type="applisalonion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/slider.css">
    <link href="css/camera.css" rel="stylesheet" type="text/css" media="all" />
    
    <!-- <script src="js/jquery-1.8.3.min.js"></script> -->
    <script src="js/jquery-1.11.1.min.js"></script>

    <script src="js/bootstrap.js"></script>
    
    <script type='text/javascript' src='js/jquery.min.js'></script>
      <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <!--/web-font-->
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!--/script-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });

    </script>
    <script type='text/javascript' src='js/camera.min.js'></script>
    <script>
        jQuery(function() {

            jQuery('#camera_wrap_1').camera({
                thumbnails: true
            });

            jQuery('#camera_wrap_2').camera({
                height: '400px',
                loader: 'bar',
                pagination: false,
                thumbnails: true

            });
        });

    </script>


</head>

<body>
    <!--start-home-->

    <div class="main-header" id="house">
        <div class="header-strip">
            <div class="container">

            <?php 

                 $getSocial = $bp->getSocial();
                 if( $getSocial ){
                    while( $result = $getSocial->fetch_assoc() ){
                            
            ?>
                <p class="location"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <a href="mailto:info@example.com"><?php echo $result['site_email'] ?></a></p>   

                <p class="phonenum">
                <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span><?php echo $result['site_phone'] ?></p>
                <div class="social-icons">
                    <ul>
                        <li><a href="<?php echo $result['fb'] ?>"><i class="facebook"> </i></a></li>
                        <li><a href="<?php echo $result['tw'] ?>"><i class="twitter"> </i></a></li>
                        <li><a href="<?php echo $result['gp'] ?>"><i class="google-plus"> </i></a></li>
                    </ul>
                </div>
    <?php } } ?>

                <div class="clearfix"></div>
            </div>
        </div>
        <div class="header-middle">
            <div class="header-search">

 


                <form action="" method="post">

                    <div class="section_room">
                        <select id="country"  class="fm-field required" name="bg_id">
                                    <option>Select Blood Group</option>
                                            <?php 

                                                $getbg = $bp->getBloodGroup();
                                                if($getbg){
                                                    while($result = $getbg->fetch_assoc() ){
                                            
                                            ?>
                                            <option value="<?php echo $result['bg_id']; ?>"><?php echo $result['bg_name']; ?></option>
                                            
                                            <?php   }  } ?>
                        </select>

                    </div>
                    <div class="sear-sub">
                        <input type="submit" name="search" value="">
                    </div>
                    <div class="clearfix"></div>
                </form>

               

<?php 

if(  $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search']) ){

     echo "<script>location.replace('searchResult.php?bg=".$_POST["bg_id"]."');</script>";
}



 ?>

            </div>
        </div>
        <!--header-top-->
        <div class="header-top">
            <div class="container">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
                        <div class="logo">
                            <h1><a class="navbar-brand" href="index.php">Life Saver</a></h1>
                        </div>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <div class="top-menu">
                            <nav class="menu menu--francisco">
                                <ul class="nav navbar-nav menu__list">
                                    <li class="menu__item menu__item--current"><a href="index.php" class="menu__link">Home</a></li>
                                    <li class="menu__item"><a href="camps.php" class="menu__link">Camps</a></li>
                                    <li class="menu__item"><a href="request.php" class="menu__link">Request</a></li>
                                    <li class="menu__item"><a href="viewRequest.php" class="menu__link">View Request</a></li>
                                    <li class="menu__item"><a href="about.php" class="menu__link">About</a></li>
                                    <li class="menu__item"><a href="contact.php" class="menu__link">Contact Us</a></li>
                                    
                                 <?php 

                                        $donorId = Session::get("donorId");
                                        if( isset($_GET['donorId']) ){
                                            Session::destroy();
                                           }

                                ?> 
                                <?php 

                                    $logIn = Session::get("donorLogin");
                                    if( $logIn == false ){ 
                                        
                                ?>
                                    <li class="menu__item"><a href="login.php" class="menu__link">Donor LogIn</a></li>

                                 <?php } else{  ?>
                                     
                                     <li class="dropdown menu__item">
                                      
                                      <a href="#" class="dropdown-toggle login  menu__link user-class" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo Session::get('donorName'); ?> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li class="drop-item"><a href="donorProfile.php" class=" drop_link">Profile</a></li>
                                            <li class="drop-item"><a href="blooddonated.php" class=" drop_link">Blood Donated</a></li>
                                            <li class="drop-item"><a href="viewdonation.php" class=" drop_link">View Donation</a></li>

                                            <li class="drop-item"><a href="?donorId=<?php  Session::get('donorId'); ?>" class="drop_link">Logout</a></li>

                                        </ul>

                                    </li>
                                 <?php  } ?> 

                                

                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>

                <div class="clearfix"></div>

            </div>
        </div>
        <!--//header-top-->

    </div>

    