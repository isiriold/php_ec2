<?php

$mHOME = ( $CURTASK == "HOME" ) ? "actLNK" : "";
$mPROD = ( $CURTASK == "PRODUCTS" || $CURTASK == "PRODUCT") ? "actLNK" : "";
$mART = ( $CURTASK == "ARTICLES") ? "actLNK" : "";
$mPROF = ( $CURTASK == "PROFILE") ? "actLNK" : "";
$mAPROD = ( $CURTASK == "ADMINPRODLIST" || $CURTASK == "ADMINPRODUCT") ? "actLNK" : "";

echo <<<zzz
<div id="leftnavfloat" class="fixedposition">

<div class="ds bg1 pad2">
<h4 class="h1a">Navigation</h4>
</div>

<ul class="ds lnUL">

<li class="lnLI"><i><a href="?TASK=HOME" class="lnLNK $mHOME">Home</a></i></li>

<li class="lnLI"><a href="?TASK=PRODUCTS" class="lnLNK $mPROD">Products</a></li>

<li class="lnLI"><a href="?TASK=PROFILE" class="lnLNK $mPROF">My Profile</a></li>

<li class="lnLI"><a href="?TASK=FORUMS" class="lnLNK $mPROF">Forums</a></li>

</ul>
zzz;

if( isset( $_SESSION['member']['isadmin']) && $_SESSION['member']['isadmin']==1 ) { 
echo <<<zzz
<div class="ds bg1 pad2">
<h4 class="h1a">Administration</h4>
</div>
<ul class="ds lnUL">
<li class="lnLI"><a href="?TASK=ADMINPRODLIST" class="lnLNK $mAPROD">Admin Products</a></li>
</ul>
zzz;
} 

?>
</div> <!-- leftnavfloat -->

