<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Learning Laravel Website </title>
		
		<script src="{{asset('js/jquery-2.1.1.min.js') }}"></script>
		<script src="{{asset('js/jquery-ui.min.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
		
		<script src="{{asset('js/jquery.validate.min.js') }}"></script>

		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<script src="{{asset('js/bootstrap.min.js') }}"></script>
		
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.css">
		<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.js"></script>

		<script src="{{asset('js/jquery.tablesorter.js') }}"></script>
		<script src="{{asset('js/jquery.tablesorter.widgets.js') }}"></script>
		<script src="{{asset('js/jquery.tablesorter.pager.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('css/theme.blue.css') }}">

		<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

		<script type='text/javascript'>
			$(document).ready( function() {
		  	
		   	$(".tablesorter").tablesorter({
		      theme : 'blue',
		      widgets : ['zebra'],
		    });

		    $( "#target_date_d" ).datepicker({
		    	dateFormat: "dd M yy",
			    altField: "#target_date",
			    altFormat: "yy-mm-dd",
			    minDate: 0,
		    });

		    $('.dataTable').dataTable();

		    $('.dataTable')
					.addClass('table table-striped table-bordered');
	    
		  });
		</script>

	</head>
<body>

<!--getbootstrap.com/examples/navbar-fixed-top/-->

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
  	{{HTML::image('img/top.jpg','',['height'=>'150px'])}}
    <!-- <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">A{{HTML::image('img/logo.jpg', $alt="Shark Savers")}}</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../navbar/">Default</a></li>
        <li><a href="../navbar-static-top/">Static top</a></li>
        <li class="active"><a href="./">Fixed top</a></li>
      </ul>
    </div> -->
  </div>
</div>


<div class="container">	


@yield('content')


</div>

<div class='footer'>
	<div class='container'>
		<div style='float:left'>
		Shark savers, inc. is a 501(C) (3) Non-Profit Organization.<br>
		Copyright © 2013 Shark Savers Inc. All Rights Reserved.<br>
		Privacy Policy | Terms & Conditions
		</div>
		<div style='float:right'>
		{{HTML::image('img/social_media.jpg', $alt='Shark Savers social media')}}
	</div>
</div>

</body>
</html>
