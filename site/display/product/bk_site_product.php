
<?php
//var_dump();
$qProd = $qProd[0];
$ProductName = $qProd[0]->product_name;
$ProductDesc = $qProd[0]->product_desc;
$Lsrc = $qProd[0]->product_logo;
$Ldsc = $qProd[0]->product_desc;

function buildbanditem( $cur ) {
		 $Lbname = $cur["name"];
		 $Lbtype = $cur["type"];
		 $Lbvalue = $cur["value"];
		 $rtn = "";
switch( $Lbtype ) {
case "PDCONTENT":
$rtn .= <<<zzz
<div class="insetbox1 frame_left vertscroll"><div><b>$Lbname</b></div><div>$Lbvalue</div></div>
zzz;
break;

case "PDIMAGE":
$rtn .= <<<zzz
<div class="insetbox1 frame_left"><div><b>$Lbname</b></div>
<div><img src="$Lbvalue" title="$Lbname" /></div>
</div>
zzz;
break;

case "PDMOVIE":
$rtn .= <<<zzz
<div class="insetbox1 frame_left"><iframe src="$Lbvalue" frameborder="0" class="insetbox1" allowfullscreen></iframe></div>
zzz;
break;


}

return $rtn;
}

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
$BANDID = 0;
$JSBand = array();
foreach( $Bands as $b ) {
$BANDID++;
$TheLinks = array();
if( !array_key_exists( $BANDID, $JSBand) ) { $JSBand[$BANDID ] = array(); }



if(count($b) ) {
/**/
$tmpName = "band${BANDID}_0";
$JSBand[$BANDID][] = $tmpName;
$TheLinks[] = <<<zz
<a href="javascript:toggleBand('$BANDID','$tmpName');">0</a>
zz;
$someHTML .= <<<zz
<h1>Band $BANDID</h1>

<div id="$tmpName" style="display:block"> 
zz;



$ctr = 0;
$bandid = 0;
foreach( $b as $cur ) {
$ctr++;
if( $ctr % 2 == 0) { 
$bandid++; 
$tmpName = "band${BANDID}_$bandid";
$JSBand[$BANDID][] = $tmpName;
$TheLinks[] = <<<zz
<a href="javascript:toggleBand('$BANDID','$tmpName');">$bandid</a>
zz;
$someHTML .= <<<zz
<div class="clear"></div></div> <!-- band${BANDID}_$bandid -->
<div id="$tmpName" style="display:none">

zz;
} 	 

$someHTML .= buildbanditem( $cur ) . "\n";

} //foreach
		
}
		
if( $ctr % 2 == 1) {  
$someHTML .= <<<zz
<div class="clear"></div>
</div>
zz;
} 

if( count($TheLinks) > 1 ) {
	foreach( $TheLinks as $L ) {
	$someHTML .= <<<zz
&nbsp;&nbsp;&nbsp;&nbsp; $L
zz;
   		}
   }
		
}

$locDisplay =<<<zzz
<div>
	 <div class="desccell"><h2>$ProductName</h2> <p>$ProductDesc</p></div> 
	 <div class="logocell">
	 	  <span class="frame_left preload"><img style="display: block; visibility: visible; opacity: 1;" src="$Lsrc" width="100px" title="$ProductDesc" alt=""></span>
	 </div> <div class="clear"></div>
	 <hr class="hr1">
</div>
<div>$someHTML</div>

zzz;
echo $locDisplay;

//var_dump($JSBand);

?>

<script>
function toggleBand( group, band) {
band = document.getElementById(band);

switch( group ) { //switch 1
<?php
$JSB = 0;
foreach( $JSBand as $B ) { //foreach $JSBand
echo "case '" . ++$JSB . "':\n";
	 foreach( $B as $b ) { //foreach $B
	 echo "document.getElementById('" . $b . "').style.display='none';\n";
	 } //foreach $B
echo "break;\n";
} //foreach $JSBand
?>
} //switch 1

band.style.display="";
} //toggleBand

</script>
