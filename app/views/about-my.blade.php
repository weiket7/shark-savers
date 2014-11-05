@section('content')
<style type="text/css">
	.red {
		color: red;
	}

	.bold {
		font-weight: bold;
	}
</style>

<div class='shark-repeat'>
<div class='container' style='text-align:center'>

<div style='height:40px'>&nbsp;</div>

@if (Request::segment(1) == 'hk')
  {{HTML::image('img/im-finished-hk.png')}}
@else
  {{HTML::image('img/im-finished-sgmy.png')}}
@endif
<br><br><br>

<p style='font-size: 20px'>
What do over 150 of Malaysia's most iconic and influential personalities have in common? They have all taken a personal pledge to stop eating shark fin soup by saying <span class='red bold'>"I'm FINished with Fins"</span>.
</p> 
<br>

<p style='font-size:30px; font-weight: bold;'>
<span class='red'>Polite refusal to eat shark fin soup</span> is 
socially acceptable and environmentally astute.
</p>
<br>

<div style='font-size:24px'><b>About <span class='red'>"I'm FINished with FINS"</span></b></div>
<p style='line-height:1.7'>"I'm FINished with Fins" campaign is the largest worldwide campaign ever organized for shark conservation. Over 100 of Malaysia's taste makers and opinion leaders have taken the pledge, joining over 150 celebrities from Malaysia, Singapore, Hong Kong, Macau and Taiwan, where the campaign has also been launched and widely supported. The Malaysia campaign is now the largest of the series, and it is perhaps also the largest campaign ever organized for one animal concern.
 
By saying “I'm FINished” with shark fin soup, individuals can reverse the shark fin consumption trend, not just in Malaysia, but in Asia and the rest of the world. Together we can prevent the catastrophic collapse of shark populations worldwide, protect the health of our oceans, and ensure a brighter future for mankind. 
 
Read more about "I'm FINished with Fins" campaign: https://www.sharksavers.org/en/our-programs/i-m-finished-with-fins/about</p>
<br>

<div style='font-size:24px'><b>Why Sharks?</b></div>
<p style='line-height:1.7'>Sharks play a key role in our ocean's food chains. As apex predators, sharks help keep the world's marine ecosystems balanced. If shark populations are depleted, a critical link in the maintenance of global marine ecosystems will be disrupted, directly affecting the viability of commercial fisheries around the world. The most popular types of seafood we consume on a regular basis will be affected detrimentally, resulting in lower abundance, poorer quality and more expensive seafood. Yet sharks are being depleted worldwide, just to feed the unsustainable demand for shark fin soup. The exponential growth in consumption of shark fin soup is responsible for alarming shark population declines. Singapore plays a vital role in both trade and consumption, and we have the responsibility and opportunity, to make a real difference for sharks globally.</p>
<br><br>

<div style='font-size:24px'><b>Why Malaysia?</b></div>
<p style='line-height:1.7'>Shark Savers, WWF, Earth Hour, WildAid, and National Geographic Channel / NatGeo WILD are thrilled to band together to jointly launch the "I'm FINished with Fins" campaign here, because Malaysia ranked the eighth largest catchment country in the world and also the fourth largest importer for shark fins. Our mission is to empower Malaysians, to educate and inform their circles of influence about the plight of sharks; that the unsustainable consumption of shark fin soup is responsible for the intense overfishing of sharks worldwide, destroying a critical link in the maintenance of healthy commercial fisheries and global marine ecosystems.
 
We hope that you will take the pledge, be a campaign ambassador, and help us get 100,000 Malaysians to also publicly declare "I'm FINished with Fins". The world is watching us, Malaysia!</p>
<br>

<p style='font-size:24px'><span class='red bold'>Learn more about sharks</span></p>
<div style='height:200px; vertical-align:middle;'>
	<a href="http://www.sharksavers.org/en/our-programs/i-m-finished-with-fins/about" target="_blank">{{HTML::image('img/logo-'.$country.'.png', '', ['height'=>'100px'])}}</a>

	<a href="http://wildaid.org/sharks" target='_blank'>{{HTML::image('img/partner_wild-aid.gif', '', ['class'=>'partner'])}}</a>

	@if($country == 'sg')
		<a href="http://www.wwf.sg/" target='_blank'>{{HTML::image('img/partner_wwf.gif', '', ['class'=>'partner']), ''}}</a>
	@elseif($country =='my')
		<a href="http://www.wwf.org.my/" target='_blank'>{{HTML::image('img/partner_wwf.gif', '', ['class'=>'partner']), ''}}</a>
	@elseif($country == 'hk')
		<a href="http://www.wwf.org.hk/" target='_blank'>{{HTML::image('img/partner_wwf.gif', '', ['class'=>'partner']), ''}}</a>
	@endif
</div>

</div>
</div>
@stop