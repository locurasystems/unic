	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	        </button>
	        	  
	        
	        <a class="navbar-brand" href="index.php">LOGO</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	        <a class="btn btn-success" style="color: #ffffff;float: left;margin-top: 7px" >Getting Started</a>

	        <ul class="nav navbar-nav navbar-left">
	            <li><a href="index.php">Home</a></li>
	            <li><a href="#">Find Course</a></li>
	            <li><a href="#">About</a></li>
	        </ul>

	        <ul class="nav navbar-nav navbar-right">
	            <li><a href="#">Help</a></li>
	            <li><a href="login.php">Sign in</a></li>
	        </ul>
	    </div><!-- /.navbar-collapse -->
	</nav>
	<!-- END NAVIGATION -->
	
	<!-- START MAIN ROW -->
	<div class="row">
		<div class="col-xs-5 col-md-3">
	        <h4>How to</h4>
	        <div class="list-group">
	              <a href="#" class="list-group-item">Create course</a>
	              <a href="#" class="list-group-item">Join course</a>
	              <a href="#" class="list-group-item">Donate</a>
	              <a href="#" class="list-group-item">More </a>
	        </div>
            <h4 class="page-header">Categories</h4>
            <div class="list-group">
                <a href="#" class="list-group-item">Computer Science</a>
                <a href="#" class="list-group-item">Solar energy</a>
                <a href="#" class="list-group-item">Marketing</a>
            </div>
            <h4>What people say</h4>
            <div class="panel panel-info">
                <div class="panel-body">
                    <p>this site is very useful for students and also unemployees</p>
                    <hr/>
                    <p>yes this site is good</p>
                </div>
            </div>
		</div>  
		<!-- End sideNav -->
		
		<!-- Start Main -->
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
	        </div> <!-- END CAROUSAL -->
			<?php $this->partial("partials/recomended_course"); ?>

		<?php $this->partial("partials/featured_course"); ?>
	    </div> <!-- END MAIN -->


	</div>

