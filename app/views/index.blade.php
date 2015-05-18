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

		<!-- Twitter Card data -->
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@publisher_handle">
		<meta name="twitter:title" content="I'm Finished With Fins">
		<meta name="twitter:description" content="What do over 100 of Singapore's most iconic and influential personalities
		have in common? They have all taken a personal pledge to stop eating shark fin soup by saying “I'm
		FINished with Fins”. ">
		<meta name="twitter:creator" content="@author_handle">
		<meta name="twitter:image" content="http://www.finishedwithfins.org/img/logo.png">
		<!-- Open Graph data -->
		<meta property="og:title" content="I'm Finished With Fins" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="http://www.finishedwithfins.org/" />
		<meta property="og:image" content="http://finishedwithfins.org/img/grid/Amber-Chia_IMG_1237_1.jpg" />
		<meta property="og:description" content="What do over 100 of Singapore's most iconic and influential personalities
		have in common? They have all taken a personal pledge to stop eating shark fin soup by saying “I'm
		FINished with Fins”." />
		<meta property="og:site_name" content="I'm Finished With Fins" />

		<script type='text/javascript'>
			//https://developers.facebook.com/tools/debug/og/object/
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
			<td rowspan='2' style='text-align:left; width:200px'>
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
		@foreach ($sliders as $key => $s)
			@if ($s['image'] !='')
				<li><?php echo "<img src='img/slider/".$s['image']."'>" ?></li>
			@endif		
		@endforeach
	</ul>

</div>
</div>

<div class='footer'>
	<div class='container'>
		<table style='width:100%'>
		<tr>
		<td style='font-size:11px'>
		Shark Savers, inc. is a 501(C) (3) Non-Profit Organization.<br>
		Copyright © 2014 Shark Savers Inc. All Rights Reserved.<br>
		Privacy Policy | Terms & Conditions<br>
		Developed by Wei Ket from <a href='http://www.adoptadog.sg' target='_blank'>www.adoptadog.sg</a>
		</td>
		<td style='text-align:right'>		
			<a href='https://www.facebook.com/FinishedWithFins' target='_blank'><span class='link-facebook'></span></a>
			<a href='http://www.twitter.com/sharksavers' target='_blank'><span class='link-twitter'></span></a>
			<a href='https://www.youtube.com/user/sharksavers' target='_blank'><span class='link-youtube'></span></a>
		</td>
		</tr>
		</table>
	</div>
</div>

</body>
</html>
