<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>
<?php
$vid = $_REQUEST['v'];
echo'<p>';
include '../ads/adsplayer.php';
echo'<p>';
echo '
<center>
<div class="embed-container">
<iframe src="https://www.youtube.com/embed/' . $vid . '" frameborder="0" allowfullscreen>
</iframe>
</div><p></p>
<audio controls="controls" class="img-responsive"><source src="//'.$_SERVER['HTTP_HOST'].'/vs.php?vv=' . $vid . '&quality=360" type="video/mp4"></audio>
</center>
<br/><br/><br/>
';
exit();