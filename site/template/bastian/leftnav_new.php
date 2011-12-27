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
<FORM METHOD="LINK" ACTION="?TASK=HOME">
<INPUT TYPE="submit" VALUE="HOME">
</FORM>
<FORM METHOD="LINK" ACTION="?TASK=PRODUCTS">
<INPUT TYPE="submit" VALUE="PRODUCTS">
</FORM>
<FORM METHOD="LINK" ACTION="?TASK=PROFILE">
<INPUT TYPE="submit" VALUE="PROFILE">
</FORM>
<FORM METHOD="LINK" ACTION="?TASK=FORUMS">
<INPUT TYPE="submit" VALUE="FORUMS">
</FORM>

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

