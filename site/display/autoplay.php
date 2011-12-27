<?php

$Lvideo = getKey( "video", $LOCALGET );

echo <<<zz
<embed src="$Lvideo&autoplay=1&rel=0" 
	   type="application/x-shockwave-flash" wmode="transparent" ></embed>


zz;

?>