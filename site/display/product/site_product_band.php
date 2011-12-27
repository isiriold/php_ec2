
<?php
$ITEMSPERROW = 2;
foreach( $Bands as $B=>$CUR) { // $Bands 
//echo $B ." : " .print_r($CUR) ."<br />" ;
$BG = 0;
$tglLnks = "";

switch($B) { //switch
case "PGONE":
	$tmpTtl = "Interesting Information";
	break;
case "PGTWO":
	$tmpTtl = "Product Media";
	break;
default:
	$tmpTtl = "More Information";
	break;
}//switch


$someHTML.= <<<zz
<div id="$B" class="posrel" > <!-- $B -->
<div class="ht1"><div class="ds bgBase pad2"><h6 class="h1a">$tmpTtl</h4></div></div>

<div id="${B}_$BG" class="fl1 posrel"  style="display:block;">
zz;


   foreach( $CUR as $b=>$cur ) { // $CUR

//detail item   
$someHTML.= buildbanditem( $cur ) . "\n"; 
 
if( $b && (($b+1) % $ITEMSPERROW) == 0 && ($b+1) < count($CUR) ) { // set open div
$BG++;
$someHTML.= <<<zzz
</div><div id="${B}_${BG}" class="fl1 posrel"  style="display:none;">

zzz;
} // set open div
   
   }// $CUR
$count = 1;
if( $BG > 0 ) { // show link?
$tglLnks .= "Pages: ";
for( $tmp = 0; $tmp <= $BG; $tmp++) {// link builder
$tmpImg = ($tmp) ? "dot.png" : "dot_active.png";
$tmpId = "${B}_${tmp}";
$tlClass = ( $tmp == 0 )? "bgAlt":"bgOff";


$tglLnks .= makeButton( $type="BUTTON", $display="$count", $id="${tmpId}_LINK", $func="toggleBand( '${B}', '$tmpId');", $class="$tlClass bgcolor2" );
$count++;
}// link builder
}// show link?
   
   
$someHTML.= <<<zz
</div>
	 <div class="clear"></div>
	 
<p>$tglLnks</p>
	 
</div> <!-- $B -->

zz;

} // $Bands 



?>

<script>
var INACTIVECLASS = "bgOff";
var ACTIVECLASS = "bgAlt";

function switchLastClass( el , onOff ) {
var cn = el.className;
var rtn = ( onOff==1) ? cn.replace( INACTIVECLASS , ACTIVECLASS ) : cn.replace( ACTIVECLASS , INACTIVECLASS );
return rtn;
} //switchLastClass

function toggleBand( group, band) {
var bandlink = band + '_LINK';
bandlink = document.getElementById(bandlink);
band = document.getElementById(band);


switch( group ) { //switch 1
<?php
foreach( $Bands as $B=>$CUR) { // $Bands 
echo "case '$B':\n";
$tmpCTR = 0;
	 foreach( $CUR as $b=>$cur ) { // $CUR
	 if( $b % $ITEMSPERROW == 0 ) {
echo <<<xx
document.getElementById('${B}_${tmpCTR}').style.display='none';
curLnk=document.getElementById('${B}_${tmpCTR}_LINK');
curLnk.className = switchLastClass(curLnk,0);
xx;
		 $tmpCTR++;
	  }
	 } // $CUR
echo "break;\n";
}// $Bands
?>

} //switch 1

band.style.display="";
bandlink.className = switchLastClass(bandlink,1);


//bandimg.src="site/img/dot_active.png";
} //toggleBand


</script>