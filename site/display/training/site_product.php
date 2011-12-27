
<?php
//var_dump();
$qProd = $qProd[0];
$ProductName = $qProd[0]->product_name;
$ProductDesc = $qProd[0]->product_desc;
$Lsrc = $qProd[0]->product_logo;
$Ldsc = $qProd[0]->product_desc;


$Bands = array();
foreach( $qProd as $cur )
{
 if(! (array_key_exists($cur->detail_group_concept_code, $Bands )) ) {
 $Bands[$cur->detail_group_concept_code] = array();
 }
 $tmp = array();
 $tmp['type'] = $cur->detail_type_concept_code;
 $tmp['name']= $cur->detail_name;
 $tmp['value']= $cur->detail_value;
 if( strlen($cur->detail_type_concept_code) ) {  $Bands[$cur->detail_group_concept_code][] = $tmp; }
}

$someHTML="";

require_once "site_product_band.php";


$locDisplay =<<<zzz
<div>
	 <div class="fl1"><h2>$ProductName</h2> <p>$ProductDesc</p></div> 
	 <div class="fr1">
	 	  <span class="frame_left preload"><img style="display: block; visibility: visible; opacity: 1;" src="$Lsrc" width="100px" title="$ProductDesc" alt=""></span>
	 </div> <div class="clear"></div>
	 <!--<hr class="hr1">-->
</div>
<div>$someHTML</div>

zzz;
echo $locDisplay;

//var_dump($JSBand);

?>


<script>
/*
offsetParent
*/
function loadVideo( div , url ) {
var URL = "?TASK=AJAXPLAY&VIDEO=" + url;
callAjax( div, URL);

} //loadVideo
</script>