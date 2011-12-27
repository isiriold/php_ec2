<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<style>
BODY { background-color: #E0E0D7; padding: 20px 20px 20px 20px;}
h1 { margin-top: 0px; margin-bottom: 0px; }
.body1 { width: 100%; height: 100%;}
.banner1 { width: 100%;}
.nav1 { float: left;  }
.content1 { float: left; background-color: transparent; padding-left:20px;  }
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

.band1 { border: 1px solid black; }

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
echo containerTypeOpen("page","The Site Title","body1", 1 , 1);   
  ?>
  <br/>
  
  <div id="nav1" class="nav1">
  
  <!-- DO NOT EDIT START -->
  <?php 
  echo containerTypeOpen('nav',"the title","cw250", 1 , 1); 
  echo "<BR/>";
  include "site/display/nav1.php"; 
  echo containerTypeClose('nav');
  ?>
  <!-- DO NOT EDIT END -->  
  </div>
  
  <div id="content1" class="content1">
  <!-- DO NOT EDIT START -->
  <?php
$FrmNm = $ENG["formname"];
echo "<form name=\"$FrmNm\" id=\"$FrmNm\" method=\"POST\" action=\"?TASK=$CURTASK&COMMIT=1\">";

echo containerTypeOpen("bdy","the title","cntwdw", 1 , 1); 
foreach( $ENG["display"] as $pg ) {  if( strlen( rtrim($pg) ) ) { include $pg ; }  }
echo containerTypeClose("bdy");

?>
</form>
<!-- DO NOT EDIT END -->  
  </div>
  
  <div class="clear"></div>
  
  <?php
  echo containerTypeClose("page");
  ?>
  </body>
</html>
