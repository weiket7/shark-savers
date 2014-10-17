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
  	<table class='landing-tbl' border='1'>
  		<tr>
  			<td rowspan='2' style='text-align:left; width:300px'>{{HTML::image('img/logo_big.png', '')}}</td>
  			<td style='text-align:right'>
  				<a href="http://www.wwf.org.hk/" target='_blank'>{{HTML::image('img/partner_wwf.gif', '', ['class'=>'partner']), ''}}</a>
  				{{HTML::image('img/partner_earth-hour.gif', '', ['class'=>'partner'])}}
  				{{HTML::image('img/partner_wild-aid.gif', '', ['class'=>'partner'])}}
  				{{HTML::image('img/partner_national-geographic.gif', '', ['class'=>'partner'])}}
  				{{HTML::image('img/partner_nat-geo.gif', '', ['class'=>'partner'])}}
  			</td>
  		</tr>
  		<tr>  			
  			<td style='text-align:right'>
  				<select name='country' id='country' class='form-control'>
						<option>Country</option>
						<option value='SG'>Singapore</option>
						<option value='HK'>Hong Kong</option>
						<option value='MY'>Malaysia</option>
					</select>
  			</td>
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
		{{HTML::image('img/social_media.png', $alt='Shark Savers social media')}}
	</div>
</div>

</body>
</html>
