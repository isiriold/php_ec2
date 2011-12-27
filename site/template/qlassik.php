<?php
$LPTitle = getKey("pagetitle", $ENG);
$LSTitle = getKey("sitetitle", $ENG);

//echo $USERLOGGED;
$Lmemberid = getKey( 'userid', $_SESSION['member']);
$qProdNav = $conn->memberproductGET( $member_id = $Lmemberid , $active = 1);
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $LSTitle;?></title>
<meta name="author" content="">
<meta name="description" content="">
<meta name="keywords" content="">

<link href="site/css/main.css" media="screen" rel="stylesheet" type="text/css">
<link href="site/template/qlassik/style.css" media="screen" rel="stylesheet" type="text/css">

<script type="text/javascript" language="javascript" src="site/js/simple_ajax.js"></script>
<script type="text/javascript" language="javascript" src="site/template/qlassik/jquery_003.js"></script>
<script type="text/javascript" language="javascript" src="site/template/qlassik/general.js"></script>
<script type="text/javascript" language="javascript" src="site/template/qlassik/jquery.js"></script>
<script type="text/javascript" language="javascript" src="site/template/qlassik/jquery_004.js"></script>
<script type="text/javascript" language="javascript" src="site/template/qlassik/jquery_002.js"></script>
<script type="text/javascript" src="site/template/qlassik/preloadCssImages.js"></script>
<script type="text/javascript" language="javascript" src="site/js/easySlider1.7.js"></script>
<script type="text/javascript">
$(function(){ $(".preload").preloadify({ imagedelay:500 }); });
</script>

<script>
function getDocHeight() {
    var D = document;
    return Math.max(
        Math.max(D.body.scrollHeight, D.documentElement.scrollHeight),
        Math.max(D.body.offsetHeight, D.documentElement.offsetHeight),
        Math.max(D.body.clientHeight, D.documentElement.clientHeight)
    );
}

function getStyle(el, style) {
   if(!document.getElementById) return;
   
     var value = el.style[toCamelCase(style)];
   
    if(!value)
        if(document.defaultView)
            value = document.defaultView.
                 getComputedStyle(el, "").getPropertyValue(style);
       
        else if(el.currentStyle)
            value = el.currentStyle[toCamelCase(style)];
     
     return value;
}

function setStyle(objId, style, value) {
    document.getElementById(objId).style[style] = value;
}

function toCamelCase( sInput ) {
    var oStringList = sInput.split('-');
    if(oStringList.length == 1)    
        return oStringList[0];
    var ret = sInput.indexOf("-") == 0 ? 
    	oStringList[0].charAt(0).toUpperCase() + oStringList[0].substring(1) : oStringList[0];
    for(var i = 1, len = oStringList.length; i < len; i++){
        var s = oStringList[i];
        ret += s.charAt(0).toUpperCase() + s.substring(1)
    }
    return ret;
}

function increaseWidth(addToWidth, whichDiv){
    var theDiv = document.getElementById(whichDiv);
    var currWidth = parseInt(getStyle(theDiv, "width"));
    var newWidth = currWidth + parseInt(addToWidth);
    setStyle(whichDiv, "width", newWidth + "px");
}

String.prototype.trim = function() {
	return this.replace(/^\s+|\s+$/g,"");
}
String.prototype.ltrim = function() {
	return this.replace(/^\s+/,"");
}
String.prototype.rtrim = function() {
	return this.replace(/\s+$/,"");
}
function toggleDiv(div) {
var compare = "";
div = document.getElementById(div);
compare= div.style.display.toLowerCase().trim();

div.style.display = ( compare== "none")? "block":"none";

} //toggleDiv




</script>

<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" href="css/ie.css" />
<![endif]-->
</head><body>

<div id="workerdiv" class="popupouter " style="display:none;">
<input type="button" value="CLICK ME" onclick="centerDiv('workerdivinner')"></input>
<div id="workerdivinner" class="popupinner ">
	 <div id="workerdivtitlebar">
	 	  <div class="fl1" id="workerdivtitle"></div><!-- workerdivtitle -->
	 	  <div class="fr1">
<a href="javascript:toggleDiv('workerdiv');">[x]</a>
		  </div>
	 	  <div class="clear"></div>
	 </div><!-- workerdivtitlebar -->
	 <div id="workerdivcontent">
	 <form name="deetForm"></form>
	 </div><!-- workerdivcontent -->	 
</div><!-- workerdivinner -->
</div><!-- workerdiv -->

<div class="bodywrap">

<!-- navbar -->
<?php include_once "qlassik/navbar.php"; ?>
<!-- //navbar -->
	
<!-- slider -->
<?php include_once "qlassik/slider.php"; ?>
<!-- //slider -->
	
  
<!-- middle --> 
    <div class="middle">
    	<div class="container_12">      
		       
<!-- sidebar -->
<?php include "site/display/qlassik_nav.php"; ?>
<!--/ sidebar -->


<div class="grid_8 content"><!-- content -->
<!-- PHP CODE FOR "CONTENT" START -->          
<?php foreach( $ENG["display"] as $pg ) {  if( strlen( rtrim($pg) ) ) { include $pg ; }  } ?>
<!-- PHP CODE FOR "CONTENT" END -->
 </div><!--/ content -->
        
        
        <div class="clear"></div>
        </div>        
    </div>
<!--/ middle --> 
    
<!-- footer -->     
    <div class="footer">
    <div class="inner">
    	<div class="container_12">
<p class="copyright">Copyright © 2011 Allacciare<br>All the respective rights reserved</p>
        </div>
	</div>        
    </div>
    
</div>
</body></html>