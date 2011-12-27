<?php

function containerType1(
$id , $title, $content, $class1,
$min=1,$close=1
) {

$btnMin = "";
if( $min == 1) $btnMin =<<<zz
<a href="javascript:toggleDisplay('content_$id');">[_]</a>
zz;

$btnCls = "";
if( $close == 1) $btnCls =<<<zz
[x]
zz;
$btns = "";
if( strlen( $btnMin . $btnCls ) ) $btns =<<<zz
<div id="titleclose_$id" class="cntrFR cntrPR">
$btnMin  $btnCls
</div> <!-- titleclose_$id -->
zz;

$rtn = <<<zzz
<div id="container_$id" class="$class1 cntrMargin">
	 <div id="titlebar_$id" class="cntrBrdr cntrTb cntrW1 cntrT cntrTbg">
	 	  <div id="titlecontent_$id" class="cntrFL cntrPL">
		  $title
		  </div> <!-- titlecontent_$id -->
		  $btns		  
		  <div class="cntrClear"></div><!-- cntrClear -->
	 </div> <!-- titlebar_$id -->
	 <div id="content_$id" class="cntrBrdr cntrCb cntrW1 cntrC cntrCbg">
	 	  <div class="cntrPR cntrPL">$content</div>
	 </div> <!-- content_$id -->
	 <div id="closebar_$id" class="cntrBrdr cntrBb cntrW1 cntrB cntrBbg">
		  <div class="cntrClear"></div><!-- cntrClear -->
	 </div> <!-- closebar_$id --> 
</div>  <!-- container_$id -->
zzz;
  
return $rtn;
}  



function containerTypeOpen( $id , $title, $class1,$min=1,$close=1)
{

$btnMin = "";
if( $min == 1) $btnMin =<<<zz
<a href="javascript:toggleDisplay('content_$id');">[adsfdasf]</a>
zz;

$btnCls = "";
if( $close == 1) $btnCls =<<<zz
[x]
zz;
$btns = "";
if( strlen( $btnMin . $btnCls ) ) $btns =<<<zz
<div id="titleclose_$id" class="cntrFR cntrPR">
$btnMin  $btnCls
</div> <!-- titleclose_$id -->
zz;

$rtn = <<<zzz
<div id="container_$id" class="$class1 cntrMargin">
	 <div id="titlebar_$id" class="cntrBrdr cntrTb cntrW1 cntrT cntrTbg">
	 	  <div id="titlecontent_$id" class="cntrFL cntrPL">
		  $title
		  </div> <!-- titlecontent_$id -->
		  $btns		  
		  <div class="cntrClear"></div><!-- cntrClear -->
	 </div> <!-- titlebar_$id -->
	 <div id="content_$id" class="cntrBrdr cntrCb cntrW1 cntrC cntrCbg">
	 	  <div class="cntrPR cntrPL">
zzz;
return $rtn;
}

function containerTypeClose($id) {
$rtn = <<<zzz
		  </div>
	 </div> <!-- content_$id -->
	 <div id="closebar_$id" class="cntrBrdr cntrBb cntrW1 cntrB cntrBbg">
		  <div class="cntrClear"></div><!-- cntrClear -->
	 </div> <!-- closebar_$id --> 
</div>  <!-- container_$id -->
zzz;
  
return $rtn;
}



function COpenType_1( $id , $title, $class1,$min=0,$close=0 ) {

$btnMin = "";
if( $min == 1) $btnMin =<<<zz
<a href="javascript:toggleDisplay('content_$id');">[adsfdasf]</a>
zz;

$btnCls = "";
if( $close == 1) $btnCls =<<<zz
[x]
zz;
$btns = "";
if( strlen( $btnMin . $btnCls ) ) $btns =<<<zz
<div id="titleclose_$id" class="cntrFR cntrPR">
$btnMin  $btnCls
</div> <!-- titleclose_$id -->
zz;

$rtn = <<<zzz
<div id="container_$id" class="$class1 cntrMargin">
	 <div id="titlebar_$id" class="bdrType1 ">
	 	  <div id="titlecontent_$id" class="">
		  <h3 class="h3_1">$title</h3>
		  </div> <!-- titlecontent_$id -->
		  $btns	  
		  <div class="cntrClear"></div><!-- cntrClear -->
	 </div> <!-- titlebar_$id -->
	 <div id="content_$id" class="cntrBrdr cntrCb cntrW1 cntrC cntrCbg">
	 	  <div class="cntrPR cntrPL">
zzz;
return $rtn;
}








/*************************************************************************
**************************************************************************
**************************************************************************
*************************************************************************/

function DivOpenType1( $id, $wrapperclass="", $ctnrClass ="", $type = 1, $title = "", $titleClass="", $titleBG= 0 ) {
$Ltitle = "";
if( strlen( $title) > 0 ) {
$Ltitle = <<<zzz
<h1 class="$titleClass">$title</h1>
zzz;
}
$Lbg = "";
if( $titleBG == 1) { $Lbg = "bg_$type"; }


$rtn = <<<zzz
<div id="$id" class="$wrapperclass">
	 <div class="bdrWidth_$type bdrColor_$type bdrStyle_$type bdrCurveTop_$type bdrSansT_$type divWidth_$type $Lbg" >
	 <!-- border top -->
	 $Ltitle 
	 </div>
zzz;

$rtn .= <<<zzz
<div id="child_$id" class="bdrWidth_$type bdrColor_$type bdrStyle_$type divWidth_$type bdrSansT_$type bdrSansB_$type $ctnrClass">
<!-- Open child_$id -->
zzz;
return $rtn;
}

function DivCloseType1($id, $type=1) {
$rtn = <<<zzz
<!-- Close child_$id -->
</div>
<div class="bdrWidth_$type bdrColor_$type bdrStyle_$type bdrCurveBottom_$type divWidth_$type bdrSansB_$type divHeight_$type" >
<!-- border bottom -->
</div>
</div> <!-- $id end -->
zzz;
return $rtn;
}





?>
