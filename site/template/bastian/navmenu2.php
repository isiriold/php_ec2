<div id="hormenudiv" class="mnBNR ds bg1">
 
 <ul id="hormenu" class="mnUL">
	 <li class="fl1"><a href="?TASK=HOME"><img src="site/img/eremedy_logo.jpg" alt="Home" width="180" border="1" height="60" class="brdr1"></a></li>
	 <li class="mnLI"><a href="?TASK=ABOUT" class="mnLNK">About Us</a></li>
 	 <li class="mnLI"><a href="?TASK=CONTACT" class="mnLNK">Contact Us</a></li>
	 
 	 <li class="mnLI"><a href="?TASK=PRODUCTS" class="mnLNK">Products</a>
	 	 <ul class="mnUL1 bgAlt ds"> <!-- sub products -->
  <?php
if( isQuery( $qProdNav ) ) { //if qProdNav
  $lCTR = 0;
  $Lid = 0;
  foreach( $qProdNav[0] as $nav ) { // foreach qProdNav
    $tmpPID = $nav->product_id;
	$tmpPNM = $nav->product_name;
    if( $Lid != $tmpPID ) { //if $Lid 
      $Lid = $tmpPID; 
	  $tmpSPC = "";
	  if( !$lCTR ) { $tmpSPC = "first";}
	  if( $lCTR == count($qProdNav[0])-1 ) { $tmpSPC = "last";}
echo <<<zz
	 	  <li class="$tmpSPC"><a class="mnLNK" href="?TASK=PRODUCT&PRODUCTID=$tmpPID">$tmpPNM</a></li>

zz;
    } //if $Lid  
     $lCTR++;
  } // foreach qProdNav
} // if qProdNav

?>	 
	  </ul><!-- sub products -->
	 
	 </li>
 	 <li class="mnLI"><a href="?TASK=PROFILE" class="mnLNK">My Profile</a></li>
	 
<?php if( $USERLOGGED) { ?>					
<li class="mnLI"><a href="?TASK=LOGOUT&COMMIT=1" class="mnLNK">Logout</a></li>
<?php } else { ?>	
<li class="mnLI"><a href="?TASK=LOGIN" class="mnLNK">Login</a></li>
<?php } ?>
 </ul>

  <div class="clear"></div>
 </div> <!-- hormenudiv -->
