



<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="upload/head.jpg" class="img-circle" alt="User Image">
            </div>

            <div class="pull-left info">
                <p><?php echo Session::get('adminName'); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li class="treeview">
                <a href="../index.php" target="_blank">
                    <i class="fa fa-th"></i> <span>Visit Website</span>
                </a>
            </li>

           <li class="treeview">
                <a href="siteOption.php" >
                    <i class="fa fa-th"></i> <span>Site Option</span>
                </a>
            </li>
           
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-server"></i> <span>Sliders</span>
                    <span class="pull-right-container">
              <i class="fa fa-plus-square pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="addslider.php"><i class="fa fa-pencil-square-o"></i>ADD Slider</a></li>
                    <li><a href="sliderlist.php"><i class="fa fa-outdent"></i>Slider List</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gg"></i> <span>Blood Group</span>
                    <span class="pull-right-container">
              <i class="fa fa-plus-square pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="bgadd.php"><i class="fa fa-pencil-square-o"></i> ADD Blood Group</a></li>
                    <li><a href="bglist.php"><i class="fa fa-list"></i>Blood Group List</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cube"></i> <span>Division</span>
                    <span class="pull-right-container">
              <i class="fa fa-plus-square pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="divadd.php"><i class="fa fa-pencil-square-o"></i>ADD Division</a></li>
                    <li><a href="divlist.php"><i class="fa fa-pencil-square-o"></i>Division List</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i> <span>District</span>
                    <span class="pull-right-container">
              <i class="fa fa-plus-square pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="distadd.php"><i class="fa fa-pencil-square-o"></i> ADD District</a></li>
                    <li><a href="distlist.php"><i class="fa  fa-outdent"></i>District List</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cube"></i> <span>Camps</span>
                    <span class="pull-right-container">
              <i class="fa fa-plus-square pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="campadd.php"><i class="fa fa-pencil-square-o"></i>ADD Camps</a></li>
                    <li><a href="camplist.php"><i class="fa  fa-outdent"></i>Camps List</a></li>
                </ul>
            </li>

             <li class="treeview">
                <a href="#">
                    <i class="fa fa-cube"></i> <span>Camp Gallery</span>
                    <span class="pull-right-container">
              <i class="fa fa-plus-square pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="galleryadd.php"><i class="fa fa-pencil-square-o"></i>ADD Gallery</a></li>
                    <li><a href="gallerylist.php"><i class="fa  fa-outdent"></i>Gallery List</a></li>
                </ul>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
