<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>I'm Finished With Fins</title>
		
		<script src="{{asset('js/jquery-2.1.1.min.js') }}"></script>
		<script src="{{asset('js/jquery-ui.min.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
		
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<script src="{{asset('js/bootstrap.min.js') }}"></script>

		<script src="{{asset('js/jquery.bxslider.min.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('css/jquery.bxslider.css') }}">

		<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

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
		<meta property="og:image" content="http://www.finishedwithfins.org/img/logo.png" />
		<meta property="og:description" content="What do over 100 of Singapore's most iconic and influential personalities
		have in common? They have all taken a personal pledge to stop eating shark fin soup by saying “I'm
		FINished with Fins”." />
		<meta property="og:site_name" content="I'm Finished With Fins" />
		
	</head>
<body>
<!--getbootstrap.com/examples/navbar-fixed-top/-->

<div style="background-image:url(../img/shark-bg2.jpg); background-repeat-y;">

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
  	<table class='landing-tbl'>
			<tr>
				<td style='text-align:left'><a href="{{URL::to('/')}}">{{HTML::image('img/logo.png', '')}}</a></td>				
				<td style='text-align:right'>
					<select name='language' id='language' class='form-control'>
						<option>English</option>
						<option>Chinese</option>
						<option>Malay</option>
					</select>
					
					<div id='partner-div'>
					<a href="http://www.wwf.org.hk/" target='_blank'>{{HTML::image('img/partner_wwf.gif', '', ['class'=>'partner']), ''}}</a>
					<a href="http://www.earthhour.org/" target='_blank'>{{HTML::image('img/partner_earth-hour.gif', '', ['class'=>'partner'])}}</a>
					<a href="http://wildaid.org/" target='_blank'>{{HTML::image('img/partner_wild-aid.gif', '', ['class'=>'partner'])}}</a>
					<a href="http://natgeotv.com/asia" target='_blank'>{{HTML::image('img/partner_national-geographic.gif', '', ['class'=>'partner'])}}</a>
					<a href="http://natgeotv.com/asia" target='_blank'>{{HTML::image('img/partner_nat-geo.gif', '', ['class'=>'partner'])}}</a>
					</div>

					<?php
					//$count = str_split(Pledge::all()->count());
					$count = str_split(50000);
					?>
					@foreach($count as $k => $c)
					<span class='counter-bg'>{{$c}}</span>
					@endforeach
					{{HTML::image('img/pledge-needed.png')}}
				</td>
			</tr>			
		</table>

		<?php
		$url = explode('/',Request::path());
		$country = $url[0];
		?>
		<table class='landing-tbl'>
			<tr>
				<td width='1%' style='padding-right:20px;'>
					<a href="{{URL::to('/'.$country)}}">{{HTML::image('img/home.png')}}</a>
					<br><b>Home</b>
				</td>
				<td width='1%' style='padding-right:20px; padding-left:20px'>				
					<a href="{{URL::to('/'.$country.'/ambassadors')}}">{{HTML::image('img/ambassador.png')}}</a>
					<br><b>Ambassadors</b>
				</td>
				<td width='1%' style='padding-right:20px; padding-left:20px'>				
					<a href="{{URL::to('/'.$country.'/videos')}}">{{HTML::image('img/videos.png')}}</a>
					<br><b>Videos</b>
				</td>
				<td width='1%' style='padding-right:20px; padding-left:20px'>				
					<a href="{{URL::to('/'.$country.'/supporters')}}">{{HTML::image('img/supporters.png')}}</a>
					<br><b>Supporters</b>
				</td>
				<td style='text-align:right'>
					<a href="{{URL::to(''.$country.'/pledge')}}">{{HTML::image('img/pledge-now.png')}}</a>
				</td>
			</tr>
		</table>
  </div>
</div>

<script type="text/javascript">
	$(document).ready( function() {
		$('.bxslider').bxSlider({
		  mode: 'fade',
		  captions: true,
		  pager: false,
		  nextImage: "<img src='{{URL::to('img/slider-left.png')}}'/>",
		  prevImage: "<img src='{{URL::to('img/slider-left.png')}}'/>",
		  nextText: '',
		  prevText: '',
		});
	});

</script>


<div class='container'>
	<ul class="bxslider">
	  <li>{{HTML::image('img/landing2.png')}}</li>
	  <li>{{HTML::image('img/landing2.png')}}</li>
	  <!-- <li><img src="http://localhost/sharksavers/public/img/hill_road.jpg" title="The long and winding road" /></li>
	  <li><img src="http://localhost/sharksavers/public/img/trees.jpg" title="Happy trees" /></li> -->
	</ul>
</div>


<div class='footer'>
	<div class='container'>
		<div style='float:left; text-align:left'>
		Shark savers, inc. is a 501(C) (3) Non-Profit Organization.<br>
		Copyright © 2013 Shark Savers Inc. All Rights Reserved.<br>
		Privacy Policy | Terms & Conditions
		</div>
		<div style='float:right'>
		@if (strtolower($country)=='sg')
			<a href='https://www.facebook.com/SharkSaversSingapore' target='_blank'>{{HTML::image('img/facebook.png')}}</a>
			<a href='http://www.twitter.com/SharkSaversSG' target='_blank'>{{HTML::image('img/twitter.png')}}
			<a href='https://www.youtube.com/user/sharksaverssingapore' target='_blank'>{{HTML::image('img/youtube.png')}}</a>
		@else
			<a href='https://www.facebook.com/FinishedWithFins' target='_blank'>{{HTML::image('img/facebook.png')}}</a>
			<a href='http://www.twitter.com/SharkSaversSG' target='_blank'>{{HTML::image('img/twitter.png')}}
			<a href='https://www.youtube.com/user/HKSharksavers' target='_blank'>{{HTML::image('img/youtube.png')}}</a>
		@endif
	</div>
</div>

</body>
</html>
