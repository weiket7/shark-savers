@section('content')

<script src="{{asset('js/jquery.bxslider.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/jquery.bxslider.css') }}">

<script type="text/javascript">
	$(document).ready( function() {
		$('.bxslider').bxSlider({
		  mode: 'fade',
		  captions: true
		});
	});
</script>

<!-- 
{{HTML::image('img/partner.jpg', $alt='shark savers partners', ['onclick'=>'toggle_div()'])}}
 -->

<ul class="bxslider">
  <li><img src="http://localhost/sharksavers/public/img/tree_root.jpg" title="Funky roots" /></li>
  <li><img src="http://localhost/sharksavers/public/img/hill_road.jpg" title="The long and winding road" /></li>
  <li><img src="http://localhost/sharksavers/public/img/trees.jpg" title="Happy trees" /></li>
</ul>

<div class='col-xs-9'>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus
tincidunt dolor a molestie. Maecenas cursus rutrum magna, nec cursus nisl
gravida non. Vivamus cursus erat nunc.
</div>

<div class='col-xs-3'>
<select name='country' id='country' class='form-control'>
<option>Country</option>
<option value='SG'>Singapore</option>
<option value='HK'>Hong Kong</option>
<option value='MY'>Malaysia</option>
</select>
</div>

@stop