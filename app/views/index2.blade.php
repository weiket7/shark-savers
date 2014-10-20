@section('content')

<script type="text/javascript">
	$(document).ready( function() {
		$('.bxslider').bxSlider({
		  captions: true,
		  pager: false,
		});
	});

	function showAmbassador(id) {
		var image = $('#A'+id).attr('data-image');
		$('#pop-ambassador-image').attr('src', "{{URL::to('img/grid')}}/"+image);
		$('#pop-ambassador-title').text($('#A'+id).attr('data-title'));
		$('#ambassador-modal').modal();
	}

	function showVideo(id) {
		var link = $('#V'+id).attr('data-link');
		$('#pop-video-link').attr('src', '//www.youtube.com/embed/'+link);
		$('#pop-video-title').text($('#V'+id).attr('data-title'));
		$('#video-modal').modal();
	}

	function showSupporter(id) {
		$('#pop-supporter-title').text($('#S'+id).attr('data-title'));
		var image = $('#S'+id).attr('data-image');
		$('#pop-supporter-image').attr('src', "{{URL::to('img/grid')}}/"+image);
		var logo = $('#S'+id).attr('data-logo');
		$('#pop-supporter-logo').attr('src', "{{URL::to('img/grid')}}/"+logo);
		$('#pop-supporter-text').text($('#S'+id).attr('data-text'));
		$('#supporter-modal').modal();
	}
</script>

<div class='shark-bg'>
	
</div>

<div class='container'>
	<ul class="bxslider">
	  <li>{{HTML::image('img/landing2.png')}}</li>
	  <li>{{HTML::image('img/landing2.png')}}</li>
	  <!-- <li><img src="http://localhost/sharksavers/public/img/hill_road.jpg" title="The long and winding road" /></li>
	  <li><img src="http://localhost/sharksavers/public/img/trees.jpg" title="Happy trees" /></li> -->
	</ul>
</div>

	<!-- <div class='col-md-12'>
	</div> -->
</div>


<div class='container'>
	<?php
	$count = 1;
	$total = count($grids);
	$category_arr = array('A'=>'Artiste', 'C'=>'Corporate', 'O'=>'Others', 'E'=>'Entertainment');
	foreach($grids as $key => $g) {		
		if($g->type=='A') {
			echo "<div id='A".$g->id."' data-title='".$category_arr[$g->category].': '.$g->title."' data-image='".$g->image."' style='display:none'></div>";
		} elseif ($g->type=='V') {
			echo "<div id='V".$g->id."' data-link='".$g->link."' data-title='".$g->title."' data-text='".$g->text."' style='display:none'></div>";
		} elseif ($g->type='S') {
			echo "<div id='S".$g->id."' data-title='".$g->title."' data-logo='".$g->logo."' data-image='".$g->image."' data-text='".$g->text."' style='display:none'></div>";

		}
	if (($count-1)%3==0) 
			echo "<div class='row'>";
	?> 
		<div class='col-md-4 grid-outer'>
			<div class='grid-inner'>
				<!--http://stackoverflow.com/questions/2743989/vertically-aligning-divs-->
				@if($g->type == 'A')
					{{HTML::image('img/grid/'.$g->image,'a',['class'=>'grey', 'width'=>'285px','onclick'=>"showAmbassador(".$g->id.")"])}}
				@elseif($g->type == 'V')
					{{HTML::image('img/video-play.png', '', ['style'=>'position:absolute; top:125px; left: 125px; z-index:100'])}}
					{{HTML::image('img/grid/'.$g->image,'a',['class'=>'grey', 'width'=>'285px','onclick'=>"showVideo(".$g->id.")"])}}
				@elseif($g->type == 'S')
					<div style='width:285px; height:285px; background-color:#fff; text-align:center; padding-top:100px' onclick=showSupporter('{{$g->id}}')>
					{{HTML::image('img/grid/'.$g->logo,'',['class'=>'grey', 'style'=>'height:100px; width:100px; display:inline'])}}
					</div>
				@endif

				@if($g->type == 'A')
					<div class='grid-text'>Ambassador: {{$g->title}}</div>
				@else
					<div class='grid-text'>{{$g->caption}}</div>					
				@endif
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

<div class="modal fade" id="ambassador-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style='width:900px;'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
        	{{HTML::image('img/close.jpg')}}
        </button>
        <h4 class="modal-title pop-title" id="myModalLabel"><div id='pop-ambassador-title'></div></h4>
      </div>

      <div class="modal-body" style='height:497px'>
		      <div style='position:absolute; top:60px; left:20px; z-index:1'>
	        	{{HTML::image('img/im-finished-large.png')}}
	        </div>

	        <div style='text-align:right'>
	        	<img src='' id='pop-ambassador-image' style='height:482px'/>
	        </div>
      </div>      

      <div class="modal-footer" style='border-top: 4px solid red'>
	      <div class='col-xs-9' style='text-align:left'>
	      	{{HTML::image('img/share-facebook.png', '', ['onclick'=>'shareFacebook()', 'style'=>'height:40px'])}}

					<a href="https://twitter.com/intent/tweet?text=I'm FINished with FINS. Join the pledge now! http://www.finishedwithfins.org/sg/pledge">
					  {{HTML::image('img/share-twitter.png', '', ['style'=>'height:40px'])}}
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
        <button type="button" class="close" data-dismiss="modal">
        	{{HTML::image('img/close.jpg')}}
        </button>
      </div>

      <div class="modal-body">
		    <iframe width="100%" height="500" src="" id='pop-video-link' frameborder="0" allowfullscreen></iframe>
      </div>      

      <div class="modal-footer">
	      <div class='col-xs-9' style='text-align:left'>
	      	{{HTML::image('img/share-facebook.png', '', ['onclick'=>'shareFacebook()', 'style'=>'height:40px'])}}

					<a href="https://twitter.com/intent/tweet?text=I'm FINished with FINS. Join the pledge now! http://www.finishedwithfins.org/sg/pledge">
					  {{HTML::image('img/share-twitter.png', '', ['style'=>'height:40px'])}}
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
        <button type="button" class="close" data-dismiss="modal">
        	{{HTML::image('img/close.jpg')}}
        </button>
      </div>

      <div class="modal-body">
      	<img id='pop-supporter-image' src=''>
      	<br><br>
      	<table>
	      	<tr>
		      	<td width='300px' style='text-align:center;'>
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
	      	{{HTML::image('img/share-facebook.png', '', ['onclick'=>'shareFacebook()', 'style'=>'height:40px'])}}

					<a href="https://twitter.com/intent/tweet?text=I'm FINished with FINS. Join the pledge now! http://www.finishedwithfins.org/sg/pledge">
					  {{HTML::image('img/share-twitter.png', '', ['style'=>'height:40px'])}}
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