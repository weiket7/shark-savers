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
		
		<link rel="stylesheet" href="{{ asset('css/landing.css') }}">

		<script src="{{asset('js/jquery.bxslider.min.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('css/jquery.bxslider.css') }}">


		<script type='text/javascript'>
			$(document).ready( function() {
				$('#country').change(function() {
					var country = $(this).val();
					//http://stackoverflow.com/questions/200337/whats-the-best-way-to-automatically-redirect-someone-to-another-webpage
					window.location.href = "{{URL::to('sg')}}";					
				});

				//$('.bxslider').bxSlider({
				//  mode: 'fade',
				//  captions: true
				//});
			});
		</script>

	</head>
<body>

<div class='shark-bg'>

	<div style='height:50px'>&nbsp;</div>

	<div class="container">	

	<table class='landing-tbl'>
		<tr>
			<td rowspan='2' style='text-align:left; width:300px'>{{HTML::image('img/logo.png', '')}}</td>
			<td style='text-align:right'>
				<a href="http://www.wwf.org.hk/" target='_blank'>{{HTML::image('img/partner_wwf.gif', '', ['class'=>'partner']), ''}}</a>
				<a href="http://www.earthhour.org/" target='_blank'>{{HTML::image('img/partner_earth-hour.gif', '', ['class'=>'partner'])}}</a>
				<a href="http://wildaid.org/" target='_blank'>{{HTML::image('img/partner_wild-aid.gif', '', ['class'=>'partner'])}}</a>
				<a href="http://natgeotv.com/asia" target='_blank'>{{HTML::image('img/partner_national-geographic.gif', '', ['class'=>'partner'])}}</a>
				<a href="http://natgeotv.com/asia" target='_blank'>{{HTML::image('img/partner_nat-geo.gif', '', ['class'=>'partner'])}}</a>
			</td>
		</tr>
		<tr>  			
			<td style='text-align:right'>
				<select name='country' id='country' class='form-control'>
					<option>WHERE ARE YOU FROM?</option>
					<option value='SG'>Singapore</option>
					<option value='HK'>Hong Kong</option>
					<option value='MY'>Malaysia</option>
				</select>
			</td>
		</tr>
	</table>

	<div class='row'>
		<div class='col-md-12'>
			{{HTML::image('img/landing.png')}}
		</div>
	</div>

	</div>

	</div>

<div class='footer'>
	<div class='container'>
		<div style='float:left; text-align:left'>
		Shark savers, inc. is a 501(C) (3) Non-Profit Organization.<br>
		Copyright © 2013 Shark Savers Inc. All Rights Reserved.<br>
		Privacy Policy | Terms & Conditions
		</div>
		<div style='float:right'>
		{{HTML::image('img/facebook.png')}}
		{{HTML::image('img/twitter.png')}}
		{{HTML::image('img/youtube.png')}}
	</div>
</div>

</body>
</html>
