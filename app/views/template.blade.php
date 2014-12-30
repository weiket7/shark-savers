<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>
			IFWF | I'm Finished With Fins
			<?php
			$url = explode('/',Request::path());
			$country = $url[0];
			$country_arr = array('sg'=>'Singapore', 'my'=>'Malaysia', 'hk'=>'Hong Kong');
			?>
			{{ $country_arr[$country] }}
		</title>
		
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

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
  	<table class='landing-tbl' style='margin-top:10px'>
			<tr>
				<td style='text-align:left'>
					<a href="http://www.finishedwithfins.org/">{{HTML::image('img/logo-'.$country.'.png', '', ['height'=>'100px'])}}</a>
				</td>				
				<td style='text-align:right; vertical-align:top'>					
					<div id='partner-div'>
						@if($country == 'sg')
							<a href="http://www.wwf.sg/" target='_blank'>{{HTML::image('img/partner_wwf.gif', '', ['class'=>'partner']), ''}}</a>
						@elseif($country =='my')
							<a href="http://www.wwf.org.my/" target='_blank'>{{HTML::image('img/partner_wwf.gif', '', ['class'=>'partner']), ''}}</a>
						@elseif($country == 'hk')
							<a href="http://www.wwf.org.hk/" target='_blank'>{{HTML::image('img/partner_wwf.gif', '', ['class'=>'partner']), ''}}</a>
						@endif
						<a href="http://www.earthhour.org/im-finished-fins" target='_blank'>{{HTML::image('img/partner_earth-hour.gif', '', ['class'=>'partner'])}}</a>
						<a href="http://wildaid.org/sharks" target='_blank'>{{HTML::image('img/partner_wild-aid.gif', '', ['class'=>'partner'])}}</a>
						<a href="http://channel.nationalgeographic.com/" target='_blank'>{{HTML::image('img/partner_national-geographic.gif', '', ['class'=>'partner'])}}</a>
						<a href="http://channel.nationalgeographic.com/wild/" target='_blank'>{{HTML::image('img/partner_nat-geo.gif', '', ['class'=>'partner'])}}</a>
						<!-- <span class='hidden-xs hidden-sm'>
							<select name='language' id='language'>
								<option>English</option>
								<option>Chinese</option>
							</select>
						</span> -->
					</div>

					<?php
					$country_domain_arr = ['sg'=>1, 'my'=>2, 'hk'=>'3'];
					$country_domain = $country_domain_arr[$country];
					$pledge_count = Pledge::where('country_domain', $country_domain)->count();
					
					if ($country == 'my') {
						$pledge_count += 76001;
					}
					if ($pledge_count < 100000) //99,999
						$pledge_count_padded = str_split(str_pad($pledge_count, 5, '0', STR_PAD_LEFT));
					else
						$pledge_count_padded = str_split($count);
					//$count = str_split(50000);
					?>
					
					<div class='visible-xs visible-sm visible-md' style='float:right'>
						<table>
							<tr>
								<td>
									@foreach($pledge_count_padded as $k => $c)
										<span class='counter-bg'>{{$c}}</span>
									@endforeach
								</td>
								<td rowspan='2' style='padding-left:10px'>
									<a href="{{URL::to(''.$country.'/pledge')}}">
										{{HTML::image('img/pledge-now-mobile.png')}}
									</a>
								</td>
							</tr>
							<tr>
								<td>
									{{HTML::image('img/pledge-needed-mobile.png', '')}}
								</td>
							</tr>
						</table>						
					</div>

					<div class='hidden-xs hidden-sm hidden-md'>
						@foreach($pledge_count_padded as $k => $c)
							<span class='counter-bg'>{{$c}}</span>
						@endforeach

						{{HTML::image('img/pledge-needed.png', '', ['style'=>'margin-top:-10px'])}}
					</div>
				</td>
			</tr>			
		</table>

		<style type="text/css">
			ul{
        padding: 0;
        list-style: none;
	    }
	    /*http://www.tutorialrepublic.com/faq/show-hide-dropdown-menu-on-mouse-hover-using-css.php*/
	    #ambassadors-dropdown{
        display: none;
        position: absolute;
        margin-left: 17px;
        background-color: #e5e5e5;
	    }
	    #ambassadors-dropdown>li {
	    	padding: 10px;
	    	width: 120px;
	    	text-align: left;
	    }
	    #ambassadors-dropdown>li:not(:last-child) {
	    	border-bottom: 1px solid white;
	    	border-width: 80%
	    }
	    #div-ambassadors:hover ul{
	        display: block; /* display the dropdown */
	    }
		</style>
		
		<table class='landing-tbl hidden-xs hidden-sm hidden-md' style='margin-top:7px; margin-bottom: 7px'>
			<tr>
				<td width='20px' style='padding-right:20px;'>
					<a href="{{URL::to('/'.$country)}}">
						<span class='link-home'></span>
						<b>Home</b>
					</a>
				</td>
				<td width='130px' style='text-align:center'>				
					<div id='div-ambassadors'>
					<a href="{{URL::to('/'.$country.'/ambassadors')}}">
						<span class='link-ambassadors'></span>
						<b>Ambassadors</b>
						<ul id='ambassadors-dropdown'>
            <li>{{link_to('/'.$country.'/ambassadors/artanddesign','Art & Design')}}</li>
            <li>{{link_to('/'.$country.'/ambassadors/corporate','Corporate')}}</li>
            <li>{{link_to('/'.$country.'/ambassadors/entertainment','Entertainment')}}</li>
            <li>{{link_to('/'.$country.'/ambassadors/media','Media')}}</li>
            <li>{{link_to('/'.$country.'/ambassadors/ngo','NGO')}}</li>
            <li>{{link_to('/'.$country.'/ambassadors/professional','Professional')}}</li>
            <li>{{link_to('/'.$country.'/ambassadors/sports','Sports')}}</li>
          </ul>
					</a>
					</div>
				</td>
				<td width='100px' style='text-align:center'>				
					<a href="{{URL::to('/'.$country.'/videos')}}">
						<span class='link-videos'></span>
						<b>Videos</b>
					</a>
				</td>
				<td width='100px' style='text-align:center'>				
					<a href="{{URL::to('/'.$country.'/supporters')}}">
						<span class='link-supporters'></span>
						<b>Supporters</b>
					</a>
				</td>
				<td width='100px' style='text-align:center'>				
					<a href="{{URL::to('/'.$country.'/about')}}">
						<span class='link-about'></span>
						<b>About</b>
					</a>
				</td>
				<td style='text-align:right'>
					<a href="{{URL::to(''.$country.'/pledge')}}">
						<span class='pledge-now-small'></span>
					</td>
				</a>
			</tr>
		</table>

		<div class='visible-xs visible-sm visible-md' style='margin-top:10px'>
			<div class="dropdown">
			  <button class="dropdown-toggle" type="button" id="mobile-menu" data-toggle="dropdown">
			    {{HTML::image('img/triple-line.jpg', '', ['style'=>'margin-left: 10px; margin-right:20px'])}}
			   	MENU
			  </button>
			  <ul class="dropdown-menu" id='mobile-menu-dropdown' role="menu" aria-labelledby="dropdownMenu1">
			    <li role="presentation" style='border-bottom: 1px solid #ccc;'><a style='padding-top:10px' href="{{URL::to('/'.$country.'/ambassadors')}}">Ambassadors</a></li>
			    <li role="presentation" style='border-bottom: 1px solid #ccc'><a style='padding-top:10px' href="{{URL::to('/'.$country.'/videos')}}">Videos</a></li>
			    <li role="presentation"><a style='padding-top:10px' href="{{URL::to('/'.$country.'/supporters')}}">Supporters</a></li>
			  </ul>
			</div>
		</div>
  </div>
</div>

@yield('content')

<div class='footer'>
	<div class='container'>
		<table style='width:100%'>
		<tr>
			<td>
			Shark Savers, inc. is a 501(C) (3) Non-Profit Organization.<br>
			Copyright © 2014 Shark Savers Inc. All Rights Reserved.<br>
			Privacy Policy | Terms & Conditions<br>
			Developed by Wei Ket from <a href='http://www.adoptadog.sg' target='_blank'>www.adoptadog.sg</a>
			</td>
			<td style='text-align:right'>		
				@if (strtolower($country)=='sg')
					<a href='https://www.facebook.com/SharkSaversSingapore' target='_blank'><span class='link-facebook'></span></a>
					<a href='http://www.twitter.com/SharkSaversSG' target='_blank'><span class='link-twitter'></span></a>
					<a href='https://www.youtube.com/user/sharksaverssingapore' target='_blank'><span class='link-youtube'></span></a>
				@elseif (strtolower($country)=='hk')
					<a href='https://www.facebook.com/FinishedWithFins' target='_blank'><span class='link-facebook'></span></a>				
					<a href='https://www.youtube.com/user/HKSharksavers' target='_blank'><span class='link-youtube'></span></a>
				@else <!--MY-->
					<a href='https://www.facebook.com/FinishedWithFins' target='_blank'><span class='link-facebook'></span></a>
					<a href='http://www.weibo.com/sharksavershk' target='_blank'><span class='link-weibo'></span></a>
					<a href='http://instagram.com/sharksavershk' target='_blank'><span class='link-instagram'></span></a>
					<a href='https://www.youtube.com/user/HKSharksavers' target='_blank'><span class='link-youtube'></span></a>
				@endif
			</td>
		</tr>
		</table>
	</div>
</div>

<!--preload hover-->
<div style='display:none'>
{{HTML::image('img/ambassadors-hover.png')}}
{{HTML::image('img/videos-hover.png')}}
{{HTML::image('img/supporters-hover.png')}}
{{HTML::image('img/home-hover.png')}}
{{HTML::image('img/about-hover.png')}}
{{HTML::image('img/facebook-hover.png')}}
{{HTML::image('img/youtube-hover.png')}}
{{HTML::image('img/twitter-hover.png')}}
{{HTML::image('img/instagram-hover.png')}}
{{HTML::image('img/weibo-hover.png')}}
{{HTML::image('img/pledge-now-hover.png')}}
{{HTML::image('img/pledge-now-small-hover.png')}}
</div>

</body>
</html>
