<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
            <span class="icon-bar"></span> <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">LOGO</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <a class="btn btn-success"
           style="color: #ffffff; float: left; margin-top: 7px">Getting Started
        </a>

        <ul class="nav navbar-nav navbar-left">
            <li><a href="index.php">Home</a>
            </li>
            <li><a href="#">Find Course</a>
            </li>
            <li><a href="#">About</a>
            </li>
        </ul>
         <div class="col-sm-3 col-md-3">
               <form class="navbar-form" role="search">
               <div class="input-group">
                   <input type="text" class="form-control" placeholder="Search" name="q">
                   <div class="input-group-btn">
                       <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                   </div>
               </div>
               </form>
         </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Cart</a>
                </li>
                <li><a href="#">Help</a>
                </li>
                <li><a href="login.php">Sign in</a>
                </li>
            </ul>
    </div>
    <!-- navbar-collapse -->
</nav>

<!--  Navbar Ends  -->

<div class="page-content blocky">
    <div class="">

        <div class="side-cont">

            <div class="sidebar-dropdown"><a href="#">MENU</a></div>


    <div class="sidey" style="position:fixed">
<div class="side-cont">
    <ul class="nav">
        <!-- Main menu -->
        <li class="current"><a href="<?php echo $this->url->get('dashboard'); ?>"><i class="glyphicon glyphicon-dashboard"></i>Dashboard</a></li>
        <li class="has_submenu">
            <a href="#">
                <i class="glyphicon glyphicon-book"></i>Course
                <span class="caret pull-right"></span>
            </a>
            <!-- Sub Menu -->
            <ul>
                <li><a href="<?php echo $this->url->get('dashboard/createCourse'); ?>"><i class="glyphicon glyphicon-eye-open"></i> Create Course</a></li>
                <li><a href="#">Approve Course</a></li>
            </ul>
        </li>
        <li class="has_submenu">
            <a href="#">
                <i class="glyphicon glyphicon-pencil"></i> Exams
                <span class="caret pull-right"></span>
            </a>
            <ul>
                <li><a href="<?php echo $this->url->get('dashboard/createTest'); ?>"><i class="glyphicon glyphicon-pencil"></i> Create Test</a></li>
                <li><a href="<?php echo $this->url->get('dashboard/createTestQuestion'); ?>"><i class="glyphicon glyphicon-pencil"></i> Create Questions</a></li>
                <li><a href="<?php echo $this->url->get('dashboard/createModule'); ?>"><i class="glyphicon glyphicon-pencil"></i> Create Module</a></li>
                <li><a href="<?php echo $this->url->get('dashboard/viewExam'); ?>"> <i class="glyphicon glyphicon-eye-open"></i>  View Exam</a></li>
                <li><a href="<?php echo $this->url->get('dashboard/viewQuestions'); ?>"> <i class="glyphicon glyphicon-eye-open"></i>  View Questions</a></li>
                <li><a href="<?php echo $this->url->get(array("for"=>"TryTest")); ?>"> <i class="glyphicon glyphicon-pencil"></i>  Try Test</a></li>
                <li><a href="#">Approve Course</a></li>
            </ul>
        </li>
        <li><a href="#"><i class="glyphicon glyphicon-user"></i>Accounts</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-file"></i>Reports</a></li>
    </ul>
</div>
</div>
</div>
        <!-- SideBar Ends -->
        <!-- Main Content-->
        <div class="mainy">

            <?php echo $this->getContent(); ?>

        </div>
        <!-- End main Content -->

</div>