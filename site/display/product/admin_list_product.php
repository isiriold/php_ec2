<?php
if ($USERLOGGED != 1)
{
echo <<<xx
<h2 class="">ATTENTION: You need to be an admin to access this.</h2>
xx;
}
else
{

function productList_item( $Litem_title = "", $Litem_link= "",$Litem_src = "", $Litem_text= "")
{
return <<<zzz
<div>
	 <div class="logocell">
	 	  <span class="frame_box preload"><a class="preloader" href="$Litem_link"><img style="display: block; visibility: visible; opacity: 1;" src="$Litem_src" width="100px" title="$Litem_text" alt=""></a></span>
	 </div>
	 <div class="desccell"><h2>$Litem_title</h2> <p>$Litem_text</p> <p><a class="btnlnk ds clr2 " href="$Litem_link" >Edit</a></p></div> 
	 <div class="clear"></div>
	 <hr class="hr1">
</div>
zzz;
}


$qProd = $qProd[0];
$Lid = 0;

echo "<br></br>";

echo <<<zz
<div class="ht1">
zz;
echo makeButton( $type="BUTTON", $display="Add a Product", $id="", $func="document.newOne.submit();", $class="" );
echo <<<zz
</div>
zz;

echo "<br></br>";

#echo '<hr class="hr1">';


foreach( $qProd as $cur ) {
$Lsrc = $cur->product_logo;
$Ldsc = $cur->product_desc;
$Lnm = $cur->product_name;
if( $Lid != $cur->product_id) {
	$Lid = $cur->product_id;
	echo "<br></br>";
	echo productList_item( $Lnm , "?TASK=ADMINPRODUCT&PRODUCTID=$Lid" , $Lsrc, $Ldsc);
}


}


?>

<form name="newOne" action="?TASK=ADMINPRODUCT&PRODUCTID=NEW" method="post"></form>
<?php } ?>