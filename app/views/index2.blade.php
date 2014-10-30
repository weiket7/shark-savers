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
		$('#pop-ambassador-title').text($('#A'+id).attr('data-title'));
		$('#pop-ambassador-image1').attr('src', "http://www.adoptadog.sg/sharksavers/img/grid/"+image);
		$('#pop-ambassador-image2').attr('src', "http://www.adoptadog.sg/sharksavers/img/grid/"+image);
		$('#ambassador-modal').modal();
	}

	function showVideo(id) {
		var link = $('#V'+id).attr('data-link');
		$('#pop-video-title').text($('#V'+id).attr('data-title'));
		$('#pop-video-link').attr('src', '//www.youtube.com/embed/'+link);
		$('#video-modal').modal();
	}

	function showSupporter(id) {
		$('#pop-supporter-title').text($('#S'+id).attr('data-title'));
		var image = $('#S'+id).attr('data-image');
		$('#pop-supporter-image').attr('src', "http://www.adoptadog.sg/sharksavers/img/grid/"+image);
		var logo = $('#S'+id).attr('data-logo');
		$('#pop-supporter-logo').attr('src', "http://www.adoptadog.sg/sharksavers/img/grid/"+logo);
		$('#pop-supporter-logo-small').attr('src', "http://www.adoptadog.sg/sharksavers/img/grid/"+logo);
		$('#pop-supporter-text').text($('#S'+id).attr('data-text'));
		$('#supporter-modal').modal();
	}

	function shareFacebook()	{
		var width=600;
		var height=400;
		var leftPosition, topPosition;
	  //Allow for borders.
	  leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
	  //Allow for title and status bars.
	  topPosition = (window.screen.height / 2) - ((height / 2) + 50);
	  var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
	  var u="http://www.finishedwithfins.org";
	  var t="I'm FINished with FINS. Join the pledge now! http://www.finishedwithfins.org/sg/pledge";
	  window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&message='+encodeURIComponent(t),'sharer', windowFeatures);
	  
	}	
</script>

<div class='shark-bg'>
	
</div>

<div class='container'>
	<ul class="bxslider">
	  @foreach ($sliders as $key => $s)
			@if ($s['image'] !='')
				<li>{{ HTML::image('img/'.$s['image'],'') }}</li>
			@endif
		@endforeach
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
		<div class='col-md-4'>
			<div class='grid-inner'>
				<!--http://stackoverflow.com/questions/2743989/vertically-aligning-divs-->
				@if($g->type == 'A')
					{{HTML::image('img/grid/'.$g->image,'a',['class'=>'grey', 'width'=>'100%', 'height'=>'100%', 'onclick'=>"showAmbassador(".$g->id.")"])}}
				@elseif($g->type == 'V')
					{{HTML::image('img/video-play.png', '', ['style'=>'position:absolute; top:125px; left: 125px; z-index:100'])}}
					{{HTML::image('img/grid/'.$g->image,'a',['class'=>'grey', 'width'=>'100%','onclick'=>"showVideo(".$g->id.")"])}}
				@elseif($g->type == 'S')
					<div style='width:100%; height:270px; background-color:#fff; text-align:center; padding-top:100px' onclick=showSupporter('{{$g->id}}')>
					{{HTML::image('img/grid/'.$g->logo,'',['class'=>'grey', 'style'=>'height:100px; width:100px; display:inline'])}}
					</div>
				@endif

				<?php $category_arr = ['A'=>'Artiste','E'=>'Entertainment','C'=>'Corporate', 'M'=>'Musician', 'O'=>'Others'] ?>
				@if($g->type == 'A')

					<div class='grid-text'>{{$category_arr[$g->category]}}: {{$g->title}}</div>
				@else
					<div class='grid-text'>{{$g->title}}</div>					
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

<?php
$url = explode('/',Request::path());
$country = $url[0];
$country_arr = array('SG'=>'Singapore', 'MY'=>'Malaysia', 'HK'=>'Hong Kong');
?>

<div class="modal fade" id="ambassador-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style='width:900px;'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
        	{{HTML::image('img/close.jpg', '', ['height'=>'40px'])}}
        </button>
        <h4 class="modal-title pop-title" id="myModalLabel"><div id='pop-ambassador-title'></div></h4>
      </div>

      <div class="modal-body" style='text-align:center'>
      	<img src='' id='pop-ambassador-image1' style='width:60%' class='hidden-xs hidden-sm hidden-md'/>      	
      	<img src='' id='pop-ambassador-image2' style='width:100%' class='visible-xs visible-sm visible-md'/>      	
      	<!-- <div class='hidden-sm hidden-xs'>
		      <div style='position:absolute; top:60px; left:20px; z-index:1'>
	        	@if ($country == 'hk')
	        		{{HTML::image('img/im-finished-hk.png')}}
	        	@else
	        		{{HTML::image('img/im-finished-sgmy.png')}}
	        	@endif
	        </div>

	        <div style='text-align:right'>
	        	<img src='' id='pop-ambassador-image1' style='height:482px'/>
	        </div>
        </div> -->

        <!-- <div class='visible-sm visible-xs row'>
       	 	@if ($country == 'hk')
        		{{HTML::image('img/im-finished-hk.png')}}
        	@else
        		{{HTML::image('img/im-finished-sgmy.png')}}
        	@endif
        	<img src='' id='pop-ambassador-image2'/>
        </div> -->
      </div>      

      <div class="modal-footer" style='border-top: 4px solid red; text-align:left'>
      	{{HTML::image('img/share-facebook.png', '', ['onclick'=>'shareFacebook()', 'style'=>'height:40px'])}}

				<a href="https://twitter.com/intent/tweet?text=I'm FINished with FINS. Join the pledge now! http://www.finishedwithfins.org/sg/pledge">
				  {{HTML::image('img/share-twitter.png', '', ['style'=>'height:40px'])}}
				</a>			
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="video-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style='width:900px;'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
        	{{HTML::image('img/close.jpg', '', ['height'=>'40px'])}}
        </button>
        <h4 class="modal-title pop-title"><div id='pop-video-title'></div></h4>
      </div>

      <div class="modal-body">
		    <iframe width="100%" height="500" src="" id='pop-video-link' frameborder="0" allowfullscreen></iframe>
      </div>      

      <div class="modal-footer" style='text-align:left'>
      	{{HTML::image('img/share-facebook.png', '', ['onclick'=>'shareFacebook()', 'style'=>'height:40px'])}}

				<a href="https://twitter.com/intent/tweet?text=I'm FINished with FINS. Join the pledge now! http://www.finishedwithfins.org/sg/pledge">
				  {{HTML::image('img/share-twitter.png', '', ['style'=>'height:40px'])}}
				</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="supporter-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style='width:900px;'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
        	{{HTML::image('img/close.jpg', '', ['height'=>'40px'])}}
        </button>
      	<h4 class="modal-title pop-title">
      		<img id='pop-supporter-logo-small'  height='30px' src=''>&nbsp;
      		<span id='pop-supporter-title'></span>
      	</h4>
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

      <div class="modal-footer" style='text-align:left'>
      	<span class='share-facebook' onclick='shareFacebook()'></span>
				<a href="https://twitter.com/intent/tweet?text=I'm FINished with FINS. Join the pledge now! http://www.finishedwithfins.org/sg/pledge">
				  <span class='share-twitter'></span>
				</a>
      	<a href='{{$g->link}}' target='_blank'><span class='visit-site'></span></a>	
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