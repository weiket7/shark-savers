<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Learning Laravel Website </title>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		

		<script src="{{asset('js/jquery.bxslider.min.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('css/jquery.bxslider.css') }}">

		<script type="text/javascript">
			$(document).ready( function() {
				$('.bxslider').bxSlider({
				  mode: 'fade',

				});
			});
		</script>

	</head>
<body>


<div class='container' style='width:500px'>
	<ul class="bxslider">
	  <li>{{HTML::image('img/trees.jpg')}}</li>
	  <li>{{HTML::image('img/tree_root.jpg')}}</li>
	</ul>
</div>



</body>
</html>
