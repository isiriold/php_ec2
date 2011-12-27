<?php
$idx = getKey("idx" ,$LOCALGET); 
$name = getKey("name" ,$LOCALGET); 
$profileid = getKey("profileid" ,$LOCALGET); 
$pppid = getKey("pppid" ,$LOCALGET);
$detailid = getKey("detailid" ,$LOCALGET);
$active = getKey("active" ,$LOCALGET) ;
$tagClass = ($active == 1)? "tagalive":"tagdead"; // this has to happen before toggling the active
$active = ($active == 1)? 0: 1 ;
$productid = getKey("productid" ,$LOCALGET);
$tagName = $idx; //"tag_" . $idx;
$tagURL = "?TASK=TOGGLEDP&COMMIT=1&PPPID=$pppid&PROFILEID=$profileid&DETAILID=$detailid&PRODUCTID=$productid&NAME=$name&ACTIVE=$active&IDX=$tagName";

echo buildTagContent( $idx, $tagClass, $tagURL, $name); 

?>