<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title><?php echo $LPTitle ?></title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
<link href="site/css/bastian.css?1" rel="stylesheet" type="text/css"></link>

<script src="site/js/common.js"></script>
<script src="site/js/simple_ajax.js"></script>


  </head>
  <body >


  
<?php
require_once "site/template/bastian/workdiv.php";
// include the navigation 
require_once "site/template/bastian/navmenu.php";
?> 


<div id="mainbody" class="mainbody">
	 <div id="leftnav" class="lnav fl1">
<?php include "site/template/bastian/leftnav.php"; ?>
&nbsp;
	 </div> <!-- leftnav -->
	 
	 <div id="sep1" class="separator fl1">&nbsp;</div> <!-- sep1 -->
	 
	 <div id="maincontent" class="cntnt fl1">


<?php foreach( $ENG["display"] as $pg ) {  if( strlen( rtrim($pg) ) ) { include $pg ; }  } ?>

<?php
if ($_FILES["file"]["error"] > 0)
  {
  echo "<p class='con'>Error: " . $_FILES["file"]["error"] . "</p>";
  }
  
else
  {
  echo "<p class='con'>Uploaded: " . $_FILES["file"]["name"] . "</p>";
  echo "<p class='con'>Type: " . $_FILES["file"]["type"] . "</p>";
  echo "<p class='con'>Size: " . ($_FILES["file"]["size"] / 1024) . " Kb</p>";
  }
move_uploaded_file($_FILES["file"]["tmp_name"],
      "site/upload/ppt/" . $_FILES["file"]["name"]);
      echo "<p class='con'>Stored in: " . "site/upload/ppt/" . $_FILES["file"]["name"] ."</p>";
?> 


	 </div> <!-- maincontent -->
	 <div class="clear"></div>
</div><!--/ mainbody -->
  
  </body>
</html>
