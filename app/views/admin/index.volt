<!DOCTYPE html>
<head>
    <title>Welcome</title>

  <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600italic,600' rel='stylesheet' type='text/css'>


  <!-- Styles -->
  		<!-- Bootstrap CSS -->
  		<link href="{{url("css/bootstrap-responsive.css")}}" rel="stylesheet">
  		<!-- <link href="{{url("css/bootstrap.css")}}" rel="stylesheet"> -->
  		<link href="<?php echo $this->url->get('css/bootstrap.css'); ?>" rel="stylesheet">
        <!-- Animate css -->
        <link href="{{url("public/css/animate.min.css")}}" rel="stylesheet">
        <!-- Gritter -->
  <!--      <link href="{{url("public/css/jquery.gritter.css")}}" rel="stylesheet"> -->
        <!-- Calendar -->
        <link href="{{url("css/fullcalendar.css")}}" rel="stylesheet">
        <!-- Bootstrap toggable -->
        <link href="{{url("css/bootstrap-switch.css")}}" rel="stylesheet">
        <!-- Date and Time picker -->
        <link href="{{url("css/bootstrap-datetimepicker.min.css")}}" rel="stylesheet">
        <!-- Star rating -->
        <link href="{{url("css/rateit.css")}}" rel="stylesheet">
        <!-- Star rating -->
        <link href="{{url("css/jquery.cleditor.css")}}" rel="stylesheet">
        <!-- jQuery UI -->
        <link href="{{url("css/jquery-ui.css")}}" rel="stylesheet">
        <!-- prettyPhoto -->
        <link href="{{url("css/prettyPhoto.css")}}" rel="stylesheet">
  		<!-- Font awesome CSS -->
  		<link href="{{url("css/font-awesome.min.css")}}" rel="stylesheet">
  		<!-- Custom CSS -->
  		<link href="{{url("css/style.css")}}" rel="stylesheet">
  		<!-- jQuery -->
        		<script src="{{url("js/jquery.js")}}"></script>
	<style>
	body{
		padding:70px !important;
	}
	</style>
</head>
<body>

	
	
	{{ content() }}
	

	

<!-- Javascript files -->

		<!-- Bootstrap JS -->
		<script src="{{url("js/bootstrap.min.js")}}"></script>
      <!-- jQuery UI -->
      <script src="{{url("js/jquery-ui-1.10.2.custom.min.js")}}"></script>
      <!-- jQuery Peity -->
      <script src="{{url("js/peity.js")}}"></script>
      <!-- Calendar -->
      <script src="{{url("js/fullcalendar.min.js")}}"></script>
      <!-- jQuery Star rating -->
      <script src="{{url("js/jquery.rateit.min.js")}}"></script>
      <!-- prettyPhoto -->
      <script src="{{url("js/jquery.prettyPhoto.js")}}"></script>

      <!-- jQuery flot -->
      <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
      <script src="{{url("js/jquery.flot.js")}}"></script>
      <script src="{{url("js/jquery.flot.pie.js")}}"></script>
      <script src="{{url("js/jquery.flot.stack.js")}}"></script>
      <script src="{{url("js/jquery.flot.resize.js")}}"></script>



      <!-- Gritter plugin -->
   <!--   <script src="{{url("js/jquery.gritter.min.js")}}"></script> -->
      <!-- CLEditor -->
      <script src="{{url("js/jquery.cleditor.min.js")}}"></script>
      <!-- Date and Time picker -->
      <script src="{{url("js/bootstrap-datetimepicker.min.js")}}"></script>
      <!-- jQuery Toggable -->
      <script src="{{url("js/bootstrap-switch.min.js")}}"></script>
		<!-- Respond JS for IE8 -->
		<script src="{{url("js/respond.min.js")}}"></script>
		<!-- HTML5 Support for IE -->
		<script src="{{url("js/html5shiv.js")}}"></script>
		<!-- Custom JS -->
	 <script src="{{url("js/custom.js")}}"></script>

</body>
</html>

