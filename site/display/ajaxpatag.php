<?php
//prep tag params
$idx = getKey("idx" ,$LOCALGET);

$active = getKey("active" ,$LOCALGET);
$tagClass = ($active == 1)? "tagalive":"tagdead"; // this has to happen before toggling the active
$active = ($active == 1)? 0: 1 ;

$tagName = $idx;

$name = getKey("name" ,$LOCALGET);
$productid = getKey("productid" ,$LOCALGET);
$prodareaid = getKey("prodareaid" ,$LOCALGET);
$areaid = getKey("areaid" ,$LOCALGET);


$tagURL = "?TASK=TOGGLEAREA&COMMIT=1&IDX=$tagName";
$tagURL.= "&ACTIVE=$active";
$tagURL.= "&NAME=$name";
$tagURL.= "&PRODUCTID=$productid";
$tagURL.= "&PRODAREAID=$prodareaid";
$tagURL.= "&AREAID=$areaid";

echo buildTag( $tagName, $tagClass, $tagURL, $name); 


?>