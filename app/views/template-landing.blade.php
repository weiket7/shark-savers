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
		
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

		<script src="{{asset('js/jquery.bxslider.min.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('css/jquery.bxslider.css') }}">


		<script type='text/javascript'>
			$(document).ready( function() {
				$('.bxslider').bxSlider({
				  mode: 'fade',
				  captions: true
				});
		</script>

	</head>
<body>

<!--getbootstrap.com/examples/navbar-fixed-top/-->

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
  	{{HTML::image('img/top.jpg','',['height'=>'150px'])}}
  	<table>
  		<tr>
  			<td rowspan='2'>{{HTML::image('img/logo.gif', '')}}</td>
  		</tr>
  		<tr>
  			<td>
  				{{HTML::link('http://www.wwf.org.hk/', HTML::image('img/partner_wwf.jpg')) }}
  				{{HTML::image('img/partner_nat-geo.jpg')}}
  				{{HTML::image('img/partner_national-geographic.jpg')}}
  				{{HTML::image('img/partner_wild-aid.jpg')}}
  			</td>
  			<td></td>
  		</tr>
  	</table>
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
