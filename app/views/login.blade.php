<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>IFWF - I'm Finished with Fins</title>
		
		<script src="{{asset('js/jquery-2.1.1.min.js') }}"></script>
		<script src="{{asset('js/jquery-ui.min.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
		
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<script src="{{asset('js/bootstrap.min.js') }}"></script>

		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.css">
		<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.js"></script>

		<script type='text/javascript'>
			$(document).ready( function() {		
				$("select, input:text, textarea").addClass('form-control');
		    $("input:submit, input:button, button").addClass('btn btn-default');

		    $('.dataTable').dataTable();

		    $('.dataTable')
					.addClass('table table-striped table-bordered');
		  });
		</script>
		
		<style type="text/css">
			.error {
				font-weight: normal;
				color: red;
			}

			label {
				font-weight: normal;
			}
		</style>

	</head>
<body>

<div class="container">	

{{HTML::image('img/logo-sg.png')}}
<br>

<h2>Login</h2>

@if(Session::has('msg'))
  <div class="alert alert-success ">
    {{ Session::get('msg') }}
  </div>
@endif

Password<br>
{{ Form::open(['url'=> 'admin/login', 'id'=>'val', 'class'=>'form', 'role'=>'form', 'files'=>true]) }}
	{{ Form::password('password', ['style'=>'width:50%', 'class'=>'form-control']) }}
	<br>
	{{ Form::submit('Login') }}
{{ Form::close() }}

@yield('content')


</div>

</body>
</html>
