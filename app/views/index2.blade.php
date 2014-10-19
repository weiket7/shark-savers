@section('content')

<script src="{{asset('js/jquery.bxslider.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/jquery.bxslider.css') }}">

<style type="text/css">
	.bx-wrapper .bx-viewport {
	  -moz-box-shadow: 0 0 0px #ccc;
	  -webkit-box-shadow: 0 0 0px #ccc;
	  box-shadow: 0 0 0px #ccc;
	  border:  0px solid #000;
	  left: 0px;
	  background: #fff;
	  
	  /*fix other elements on the page moving (on Chrome)*/
	  -webkit-transform: translatez(0);
	  -moz-transform: translatez(0);
	      -ms-transform: translatez(0);
	      -o-transform: translatez(0);
	      transform: translatez(0);
	}
</style>

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

	function showVideo(id) {
		var link = $('#V'+id).attr('data-link');
		$('#pop-video-link').attr('src', '//www.youtube.com/embed/'+link);
		$('#pop-video-title').text($('#V'+id).attr('data-title'));
		$('#video-modal').modal();
	}

	function showSupporter(id) {
		$('#pop-supporter-company').text($('#S'+id).attr('data-company'));
		var image = $('#S'+id).attr('data-image');
		$('#pop-supporter-image').attr('src', "{{URL::to('img/supporter')}}/"+image);
		var logo = $('#S'+id).attr('data-logo');
		$('#pop-supporter-logo').attr('src', "{{URL::to('img/supporter')}}/"+logo);
		$('#pop-supporter-text').text($('#S'+id).attr('data-text'));
		$('#supporter-modal').modal();
	}
</script>

<div class='shark-bg'>
	
</div>

<div class='container'>
	<ul class="bxslider">
	  <li>{{HTML::image('img/landing.png')}}</li>
	  <!-- <li><img src="http://localhost/sharksavers/public/img/hill_road.jpg" title="The long and winding road" /></li>
	  <li><img src="http://localhost/sharksavers/public/img/trees.jpg" title="Happy trees" /></li> -->
	</ul>
</div>

	<!-- <div class='col-md-12'>
	</div> -->
</div>

<?php
	$grid = ['grid1.jpg', 'grid1.jpg', 'grid1.jpg', 'grid1.jpg', 'grid1.jpg', 'grid1.jpg'];
	//var_dump($grids);
	$videos_obj = Video::all();
	foreach ($videos_obj as $key=>$v) {
		echo "<div id='V".$v->id."' data-link='".$v->link."' data-title='".$v->title."' data-text='".$v->text."' style='display:none'></div>";
	}
	$supporters_obj = Supporter::all();
	foreach ($supporters_obj as $key=>$v) {
		echo "<div id='S".$v->id."' data-company='".$v->company."' data-logo='".$v->logo."' data-image='".$v->image."' data-text='".$v->text."' style='display:none'></div>";
	}
	//var_dump($videos);
?>

<div class='container'>
	<?php
	$count = 1;
	$total = count($grid);
	foreach($grids as $key => $g) {
	if (($count-1)%3==0) 
			echo "<div class='row'>";
	?> 
		<div class='col-md-4 grid-outer'>
			<div class='grid-inner'>
				@if($g->type == 'A')
					{{HTML::image('img/'.$g->image,'a',['width'=>'285px','onclick'=>'showAmbassador()'])}}
				@elseif($g->type == 'V')
					{{HTML::image('img/'.$g->image,'a',['width'=>'285px','onclick'=>"showVideo(".$g->content_id.")"])}}
				@elseif($g->type == 'S')
					{{HTML::image('img/'.$g->image,'a',['width'=>'285px','onclick'=>"showSupporter(".$g->content_id.")"])}}
				@endif
				<div class='grid-text'>{{$g->caption}}</div>
				<!-- <span class='grid-down'>{{HTML::image('img/down.png')}}</span> -->
			</div>
		</div>

	<?php
	if ($count % 3 == 0 || $count == $total) {
		echo "</div>";
	}
	$count++;
	} ?>	
	
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

<div class="modal fade" id="video-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style='width:900px;'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title pop-title" id="myModalLabel"><div id='pop-video-title'></div></h4>
      </div>

      <div class="modal-body">
		    <iframe width="560" height="315" src="//www.youtube.com/embed/dc39XlwahUY?rel=0" id='' frameborder="0" allowfullscreen></iframe>
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

<div class="modal fade" id="supporter-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style='width:900px;'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title pop-title" id="myModalLabel"><div id='pop-supporter-company'></div></h4>
      </div>

      <div class="modal-body">
      	<img id='pop-supporter-image' src=''>
      	<br><br>
      	<table>
	      	<tr>
		      	<td width='350px' style='text-align:center'>
		      		<img id='pop-supporter-logo' src=''>
		      	</td>
		      	<td>
		      		<div id='pop-supporter-text'></div>
		      	</td>
	      	</tr>
      	</table>
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