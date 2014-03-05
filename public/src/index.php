<?php include('header.php'); ?>
<body style="padding-top: 70px;">
<div class="container">
    <?php include('navbar.php'); ?>
<div class="row">
    <div class="col-xs-5 col-md-3">
        <h4>How to</h4>
        <div class="list-group">
              <a href="#" class="list-group-item">Create course</a>
              <a href="#" class="list-group-item">Join course</a>
              <a href="#" class="list-group-item">Donate</a>
              <a href="#" class="list-group-item">More </a>
        </div>
    </div>
    <div class="col-xs-6 col-sm-5 col-md-9">
        <div id="carousel-main" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-main" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-main" data-slide-to="1"></li>
                <li data-target="#carousel-main" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for sliders -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="../index.jpg" alt="senary" style="height: 300px;width: 1000px"/>
                    <div class="carousel-caption">
                        samples
                    </div>
                </div>
                <div class="item">
                    <img src="../beautyful.jpg" alt="senary" style="height: 300px;width: 1000px"/>
                    <div class="carousel-caption">
                        one more
                    </div>
                </div>
                <div class="item">
                    <img src="../index.jpg" alt="senary" style="height: 300px;width: 1000px"/>
                    <div class="carousel-caption">
                        two more
                    </div>
                </div>
            </div>
            <!-- controls -->
            <a class="left carousel-control" href="#carousel-main" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-main" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>
    <div class="divider"></div>
    <div class="row">
        <div class="col-xs-5 col-md-3">
            <h4 class="page-header">Categories</h4>
            <div class="list-group">
                <a href="#" class="list-group-item">Computer Science</a>
                <a href="#" class="list-group-item">Solar energy</a>
                <a href="#" class="list-group-item">Marketing</a>
            </div>
            <h4>What people say</h4>
            <div class="panel panel-info">
                <div class="panel-body">
                    <p>this site is very useful for students and also un employees</p>
                    <hr/>
                    <p>yes this site is good</p>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-5 col-md-9">
           <h4 class="page-header">Recommended <small><a href="#" style="text-decoration: underline">view All</a></small></h4>
            <?php include('recomended_view.php'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-md-3">
        </div>
        <div class="col-xs-6 col-sm-5 col-md-9">
            <h4 class="page-header">Featured <small><a href="#" style="text-decoration: underline">view All</a></small></h4>
            <?php include('featured_view.php'); ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>