@section('content')

<script type="text/javascript">
//function shareFacebook(width, height)	{
function shareFacebook()	{
	var width=600;
	var height=400;
	var leftPosition, topPosition;
  //Allow for borders.
  leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
  //Allow for title and status bars.
  topPosition = (window.screen.height / 2) - ((height / 2) + 50);
  var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
  u="http://www.robin-residences.org";
  t="Robin Residences new launch at District 10 along Robin Drive. View location map, details and register interest today!";
  window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer', windowFeatures);
  
}	
</script>

I'm FINished with FINS<br>
你好<br>
<br>
Do you want to make a difference?<br>
<br>
A pledge is a highly personal statement that lets others know what you
believe in, showing how you back up our convictions and beliefs. It is
something you will stand up for, and resist social and peer pressures. It is
something you wear as a badge and remain faithful to for life.
<br><br>

Your pledge will help us spread the message and encourage even more to
follow. Take the pledge today and help us reach the goal of getting 100,000
Singaporeans to also do the same. Together we can make a difference in
Singapore, and in the world.
<br><br>

Success!<br>
Thank you for your pledge!<br>
<br>
Visit our Facebook for more campaign updates :)
<br><br>

{{$count}}<br>
OF 100,000 PLEDGES NEEDED
<br><br>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<a href="https://twitter.com/intent/tweet?text=I'm FINished with FINS. Join the pledge now! http://www.finishedwithfins.org/sg/pledge">Yoast</a>
<input type='button' value='Share' class='btn btn-primary' onclick='shareFacebook()'/>
<input type='button' value='Tweet' class='btn btn-primary'/>


@stop