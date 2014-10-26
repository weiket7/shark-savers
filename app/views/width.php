<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script>
var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
document.write(width);

if ($('#desktopTest').is(':hidden')) {
  document.write('small');
} else {
	document.write('big');
}
</script>

<div id="desktopTest" class="hidden-xs">hidden-xs</div>
<br><br>

<div id="desktopTest" class="visible-sm visible-md visible-lg">visible-sm</div>

