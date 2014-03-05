<!DOCTYPE html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="../css/fuelux.min.css">

    <link href="<?php echo $this->url->get('public/css/bootstrap.css');?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->url->get('public/css/labs.css');?>" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="<?php echo $this->url->get('public/js/jquery.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $this->url->get('public/js/bootstrap.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $this->url->get('public/js/pinned.jQuery.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $this->url->get('public/js/jquery.raty.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $this->url->get('public/js/labs.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $this->url->get('jquery.sticky') ?>"></script>
	
    <!--    <script type="text/javascript" src="../js/bootstrap-wysiwyg.js"></script>-->
    <link href="<?php echo $this->url->get('public/css/bootstrap-responsive.min.css');?>" rel="stylesheet">
    <link href="<?php echo $this->url->get('public/css/font-awesome.css');?>" rel="stylesheet">
	<style>
	body{
		padding:70px !important;
	}
	</style>
</head>
<body>
<style>body {
        background: url(../img/bridge.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .panel-default {
        opacity: 0.9;
        margin-top:30px;
    }
    .form-group.last { margin-bottom:0px; }</style>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="<?php echo $this->url->get(array("for" => "doLogin"));?>" method="post">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">
                                Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Username" name="username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">
                                Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="password" required>
                            </div>
                        </div>
						<input type="hidden" name="<?php echo $this->security->getTokenKey() ?>"
						        value="<?php echo $this->security->getToken() ?>"/>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"/>
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success btn-sm">
                                    Sign in</button>
                                <button type="reset" class="btn btn-default btn-sm">
                                    Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    Not Registred? <a href="register.php">Register here</a></div>
            </div>
        </div>
    </div>
</div>
</body>
