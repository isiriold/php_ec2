<div id="prodareas" class="ht1">

<?php
$idx = 0;
if( isquery($qProdDetail) ) { //query check
foreach( $qProdArea[0] as $area ) { //foreach 1
$idx++;
//prep tag params
$active = $area->product_area_active_flag;
$tagClass = ($active == 1)? "tagalive":"tagdead"; // this has to happen before toggling the active
$active = ($active == 1)? 0: 1 ;

$name = $area->child_concept_display;
$prodareaid = $area->product_area_id;
$areaid = $area->child_concept_id;

$productid = $area->product_id;
$tagName = "patag_" . $idx;
$tagURL = "?TASK=TOGGLEAREA&COMMIT=1&IDX=$tagName";
$tagURL.= "&ACTIVE=$active";
$tagURL.= "&NAME=$name";
$tagURL.= "&PRODUCTID=$Lproductid";
$tagURL.= "&PRODAREAID=$prodareaid";
$tagURL.= "&AREAID=$areaid";

echo buildTag( $tagName, $tagClass, $tagURL, $name); 

} // foreach 1
} //query check
?>

<div class="clear"></div>

</div> <!-- prodareas -->
	

