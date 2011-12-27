<?php
$Lmemberid = getKey( 'userid', $_SESSION['member']);

function productList_item( $Litem_title = "", $Litem_link= "",$Litem_src = "", $Litem_text= "",
$idx="", $productid="", $memprodid="" , $memberid="", $active="1", $sort="1000" )
{
$tag = makeMemProdTag($idx, $memprodid , $memberid, $productid, $active, $sort);
return <<<zzz
<div>
	 <div class="logocell">
	 	  <span class="frame_box preload"><a class="preloader" href="$Litem_link"><img style="display: block; visibility: visible; opacity: 1;" src="$Litem_src" width="100px" title="$Litem_text" alt=""></a></span>
	 </div>
	 <div class="desccell"><h2>$Litem_title</h2> <p>$Litem_text</p> </div>
	 <div class="fl1">$tag</div>
	 <div class="clear"></div>
	 <hr class="hr1">
</div>
zzz;
}

if ($USERLOGGED != 1)
{
echo <<<xx
<h2 class="">ATTENTION: Please Log in to access Products </h2>
xx;
}
else
{

$qMemProd = $qMemProd[0];
$Lid = 0;
$counter = 0;
foreach( $qMemProd as $cur ) { //foreach1
$Lsrc = $cur->product_logo;
$Ldsc = $cur->product_desc;
$Lnm = $cur->product_name;
$Lmpid = $cur->member_product_id;
$Lmid = $cur->member_id;
$Lmac = $cur->member_product_active_flag;
$Lms = $cur->member_product_sort;
if( $Lid != $cur->product_id) { //if1
	$Lid = $cur->product_id;
	echo productList_item( $Lnm , "?TASK=ADMINPRODUCT&PRODUCTID=$Lid" , $Lsrc, $Ldsc, $counter,	$Lid, $Lmpid, $Lmemberid, $Lmac,$Lms );
	$counter++;
}//if1


}//foreach1

}// login check ends here

?>
