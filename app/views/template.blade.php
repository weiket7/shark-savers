<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Learning Laravel Website </title>
		
		<script src="{{asset('js/jquery-2.1.1.min.js') }}"></script>
		<script src="{{asset('js/jquery-ui.min.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
		
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<script src="{{asset('js/bootstrap.min.js') }}"></script>

		<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
		
	</head>
<body>

<!--getbootstrap.com/examples/navbar-fixed-top/-->

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
  	<table class='landing-tbl'>
			<tr>
				<td style='text-align:left'>{{HTML::image('img/logo_big.png', '')}}</td>				
				<td style='text-align:right'>
					<select name='language' id='language' class='form-control'>
						<option>English</option>
						<option>Chinese</option>
						<option>Malay</option>
					</select>
					
					<div id='partner-div'>
					<a href="http://www.wwf.org.hk/" target='_blank'>{{HTML::image('img/partner_wwf.gif', '', ['class'=>'partner']), ''}}</a>
					{{HTML::image('img/partner_earth-hour.gif', '', ['class'=>'partner'])}}
					{{HTML::image('img/partner_wild-aid.gif', '', ['class'=>'partner'])}}
					{{HTML::image('img/partner_national-geographic.gif', '', ['class'=>'partner'])}}
					{{HTML::image('img/partner_nat-geo.gif', '', ['class'=>'partner'])}}
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

		<table class='landing-tbl'>
			<tr>
				<td style='text-align:left'>
					{{HTML::image('img/nav.png')}}
				</td>
				<td style='text-align:right'>
					<a href="{{URL::to('pledge')}}">{{HTML::image('img/pledge-now.jpg')}}</a>
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
		{{HTML::image('img/social-media.png', $alt='Shark Savers social media')}}
	</div>
</div>

</body>
</html>
