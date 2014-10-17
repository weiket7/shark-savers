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

<!-- <ul class="bxslider">
  <li><img src="http://localhost/sharksavers/public/img/tree_root.jpg" title="Funky roots" /></li>
  <li><img src="http://localhost/sharksavers/public/img/hill_road.jpg" title="The long and winding road" /></li>
  <li><img src="http://localhost/sharksavers/public/img/trees.jpg" title="Happy trees" /></li>
</ul>

<div class='col-xs-9'>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus
tincidunt dolor a molestie. Maecenas cursus rutrum magna, nec cursus nisl
gravida non. Vivamus cursus erat nunc.
</div> -->

{{HTML::image('img/landing.png')}}
<br>

<?php
echo "<table class='grid-tbl'>";
$grid = ['grid1.jpg', 'grid1.jpg', 'grid1.jpg', 'grid1.jpg', 'grid1.jpg', 'grid1.jpg'];
$cur=1;
$last_col_of_row = 0;
$count = count($grid);
$col_limit = 3;	

foreach($grid as $key => $g) {

	if (($cur-1) % $col_limit == 0) {		//1st item of row = 1, 5, 9
		echo "<tr>";
		$last_col_of_row += $col_limit;		//last col of row = 4, 8, 12
	}

	echo "<td>";
		echo HTML::image('img/'.$g, '', ['class'=>'grid-img']);
		echo '<br>';
		echo 'HELLO WORLD HEY HELLO WORLD';
	echo "</td>";

	if ($cur % $col_limit == 0 || $cur == $count) {
		echo "</tr>";
	}
		
	$cur += 1;

}
echo "</table>";
	
?>

@stop