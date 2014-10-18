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

	function showAmbassador() {
		$('#myModal').modal();
	}
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

<br>
<div class='shark-bg'>
	
</div>

<div class='container'>
	<div class='col-md-12'>
		{{HTML::image('img/landing.png')}}
	</div>
</div>

<?php
	$grid = ['grid1.jpg', 'grid1.jpg', 'grid1.jpg', 'grid1.jpg', 'grid1.jpg', 'grid1.jpg'];
?>

<div class='container'>
	<?php
	$count = 1;
	$total = count($grid);
	foreach($grid as $key => $g) {
	if (($count-1)%3==0) 
			echo "<div class='row'>";
	?> 
		<div class='col-md-4 grid-outer'>
			<div class='grid-inner'>
				{{HTML::image('img/'.$g,'a',['width'=>'285px','onclick'=>'showAmbassador()'])}}
				<div class='grid-text'>LOREM IPSUM DOLOR SIT AMET</div>
				<!-- <span class='grid-down'>{{HTML::image('img/down.png')}}</span> -->
			</div>
		</div>

	<?php
	if ($count % 3 == 0 || $count == $total) {
		echo "</div>";
	}
	$count++;
	} ?>	
	

	<?php
	/*echo "<table class='grid-tbl'>";
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
			echo HTML::image('img/'.$g, '', ['class'=>'grid-img', 'onclick'=>'showAmbassador()']);
			echo '<br>';
			echo "<div class='grid-text'>LOREM IPSUM DOLOR SIT AMET</div>";
			echo "<div class='grid-down'><img src='".URL::to('/img/down.png')."'/></div>";
		echo "</td>";

		if ($cur % $col_limit == 0 || $cur == $count) {
			echo "</tr>";
		}
			
		$cur += 1;

	}
	echo "</table>";*/
		
	?>
</div>

<div style='height:50px'>&nbsp;</div>

<?php $grid = Grid::find(1) ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style='width:900px;'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title pop-title" id="myModalLabel">{{$grid->name1.' '.$grid->name2}}</h4>
      </div>

      <div class="modal-body" style='height:500px'>
		      <div style='position:absolute; top:60px; left:20px; z-index:1'>
	        	{{HTML::image('img/im-finished2.jpg')}}
	        </div>

	        <div style='position:absolute; left:350px'>
	        	{{HTML::image('img/kimberly-chia.png')}}
	        </div> 

	        <div style='position:absolute; top:30px; left:700px; text-align:left'>
		        <div class='pop-name'>
		        	{{$grid->name1}}<br>
		        	{{$grid->name2}}
		        </div>
		        <div class='pop-sub'>
			        {{$grid->sub1}}<br>
			        {{$grid->sub2}}
		        </div>
	        </div>
      </div>      

      <div class="modal-footer">
	      <div class='col-xs-9' style='text-align:left'>
	      	{{HTML::image('img/share-facebook.jpg', '', ['onclick'=>'shareFacebook()', 'style'=>'height:40px'])}}

					<a href="https://twitter.com/intent/tweet?text=I'm FINished with FINS. Join the pledge now! http://www.finishedwithfins.org/sg/pledge">
					  {{HTML::image('img/share-twitter.jpg', '', ['style'=>'height:40px'])}}
					</a>
				</div>

				<div class='col-xs-3' style='text-align:right'>
	      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </div>
    </div>
  </div>
</div>

@stop