
<?php

function productList_item( $Litem_title = "", $Litem_link= "",$Litem_src = "", $Litem_text= "")
{
return <<<zzz
<div>
	 <div class="logocell">
	 	  <span class="frame_box preload"><a class="preloader" href="$Litem_link"><img style="display: block; visibility: visible; opacity: 1;" src="$Litem_src" width="100px" title="$Litem_text" alt=""></a></span>
	 </div>
	 <div class="desccell"><h2>$Litem_title</h2> <p>$Litem_text</p> <p><a href="$Litem_link" >Learn more</a></p></div> 
	 <div class="clear"></div>
	 <hr class="hr1">
</div>
zzz;
}


$qMemProd = $qMemProd[0];
$Lid = 0;
$counter = 0;
foreach( $qMemProd as $cur ) { // loop query
	$counter++;
	$Lsrc = $cur->product_logo;
	$Ldsc = $cur->product_desc;
	$Lnm = $cur->product_name;
	if( $Lid != $cur->product_id) { //if new item id
		$Lid = $cur->product_id;
		echo productList_item( $Lnm , "?TASK=PRODUCT&PRODUCTID=$Lid" , $Lsrc, $Ldsc);
	} //if new item id
} // loop query

if( !$counter ) { //  warn about not having products
echo <<<xx
<h4 class="">ATTENTION: You have not selected any products to follow</h4>
<p>Please click <a href="?TASK=PROFILE">My Profile</a> and the "Products" tab to select products you are interested in.</p>
xx;
} //  warn about not having products


?>

