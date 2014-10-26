<?php
$url = explode('/',Request::path());
$country = $url[0];
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>
			IFWF | I'm Finished With Fins
		</title>
		
		<script src="{{asset('js/jquery-2.1.1.min.js') }}"></script>
		<script src="{{asset('js/jquery-ui.min.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
		
		<script src="{{asset('js/jquery.validate.min.js') }}"></script>

		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<script src="{{asset('js/bootstrap.min.js') }}"></script>
		

		<script src="{{asset('js/jquery.bxslider.min.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('css/jquery.bxslider.css') }}">

		<link rel="stylesheet" href="{{ asset('css/landing.css') }}">

		<script type='text/javascript'>
			$(document).ready( function() {
				$('#country').change(function() {
					var country = $(this).val();
					//http://stackoverflow.com/questions/200337/whats-the-best-way-to-automatically-redirect-someone-to-another-webpage
					if (country == 'SG') {
						window.location.href = "{{URL::to('sg')}}";											
					} else if (country == 'MY') {
						window.location.href = "{{URL::to('my')}}";																	
					} else if (country == 'HK') {
						window.location.href = "{{URL::to('hk')}}";
					}
				});

				$('.bxslider').bxSlider({
				  captions: true,
				  pager: false,
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
<div class="container">	

	<div style='height:50px'>&nbsp;</div>

	<table class='landing-tbl'>
		<tr>
			<td rowspan='2' style='text-align:left; width:300px'>
				<a href="{{URL::to('/')}}">{{HTML::image('img/logo.png', '')}}</a>
			</td>
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

	<ul class="bxslider">
	  <li>{{HTML::image('img/landing2.png')}}</li>
	  <li>{{HTML::image('img/landing2.png')}}</li>
	  <!-- <li><img src="http://localhost/sharksavers/public/img/hill_road.jpg" title="The long and winding road" /></li>
	  <li><img src="http://localhost/sharksavers/public/img/trees.jpg" title="Happy trees" /></li> -->
	</ul>

</div>
</div>

<div class='footer'>
	<div class='container'>
		<table style='width:100%'>
		<tr>
		<td>
		Shark savers, inc. is a 501(C) (3) Non-Profit Organization.<br>
		Copyright © 2013 Shark Savers Inc. All Rights Reserved.<br>
		Privacy Policy | Terms & Conditions
		</td>
		<td style='text-align:right'>		
			<a href='https://www.facebook.com/SharkSaversSingapore' target='_blank'><span class='link-facebook'></span></a>
			<a href='http://www.twitter.com/SharkSaversSG' target='_blank'><span class='link-twitter'></span></a>
			<a href='https://www.youtube.com/user/sharksaverssingapore' target='_blank'><span class='link-youtube'></span></a>
		</td>
		</tr>
		</table>
	</div>
</div>

</body>
</html>
