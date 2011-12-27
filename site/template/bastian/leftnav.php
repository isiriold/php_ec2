<?php

$mHOME = ( $CURTASK == "HOME" ) ? "actLNK" : "";
$mPROD = ( $CURTASK == "PRODUCTS" || $CURTASK == "PRODUCT") ? "actLNK" : "";
$mART = ( $CURTASK == "ARTICLES") ? "actLNK" : "";
$mPROF = ( $CURTASK == "PROFILE") ? "actLNK" : "";
$mAPROD = ( $CURTASK == "ADMINPRODLIST" || $CURTASK == "ADMINPRODUCT") ? "actLNK" : "";

$homebtn = makeButton( $type="button", $display="Home", $id="", $func="window.location='?TASK=HOME'", $class="btnwidth" );
$Prodbtn = makeButton( $type="button", $display="Products", $id="", $func="window.location='?TASK=PRODUCTS'", $class="btnwidth" );
$Profbtn = makeButton( $type="button", $display="Manage Account", $id="", $func="window.location='?TASK=PROFILE'", $class="btnwidth" );
#$Forumbtn = makeButton( $type="button", $display="Forums", $id="", $func="window.location='?TASK=FORUMS'", $class="btnwidth" );
#$Articlesbtn = makeButton( $type="button", $display="Articles", $id="", $func="window.location='?TASK=ARTICLES'", $class="btnwidth" );
$Trainingbtn = makeButton( $type="button", $display="Training & Knowledge", $id="", $func="window.location='?TASK=TRAINING'", $class="btnwidth" );
$Orderbtn = makeButton($type="button", $display="Orders", $id="", $func="window.location='?TASK=ORDERS'", $class="btnwidth" );
$AdminProdbtn = makeButton( $type="button", $display="Manage Products", $id="", $func="window.location='?TASK=ADMINPRODLIST'", $class="btnlnkAdmn btnwidth" );
$ViewProcActvbtn = makeButton( $type="button", $display="Provider Activity", $id="", $func="window.location='?TASK=REPORTS'", $class="btnlnkAdmn btnwidth" );
$askbtn = makeButton($type="button", $display="Ask a question", $id="", $func="window.location='?TASK=ASK'", $class="btnwidth" );
$ManageProf = makeButton( $type="button", $display="Manage Profiles", $id="", $func="window.location='?TASK=ADMINPROFSEARCH'", $class="btnlnkAdmn btnwidth" );
$presentbtn = makeButton( $type="button", $display="Presentation", $id="", $func="window.location='?TASK=PRESENT'", $class="btnwidth" );
$pptbtn = makeButton( $type="button", $display="Upload ppt", $id="", $func="window.location='?TASK=PPT'", $class="btnwidth" );
$presentationsbtn = makeButton( $type="button", $display="Presentations", $id="", $func="window.location='?TASK=PRESENTATIONS'", $class="btnwidth" );

echo <<<zzz
<div id="leftnavfloat" class="">

<ul class="ds lnUL">

<li class="lnLI">$homebtn<span>&raquo;</span></li>

<li class="lnLI">$Prodbtn<span>&raquo;</span></li>

<li class="lnLI">$Trainingbtn<span>&raquo;</span></li>

<li class="lnLI">$Orderbtn<span>&raquo;</span></li>

<li class="lnLI">$Profbtn<span>&raquo;</span></li>
<li class="lnLI">$presentationsbtn<span>&raquo;</span></li>
<li class="lnLI">$askbtn<span>&raquo;</span></li>

<br>


</ul>
zzz;

if( isset( $_SESSION['member']['isadmin']) && $_SESSION['member']['isadmin']==1 ) { 
echo <<<zzz
<div class="ds bgBaseNew pad2">
<h4 class="h1a">Administration</h4>
</div>
<ul class="ds lnUL">
<li class="lnLI">$AdminProdbtn<span>&raquo;</span></li>
<li class="lnLI">$ManageProf<span>&raquo;</span></li>
<li class="lnLI">$ViewProcActvbtn<span>&raquo;</span></li>
<li class="lnLI">$presentbtn<span>&raquo;</span></li>
<li class="lnLI">$pptbtn<span>&raquo;</span></li>
</ul>
zzz;
} 

?>
</div> <!-- leftnavfloat -->

