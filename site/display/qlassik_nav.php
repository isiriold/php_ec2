<div class="grid_4 sidebar"> <!-- qnav1 -->
<div class="tf_menu_left"> <!-- qnav2 -->
<?php

$mPROD = ( $CURTASK == "PRODUCTS" || $CURTASK == "PRODUCT") ? "current-menu-item" : "";
$mART = ( $CURTASK == "ARTICLES") ? "current-menu-item" : "";
$mPROF = ( $CURTASK == "PROFILE") ? "current-menu-item" : "";
$mAPROD = ( $CURTASK == "ADMINPRODLIST" || $CURTASK == "ADMINPRODUCT") ? "current-menu-item" : "";


if( isset( $_SESSION['member'] ) ) {
echo <<<zzz
<div class="inner">
    <h3>Navigation</h3>
    <ul>
        <li class="$mPROD"><a href="?TASK=PRODUCTS">Products</a></li>
        <li class="$mART"><a href="?TASK=ARTICLES">Articles</a></li>
        <li class="$mPROF"><a href="?TASK=PROFILE">My Profile</a></li>
    </ul>
zzz;
}

if( isset( $_SESSION['member']['isadmin']) && $_SESSION['member']['isadmin']==1 ) {
echo <<<zzz
    <h3>Administration</h3>
    <ul>
		<li class="$mAPROD"><a href="?TASK=ADMINPRODLIST">Admin Products</a></li>
	</ul>
</div> 
zzz;
}
?>



&nbsp;
</div> <!-- //qnav2 -->
</div> <!-- //qnav1 -->