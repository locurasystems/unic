
<!DOCTYPE html>
<html>
<head>
    <title>WELCOME</title>
    <link rel="stylesheet" href="../css/bootstrap.css"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <style>
        .shape{
            border-style: solid; border-width: 0 70px 40px 0; float:right; height: 0px; width: 0px;
            -ms-transform:rotate(360deg); /* IE 9 */
            -o-transform: rotate(360deg);  /* Opera 10.5 */
            -webkit-transform:rotate(360deg); /* Safari and Chrome */
            transform:rotate(360deg);
        }
        .offer{
            background:#fff; border:1px solid #ddd; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); margin: 15px 0; overflow:hidden;
        }
        .offer-radius{
            border-radius:7px;
        }
        .offer-danger {	border-color: #d9534f; }
        .offer-danger .shape{
            border-color: transparent #d9534f transparent transparent;
            border-color: rgba(255,255,255,0) #d9534f rgba(255,255,255,0) rgba(255,255,255,0);
        }
        .offer-success {	border-color: #5cb85c; }
        .offer-success .shape{
            border-color: transparent #5cb85c transparent transparent;
            border-color: rgba(255,255,255,0) #5cb85c rgba(255,255,255,0) rgba(255,255,255,0);
        }
        .offer-default {	border-color: #999999; }
        .offer-default .shape{
            border-color: transparent #999999 transparent transparent;
            border-color: rgba(255,255,255,0) #999999 rgba(255,255,255,0) rgba(255,255,255,0);
        }
        .offer-primary {	border-color: #428bca; }
        .offer-primary .shape{
            border-color: transparent #428bca transparent transparent;
            border-color: rgba(255,255,255,0) #428bca rgba(255,255,255,0) rgba(255,255,255,0);
        }
        .offer-info {	border-color: #5bc0de; }
        .offer-info .shape{
            border-color: transparent #5bc0de transparent transparent;
            border-color: rgba(255,255,255,0) #5bc0de rgba(255,255,255,0) rgba(255,255,255,0);
        }
        .offer-warning {	border-color: #f0ad4e; }
        .offer-warning .shape{
            border-color: transparent #f0ad4e transparent transparent;
            border-color: rgba(255,255,255,0) #f0ad4e rgba(255,255,255,0) rgba(255,255,255,0);
        }

        .shape-text{
            color:#fff; font-size:12px; font-weight:bold; position:relative; right:-40px; top:2px; white-space: nowrap;
            -ms-transform:rotate(30deg); /* IE 9 */
            -o-transform: rotate(360deg);  /* Opera 10.5 */
            -webkit-transform:rotate(30deg); /* Safari and Chrome */
            transform:rotate(30deg);
        }
        .offer-content{
            padding:0 20px 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-3">
            <div class="offer offer-default">
                <div class="shape">
                    <div class="shape-text">
                        top
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        A default offer
                    </h3>
                    <p>
                        And a little description.
                        <br> and so one
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="offer offer-success">
                <div class="shape">
                    <div class="shape-text">
                        top
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        A success offer
                    </h3>
                    <p>
                        And a little description.
                        <br> and so one
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="offer offer-radius offer-primary">
                <div class="shape">
                    <div class="shape-text">
                        top
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        A primary-radius
                    </h3>
                    <p>
                        And a little description.
                        <br> and so one
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="offer offer-info">
                <div class="shape">
                    <div class="shape-text">
                        top
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        An info offer
                    </h3>
                    <p>
                        And a little description.
                        <br> and so one
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            <div class="offer offer-warning">
                <div class="shape">
                    <div class="shape-text">
                        top
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        A warning offer
                    </h3>
                    <p>
                        And a little description.
                        <br> and so one
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="offer offer-radius offer-danger">
                <div class="shape">
                    <div class="shape-text">
                        top
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        A danger-radius
                    </h3>
                    <p>
                        And a little description.
                        <br> and so one
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
