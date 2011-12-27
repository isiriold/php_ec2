<?php

function makeButton( $type="", $display="", $id="", $func="", $class="" ) {
if( strlen( $type ) == 0 ) { $type="SUBMIT";}
return <<<zz
<a href="javascript:$func //" class="btnlnk ds clr1 $class" title="" id="$id" name="$id">$display</a>
zz;
} //makeButton

function makeInput( $type="", $name="", $class="", $value="", $options=array(), $func="" ) {
$rtn="";
switch( strtolower($type) ) { // switch 1
case "text":
	 $rtn.=makeTextInput( $name, $class, $value, $func);
	 break;
case "password":
	 $rtn.=makePasswordInput( $name, $class, $value, $func);
	 break;
case "select":
	 $rtn.=makeDropdown( $name, $class, $options, $value, $func);
	 break;
case "textarea":
	 $rtn.=makeTextarea( $name, $class, $value, $func );
	 break;
} // switch 1

	 $rtn.=makeHiddenInput( "org_" . $name, $value);
	 return $rtn;
}

function makeHiddenInput( $name="", $value="") {
return <<<zz
<input type="hidden" id="$name" name="$name" value="$value" />
zz;
}

function makeTextInput( $name="", $class="", $value="", $func="") {
return <<<zz
<input type="text" class="$class" id="$name" name="$name" value="$value" $func />
zz;
}

function makePasswordInput( $name="", $class="", $value="", $func="") {
return <<<zz
<input type="password" class="$class" id="$name" name="$name" value="$value" $func/>
zz;
}

function makeTextarea( $name="", $class="", $value="", $func="" ) {
return <<<zz
<textarea class="$class" id="$name" name="$name" $func >$value</textarea>
zz;
} //makeTextarea

function makeFile( $name="", $class="", $value="", $display="Change Logo" ) {
$rtn = makeButton( $type="BUTTON", $display="$display", $id="$name", $func="void(0);", $class="pad2" );
$rtn = <<<zz

<div class="fileWidth filecontainer">
<input type="file" id="$name" name="$name" class="fileWidth file pad2" />
$rtn
<div class="clear"></div>
</div>

zz;

return $rtn;
}

function makeDropdown( $name="", $class="", $options=array(), $selectedValue="",$func) {
$rtn = <<<zz
<select class="$class" id="$name" name="$name" $func><option>[select]</option>
zz;

if( isQuery( $options ) ) { //isquery or isarray 

foreach( $options[0] as $option ) {
	$lVal = $option->child_concept_id;
	$lDis = $option->child_concept_display;
	$lSel = ($lVal==$selectedValue)? "SELECTED": "";
	$rtn .= <<<zz
<option value="$lVal" $lSel>$lDis</option>
zz;
} //foreach( $options as $option )

} else {//isquery or isarray

foreach( $options as $option ) {
	$lVal = $option["value"];
	$lDis = $option["display"];
	$lSel = ($lVal==$selectedValue)? "SELECTED": "";
	$rtn .= <<<zz
<option value="$lVal" $lSel>$lDis</option>
zz;
} //foreach( $options as $option )

}//isquery or isarray


$rtn.= "</select>";

return $rtn;
} //makeDropdown


function makeProfile( $idx, $name, $profileid, $pppid, $detailid, $active=1 ) {
$tag = ($active)? "tagalive" : "tagdead" ;
if( is_numeric($profileid) ) {

$rtn = makeProfileTag( $idx, $name, $profileid, $pppid, $detailid,$active );
$rtn = <<<zzz
<div class="fl tag $tag" id="tag_$idx">
$rtn
</div>
zzz;
} else {
$rtn = "";
}

return $rtn;
} //makeProfile

function makeProfileTag( $idx, $name, $profileid, $pppid, $detail,$active=1 ) {

return <<<zzz
<a href="javascript: toggleTag($idx);">[x]</a>
<b id="proname_$idx">$name</b>
<input type="hidden" value="$profileid" id="profileid_$idx" name="profileid_$idx" />
<input type="hidden" value="$active" id="pfactive_$idx" name="pfactive_$idx" />
<input type="hidden" value="$pppid" id="pppid_$idx" name="pppid_$idx" />
<input type="hidden" value="$detail" id="detailid_$idx" name="detailid_$idx" />
zzz;

} //makeProfileTag

function makeMemProdTag($idx="", $memprodid="", $memberid="", $productid="", $active="", $sort="") {
	$tag = ($active)? "tagalive" : "tagdead" ;
	$rtn = makeMemProd($idx=$idx, $memprodid=$memprodid, $memberid=$memberid, $productid=$productid, $active=$active, $sort=$sort);
if( is_numeric( $memberid) || 1==1) {
$rtn = <<<zzz
<div class="tag $tag" id="pro_$idx">$rtn</div>
zzz;
} else {
$rtn = "";
}
return $rtn;
} //makeMemProdTag

function buildOptions( &$Options , $itm ) {
$rtn = "";

if( isQuery( $Options ) ) { //if A
	foreach( $Options[0] as $cur ) { //foreach A
	$val = $cur->child_concept_id;
	$dsp = $cur->child_concept_display;
	$sel = ( $itm == $val )? "SELECTED":"";
	$rtn.= <<<zz
<option value="$val" $sel>$dsp</option>
zz;
   } //foreach A
} //if A
return $rtn;

} //buildOptions


function makeMemProd( $idx="", $memprodid="", $memberid="", $productid="", $active="", $sort="") {
$dsp = ( is_numeric($active) && $active==1)? "Following" : "Ignoring";
return <<<zz
<a href="javascript: toggleInterest($idx);">[x]</a>
<b>$dsp</b>
<input type="hidden" name="memprodid_$idx" id="memprodid_$idx" value="$memprodid" />
<input type="hidden" name="memberid_$idx" id="memberid_$idx" value="$memberid" />
<input type="hidden" name="productid_$idx" id="productid_$idx" value="$productid" />
<input type="hidden" name="active_$idx" id="active_$idx" value="$active" />
<input type="hidden" name="sort_$idx" id="sort_$idx" value="$sort" /> 
zz;
} //makeMemProd


function buildTag( $idx , $tagclass = "tagalive", $url="", $display="") {
$Lid = $idx;
$Lurl = $url;
if( strlen($display) ) {
$rtn = buildTagContent( $idx , $tagclass, $url, $display);
$rtn = <<<zz
<div id="$Lid" class="tag">$rtn</div> <!-- /$Lid -->
zz;
} else {
$rtn = "";
}
return $rtn;
}

function buildTagContent( $idx , $tagclass = "tagalive", $url="", $display="") {
$Lid = $idx;
$Lurl = $url;
$rtn = <<<zz
<div class=" $tagclass"><a href="javascript:callAjax( '$Lid', '$Lurl' );">[x] $display</a></div>
zz;
return $rtn;
}

function displayContentByType( &$content, $typecode ) {
$rtn = ""; 
switch( $typecode ) {

case "PDMOVIE":
$rtn = <<<zz
<iframe src="$content" frameborder="0" class="adminMOVIE" allowfullscreen></iframe>
zz;
	 break;
	 
case "PDIMAGE":
$rtn =<<<zz
<img src="$content" border="0" class="adminIMG" />
zz;
	 break;
	 
case "PDDLDOC":
$rtn =<<<zz
<a href="$content" target="_new"><img src="site/img/docicon.png" border="0" class="adminIMG" /></a>
<a href="$content" target="_new">$content</a>
zz;
	 break;
default:
$rtn = $content;

}

return $rtn;

} // displayContentByType



function makeProductDetailOpen( $idx = "",$band = "",$bandid = "",$type = "",$typeid = "", $typecode="",$title = "",$content ="",$BandOptions=array(), $TypeOptions=array(), $TPoptions = "", $active=1, $sort=100,$productid, $curtask="" ) {

$ActiveOptions = array( array("value" => "1", "display" => "Yes"), array("value" => "0", "display" => "No") );



$jsFunc = "updateDetail( '$idx' );";
$sjsFunc = "";
$tjsFunc = "";

if( is_numeric( $idx) ) { $tmpFrm = "_$idx"; } else { $tmpFrm = "";}
$theFormID = "deetForm$tmpFrm";


if( is_numeric($idx) ) {
$sjsFunc = <<<zz
onchange="$jsFunc"
zz;
$tjsFunc=<<<zzz
onblur="$jsFunc"
zzz;
  
$tmpBtn = makeButton( $type="BUTTON", $display="Add", $id="", $func="newTag('$idx');", $class="fl1" );

$toggleLink = makeButton( $type="BUTTON", $display="Toggle Edit", $id="", $func="toggleEditable('$idx');//", $class="" );
$saveLink = makeButton( $type="BUTTON", $display="Update Detail", $id="", $func="document.$theFormID.submit();", $class="" );

$toggleLink = <<<zz
<div class="ht1">$toggleLink $saveLink</div>
<div  class="ht1">
  <span class="fl1">Target Profile(s):</span>
  <select class="fl1" id="addprofile_$idx"><option value="">[pick]</option>$TPoptions</select>
  <input type="hidden" value="$idx" name="productdetailid_$idx" id="productdetailid_$idx"></input>
  $tmpBtn
  <div class="clear"></div>
</div>  
zz;
$editDisplay = "none";
$displayDisplay = "block";
} else {
$toggleLink = <<<zz
<input type="hidden" value="$idx"" name="idx" id="idx"></input>

zz;
$toggleLink .=  makeButton( $type="SUBMIT", $display="Save Detail", $id="", $func="document.$theFormID.submit();", $class="" );


$editDisplay = "block";
$displayDisplay = "none";
} //is_numeric($idx) 


$mBand = makeInput( "select", "detailband_$idx", "slbx1", "$bandid", $BandOptions, $sjsFunc );

if( !is_numeric($idx) ) {// build new detail start
$typeFunc =<<<zz
onchange="showDeetTypeForm('$idx');"
zz;
} else {// build new detail else
$typeFunc =  $sjsFunc;
} // build new detail end

$mType = makeInput( "select", "detailtype_$idx", "slbx1", "$typeid", $TypeOptions, $typeFunc );

$mActive = makeInput( "select", "active_$idx", "slbx1", "$active", $ActiveOptions, $sjsFunc );
$displaycontent = displayContentByType( $content, $typecode );
$mSort  = makeInput( "text", "sort_$idx", "txt2", "$sort", "", $tjsFunc);  
$mTitle = makeInput( "text", "detailtitle_$idx", "txt3", "$title", "", $tjsFunc);  

$mURL = makeInput( "text", "refURL_$idx", "txt3", "$content", "", "");  

$dspTxt = "none";
$dspFl = "none";
/**/
switch($typecode ) { //show editor?
case "PDDLDOC":
case "PDIMAGE":
case "PDMOVIE":
	$dspFl = "block";
	break;
default:
	$dspTxt = "block";
	break;
}//show editor?


$editBox = makeFile( $name="detailfile_$idx", $class="", $value="", $display="Select File" );
$editBox =<<<zz
<div id="EDITBOX">

<div id="txted_$idx" class="" style="display:$dspTxt;">
	<div class="ht1">
		 <div class="ds bg1 pad2">
		 	 <h4 class="h1a">Content</h4>
		 </div>
	</div>
	<textarea class="adminTEXTA" id="content_$idx" name="content_$idx" $tjsFunc>$content</textarea>
	<textarea class="adminTEXTA" id="org_content_$idx" style="display:none;">$content</textarea>
</div> <!-- txted_$idx -->

<div id="fileed_$idx" class="" style="display:$dspFl;">
	<div class="ht1">
		 <div class="ds bg1 pad2">
		 	 <h4 class="h1a">File Reference</h4>
		 </div>
	</div>
	
	<div class="ht2">
		 <div class="fl1"><label for="refURL_$idx" class="pad1">URL:</label> </div>
		 $mURL 
		 <div class="clear"></div>
	</div>
	<div class="ht1"><span class="pad1">or upload one from your computer</span></div>
	
	<div class="ht1">
		 <div class="fl1"><label for="detailfile_$idx" class="pad1">Upload file:</label> </div>
		 $editBox 
		 <div class="clear"></div>
	</div>
</div><!-- fileed_$idx -->
</div> <!-- EDITBOX -->
zz;

$magicFix =<<<xx
<form 
	  action="?TASK=$curtask&COMMIT=1&IDX=$idx" 
	  enctype="multipart/form-data" 
	  method="post" 
	  id="$theFormID" 
	  name="$theFormID">

xx;


$rtn =<<<zzz

$magicFix


<div class="detailmain" id="productdetail_$idx">
<div class="ht2">
	<div class="fl1 wid2"><label for="detailtitle_$idx">Title:</label></div>
	<div class="fl1 pad1">$mTitle</div>
	<input type="hidden" value="$idx" name="productdetailid_$idx" id="productdetailid_$idx"></input>
	<input type="hidden" value="$productid" name="productid_$idx" id="productid_$idx"></input>
	
	<div class="clear"></div>
</div>

<div class="ht2">
	 <div class="fl1 wid2"><label for="detailband_$idx">Band:</label></div>
	 <div class="fl1 pad1">$mBand</div>
	 <div class="fl1 wid2"><label for="detailtype_$idx">Type:</label></div>
	 <div class="fl1 pad1">$mType</div>
	 <div class="clear"></div>
</div>

<div class="ht2">
	 <div class="fl1 wid2"><label for="active_$idx">Active:</label></div>
	 <div class="fl1 pad1">$mActive</div>
	 <div class="fl1 wid2"><label for="sort_$idx">Sort:</label></div>
	 <div class="fl1 pad1">$mSort</div>
	
	 <div class="clear"></div>
</div>

<div class="dcontent padb1">
	 <div id="display_$idx" style="display:$displayDisplay;">$displaycontent</div>
	 <div id="edit_$idx" style="display:$editDisplay;">
$editBox
	</div>
</div>
$toggleLink
  <div id="tarpro_$idx" >
zzz;
return $rtn;
} //

function makeProductDetailClose( $idx = "", $content ="" ) {

return <<<zzz
$content
  </div> <!-- tarpro_$idx -->

	 <div class="clear"></div>
</div> <!-- productdetail_$idx -->
<hr class="hr1" />

</form>

zzz;
} //makeProductDetailClose


function buildbanditem( $cur ) {
		 $Lbname = $cur["name"];
		 $Lbtype = $cur["type"];
		 $Lbvalue = $cur["value"];
		 $rtn = "";
	 
switch( $Lbtype ) {
case "PDCONTENT":
$rtn .= <<<zzz
	 <div class="vertscroll insetbox1">$Lbvalue</div>
zzz;
break;

case "PDIMAGE":
$rtn .= <<<zzz
<div><img src="$Lbvalue" title="$Lbname" /></div>
zzz;
break;

case "PDDLDOC":
$rtn .= <<<zzz
<div>
<a href="$Lbvalue" target="_new"><img src="site/img/docicon2.png" border="0" class="adminIMG" /></a>
</div>

zzz;
break;

case "PDMOVIE":
$rtn .= <<<zzz
<iframe src="$Lbvalue" frameborder="0" class="insetbox1" allowfullscreen></iframe>
zzz;
break;
}

$rtn=<<<xx
<div class="outsetbox1 boxshadow fl1 padR1">
	 <div><b>$Lbname</b></div>
	 <hr class="bgAlt" />
	 $rtn
</div>
xx;


return $rtn;
}






$MSG = getKey("msg", $GLOBALS["LOCALGET"]);
switch( $MSG ) {
		case "LOGINFAIL":
		$MSG = "Unknown Username/Password Combination.";
		break;
		case "UPDATE":
		$MSG = "Your updates were successful.";
		break;
		default:
		$MSG = "";
		break;
} 


?>