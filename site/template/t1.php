<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<style>
BODY { background-color: #FFFFFF; padding: 15px 15px 15px 15px;}
h1 { margin-top: 0px; margin-bottom: 0px; }
ul{ margin-top: 0px; margin-bottom: 0px; }

.body1 { width: 100%; height: 100%;}
.banner1 { width: 100%;}
.nav1 { float: left;  }
.content1 { float: left; background-color: transparent; padding-left:15px;  }
.clear { clear: both; }

.adm_titlebar{ width: 100%; background-color: #FFFFFF; }
.box1 {width: 150px; border: 0px dashed black; float: left;  }
.box1r {border: 0px dashed black; float: right; }
.box2 {width: 250px; border: 0px dashed black; float: left;  }

.edit_label { width: 200px; float: left; }
.edit_input { width: 600px; float: left; }
.label1 { font-weight: bold; font-size: 12pt; }

.ctntTA { width: 100%; height: 200px; }
.ctntSB { width: 100%; }
.ctntTX { width: 100%; }

.float1 { width: 150px; float: left; }

.fl1 { float: left;  width: 200px;}

.detailscroller{ height: 150px; width: 100%; overflow-y:no-display; overflow-x:auto; border: 1px #9993C2 solid;}
.detailthumb { padding: 2px 5px 2px 5px; height: 140px; width: 200px; overflow:hidden; float:left;border: 2px #FFFFFF dashed; }
.contentbox { width: 100%; height: 250px; overflow:auto; background-color: #FFFFFF; }
.contenttitle { width: 100%; background-color: #9993C2; }
.titlebar{ width: 100%; background-color: #FFFFFF; }
.articlebox{ width: 100%; background-color: #9993C2; border: 5px #9993C2 solid; }
.synop1{ width: 100%; background-color: #FFFFFF; }

.ProdTitle { margin: 0px 0px 0px 0px; font-size: 20pt; font-weight: bold;  }


/* $class classe */
.cntwdw { width: 650px; height: 550px; }
.cw250 { width: 250px; height: 350px; }

.bigCntr { height: 600px; }

/**/
.h3_1 { margin: 0px 0px 0px 0px; font-size: 20pt; color: #FF22FF }
.mainbody { height: 900px; width: 950px}
.navbody {height: 700px; width: 200px; float: left; padding: 5px 5px 5px 5px;}
.contentbody {height: 700px; width: 700px; float: right; padding: 5px 15px 5px 5px;}

.divWidth_1 { width: 100%; }
.divHeight_1 { height: 5px; }
.divTitleHeight_1 { height: 30px; }
.bdrCurveTop_1 { -moz-border-radius-topright: 15px;
		 	  border-top-right-radius: 15px;
			  -moz-border-radius-topleft: 15px;
			  border-top-left-radius: 15px; }
.bdrCurveBottom_1 { -moz-border-radius-bottomright: 15px;
			  border-bottom-right-radius: 15px;
			  -moz-border-radius-bottomleft: 15px;
			  border-bottom-left-radius: 15px; }
.bdrWidth_1 { border-width: 5px; }
.bdrColor_1 { border-color:  #000080; }
.bdrStyle_1 { border-style: double; }

.bdrSansT_1 { border-bottom-width: 0px; }
.bdrSansB_1 { border-top-width: 0px; }

.bg_1 {background-color: #000080; }
.title_1 { margin: 0px 0px 0px 0px; font-size: 15pt; font-weight: bold; color: #FFFFFF; }
.title_1A { margin: 0px 0px 0px 0px; font-size: 25pt; font-weight: bold; color: #000080; }


.logocell { float: left; width: 310px; }
.desccell { float: left; width: 310px; }
.hr1 { margin-bottom: 0px; margin-top: 0px; height: 5px; }

.banddivider1 { border-left: 1px dotted black; border-right: 1px dotted black; }
.band1 { 
border-top: 15px solid black; 
-moz-border-top-colors:    #555 #666 #777 #888 #999 #aaa #bbb #ccc;
border-bottom: 15px solid black;
-moz-border-bottom-colors: #555 #666 #777 #888 #999 #aaa #bbb #ccc;
}
</style>

<link href="site/css/container.css" rel="stylesheet" type="text/css"></link>

<script>
function toggleDisplay(el){
el = document.getElementById(el);
el.style.display= (el.style.display=="none")? "":"none";
}

</script>

  </head>
  <body>
  
<?php
echo DivOpenType1( "bdy1", "mainbody","bigCntr", "1", "Sermo by Allacciare Inc.", "title_1A", 0); // Open Main Window

echo DivOpenType1( "nav1", "navbody", "", "1", "Navigation", "title_1", 1); // Open Nav Window
include "site/display/nav1.php"; 
echo DivCloseType1( "nav1", "1"); // Close Nav Window

$LPTitle = getKey("pagetitle", $ENG);
echo DivOpenType1( "content1", "contentbody", "", "1", $LPTitle, "title_1A", 0); // Open Nav Window
foreach( $ENG["display"] as $pg ) {  if( strlen( rtrim($pg) ) ) { include $pg ; }  }
echo DivCloseType1( "content1", "1"); // Close Nav Window

echo '<div class="clear"></div>';

echo DivCloseType1( "bdy1", "1"); // Close Main Window

?>


 
 

 	
 
 
 

  
  </body>
</html>
