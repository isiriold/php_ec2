<?php

function displayVideos($content) {

$rtn = ""; 



$rtn = <<<zz
<iframe src="$content" frameborder="0" class="trainingMOVIE"></iframe>
zz;

return $rtn;


}

if ($USERLOGGED != 1)
{
echo <<<xx
<h2 class="">ATTENTION: Please Log in to access Training and Knowledge &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;modules</h2>
xx;
}


else
{

//echo "hello world";

// need to make this more dynamic to be able to show series of videos
// will come back and clean this up later

//require "site/display/training/training_videos.html";

echo '<p class="btnArticleChnl clr2"> Product Training Videos <p>';

echo '<div>';

echo displayVideos('http://www.youtube.com/embed/x_jdpXO0_ss');

echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

echo displayVideos('http://www.youtube.com/embed/e1aV34vlN0Q');

echo '</div>';


//echo "after video";

require "site/display/training/training_loggedin.html";

//echo "hello world";

}
?>
