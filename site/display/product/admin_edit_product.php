<?php

if ($USERLOGGED != 1)
{
echo <<<xx
<h2 class="">ATTENTION: You need to be an admin to access this.</h2>
xx;
}
else
{
?>
<!-- dts changes start -->

<form id="theForm" name="theForm" action="?TASK=<?php echo $CURTASK; ?>" method="post" class="ajax_form brdr4 pad3" enctype="multipart/form-data" onsubmit="return checkit('theForm');">

<?php 
if( strlen($MSG) ) { echo "<h2>$MSG</h2>"; }

$Lproductid = "";
$Lproductcode = "";
$Lproductname = "";
$Lproductdesc = "";
$Lproductactive = "";
$Lproductlogo = "";
$Lproductsort = "1000";
$Lcompanyid = "1";

if( is_numeric($product_id) && isQuery( $qProduct) ) {
    $qProduct= $qProduct[0][0];
	$Lproductcode = $qProduct->product_code;
    $Lproductid = $qProduct->product_id;
    $Lproductname = $qProduct->product_name;
    $Lproductdesc = $qProduct->product_desc;
    $Lproductactive = $qProduct->active_flag;
    $Lproductlogo = $qProduct->product_logo;
    $Lcompanyid = $qProduct->company_id;
	$Lproductsort = $qProduct->sort;
}

$ActiveOpts = array( array( "value"=> "1" , "display"=> "Active" ) , array( "value"=> "0" , "display"=> "Inactive" ) );

?>

	<div class="ht1">
		 <div class="brdr3 pad2 wid7">
		 	 <h4 class="h1a">Product Information</h4>
		 </div>
	</div>

<div id="r_productname" class="lpad1">
<div class="fl1 wid5"><label for="productname">Name</label> </div>
<div class="fl1"><?php echo  makeInput( $type="text", $name="productname", $class="txt1", $value="$Lproductname"); ?></div>
<div class="clear"></div>
</div>

<div id="r_productdesc" class="lpad1">
<div class="fl1 wid5"><label for="productdesc">Description</label>  </div>
<div class="fl1"><?php echo  makeInput( $type="textarea", $name="productdesc", $class="txta1", $value="$Lproductdesc");?> </div>
<div class="clear"></div>
</div>

<div id="r_productactive" class="lpad1">
	 <div class="fl1 wid5">	 <label for="productactive">Active</label> </div>
	 <div class="fl1 padl1"> 
	 <?php echo makeInput( $type="select", $name="productactive", $class="", $value="$Lproductactive", $options=$ActiveOpts); ?>
	 </div>
	 <div class="fl1 padl1"> <label for="productsort">Sort</label> </div>
	 <div class="fl1 padl1"> 
	 <?php echo makeInput( $type="text", $name="productsort", $class="txt2", $value="$Lproductsort", $options=$Lproductsort); ?>
	 </div>
	 <div class="fl1 padl1"><label for="productcode">Code</label></div> 
	 <div class="fl1 padl1">
	 <?php echo makeInput( $type="text", $name="productcode", $class="", $value="$Lproductcode", $options=$Lproductcode); ?>
	 </div>
	 <div class="clear"></div>
</div>

<div id="r_logo" style="vertical-align:top;" class="lpad1">
	 <div class="fl1 wid5"><label for="productlogo">Logo</label></div>
	 <div class="fl1">
<?php echo <<<zz
<img src="$Lproductlogo" class="" id="productlogo" width="150" />
zz;
?>		  	 
</div>
 
<div class="fl1"><?php echo makeFile("newlogo"); ?></div>
<div class="clear"></div>
</div>

<div>&nbsp;</div>

<input type="hidden" value="<?php echo $Lcompanyid; ?>" name="companyid" id="companyid"></input>
<input type="hidden" value="<?php echo $Lproductid; ?>" name="productid" id="productid"></input>
<input type="hidden" value="1" name="commit" id="commit"></input>

<br> </br>
<br> </br>

<?php
echo makeButton( $type="BUTTON", $display="Save Product", $id="", $func="checkit('');", $class="" );
if( is_numeric( $Lproductid) ) {
echo makeButton( $type="BUTTON", $display="New Detail", $id="", $func="newDetail('workerdiv','workerdivinner','workerdivcontent','?TASK=AJAXPRODDETAIL&NEWITEM=1&IDX=NEW&PRODUCTID=$Lproductid&RETURNTASK=ADMINPRODUCT','workerdivtitle');", $class="" );
}
?>

<br> </br>
<br> </br>

<div class="clear"></div> <!-- the buttons have a FLOAT -->
</form>
<div>&nbsp;</div>
	<div class="ht1">
		 <div class="ds bg1 pad2">
		 	 <h4 class="h1a">Therapuetic Areas</h4>
		 </div>
	</div>

<?php require_once "site/display/product/admin_edit_product_area.php"; ?>	
	
<div>&nbsp;</div>

	<div class="ht1">
		 <div class="brdr3 pad2">
		 	 <h4 class="h1a">Product Details</h4>
		 </div>
	</div>


<?php require "site/display/ajaxproddetail.php"; ?>

<div id="tempdiv"></div>

<script>



function toggleTag(id) {
var tag = document.getElementById('tag_' + id);
var actel = document.getElementById('pfactive_' + id);
var pppid = document.getElementById('pppid_' + id);
var pid = document.getElementById('profileid_' + id);
var name = document.getElementById('proname_' + id);
var detailid = document.getElementById('detailid_' + id);
var productid = document.getElementById('productid');

actel.value = (actel.value==1)? 0:1;
div = "tag_" + id ;
url = "?TASK=TOGGLEDP&PPPID=" + pppid.value + 
	  "&ACTIVE=" + actel.value + "&IDX=" + id + 
	  "&NAME=" + name.innerHTML +
	  "&DETAILID=" + detailid.value +
	  "&PRODUCTID=" + productid.value +
	  "&PROFILEID=" + pid.value + "&COMMIT=1";

//alert( url );
callAjax( div , url );

newClass = tag.getAttribute("class").split(' ');
newClass.pop();

if(actel.value==1) {  
newClass[newClass.length] = "tagalive";
} else {
newClass[newClass.length] = "tagdead";
}
newClass = newClass.join(' ');
tag.setAttribute("class", newClass);
/*
*/

}
var ZZZ = "";
var NextID = 100;
function newTag( id ) {
var productid = document.getElementById('productid');
var profileid = document.getElementById("addprofile_" + id);
var div = document.getElementById('tarpro_'+id);
var openTag = "";
var closeTag = "";
var tagName = "tag_" + NextID;
var url = "?TASK=TOGGLEDP&PPPID=&ACTIVE=1&COMMIT=1&NAME=&IDX=" + tagName + 
	  "&DETAILID=" + id +
	  "&PRODUCTID=" + productid.value +
	  "&PROFILEID=" + profileid.value;
	    /*
	  alert( parseInt(profileid.value) );
	 */
	  if( isNaN(parseInt(productid.value))==true || isNaN(parseInt(profileid.value))==true  ) {
	  	  alert('Uh oh, bad IDs');
	  } else {
NextID++;
//tagName = tagName + NextID;

  openTag = "<div class=\"f tag\" id=\"" + tagName + "\">";
  closeTag = "</div>";
  div.innerHTML+= openTag + closeTag;  
		callAjax(tagName, url);
	  }
	 
	  //alert( url );
} //newTag

function toggleEditable( id ) {
var dsp = document.getElementById( 'display_' + id);
var edt = document.getElementById( 'edit_' + id);
var dspC = dsp.style.display; 
var edtC = edt.style.display;
var ctnt = document.getElementById( 'content_' + id);
var oc = document.getElementById( 'orgcontent_' + id);

	dsp.style.display = (dspC == "none")? "":"none";
	edt.style.display = (edtC == "none")? "":"none";

if( oc.value == ctnt.value) {
//nothing needed
} else {
  oc.value = ctnt.value;
  alert("save the data");
}
	
	
} //toggleEditable

function newTag1( id ) {
var pploop = document.getElementById('pploop');
var div = document.getElementById('tarpro_'+id);
var openTag = "";
var closeTag = "";
var newID = parseInt( pploop.value );
var tagName = "tag_";
var checker = document.getElementById(tagName + newID);

while( checker != null ) {
 newID++;
 checker = document.getElementById(tagName + newID);
}


if( checker == null ) {
  openTag = "<div class=\"fl tag tagalive\" id=\"" + tagName + newID + "\">";
  closeTag = "</div>";
  div.innerHTML+= openTag + closeTag;
  pploop.value = parseInt(newID )+1;
}

// Kary, check with Sean on why he has this hardcode below ??

//callAjax( "tag_" + newID , "http://localhost/DPM/index.html");
callAjax( "tag_" + newID , "http://localhost/dpm3/index.html");

} // newTag

function newDetail( wrkO, wrkI ,wrkC, url, wrkT ) {
	LwrkID = document.getElementById(wrkO); // modal
	wrkI = document.getElementById(wrkI); // container
	wrkT = document.getElementById(wrkT); // title
	callAjax( wrkC, url ); //load the content
	wrkC = document.getElementById(wrkC); // content
	
	wrkT.innerHTML = "New Detail Element";
	toggleDiv(wrkO);

} //newDetail()

function plyVidWrkDiv( wrkO, wrkI ,wrkC, url, wrkT ) {
	LwrkID = document.getElementById(wrkO); // modal
	wrkI = document.getElementById(wrkI); // container
	wrkT = document.getElementById(wrkT); // title
	callAjax( wrkC, url ); //load the content
	wrkC = document.getElementById(wrkC); // content
	
	wrkT.innerHTML = "Product video";
	toggleDiv(wrkO);

} //plyVidWrkDiv()



function centerDiv(div) {
var L = 0;
var T = 0;
var W = 0;
var H = 0;
var WW = 0;
var WH = 0;
div = document.getElementById(div); // content
	W = div.offsetWidth;
	H = div.offsetHeight;
	WW = window.document.width;
	WH = window.document.height;

	L = (WW - W) / 2;
	T = (WH - H) / 2;
	//alert( div.style.left );
	div.style.left = L;
	div.style.top = T;

} //centerDiv


function updateDetail( id ) {
var div = "productdetail_" + id ;
//var div = "maincontent";
var db = document.getElementById("detailband_" + id );
var ddescrip = document.getElementById("detaildescription_" + id);
var odb = document.getElementById("org_detailband_" + id );
var dt = document.getElementById("detailtype_" + id );
var odt = document.getElementById("org_detailtype_" + id );
var act = document.getElementById("active_" + id );
var oact = document.getElementById("org_active_" + id );
var srt = document.getElementById("sort_" + id );
var osrt = document.getElementById("org_sort_" + id );
var ttl = document.getElementById("detailtitle_" + id );
var ottl = document.getElementById("org_detailtitle_" + id );
var ct = document.getElementById("content_" + id );
var oct = document.getElementById("org_content_" + id );
var URL = "?TASK=AJAXDETAILSAVE&COMMIT=1";
var pid = document.getElementById("productid_" + id );
var pdid = document.getElementById("productdetailid_" + id );
var UPD = 0;

if( db.value.length && db.value != odb.value ) { UPD++; }
if( dt.value.length && dt.value != odt.value ) { UPD++; }
if( act.value.length && act.value != oact.value ) { UPD++;}
if( srt.value.length && srt.value != osrt.value ) { UPD++; }
if( ttl.value.length && ttl.value != ottl.value ) { UPD++; }
if( ct.value.length && ct.value != oct.value ) { UPD++; }
if( ddescrip.value.length && ddescrip.value != ddescrip.value ) { UPD++; }

if( UPD ) { // if A1
URL += "&PRODUCTID=" + pid.value;
URL += "&DETAILBAND=" + db.value;
URL += "&DETAILTYPE=" + dt.value;
URL += "&ACTIVE=" + act.value;
URL += "&SORT=" + srt.value;
URL += "&PRODUCTDETAILID=" + pdid.value;
URL += "&DETAILTITLE=" + ttl.value;
URL += "&CONTENT=" + ct.value;
URL += "&DETAILDESCRIPTION=" + ddescrip.value;

//alert(URL);
callAjax( div, URL);

} // if A1



} //updateDetail

function checkit(frm) {
var MSG = "";
var code = document.getElementById('productcode').value;
var sort = document.getElementById('productsort').value;
var act = document.getElementById('productactive').value;
var desc = document.getElementById('productdesc').value;
var name = document.getElementById('productname').value;

if( code.length == 0 ) { MSG+= "Please provide a code for this product.\n"; }
if( isNaN(sort) ) { MSG+= "Please provide a numeric sort for this product.\n"; }
if( desc.length == 0 ) { MSG+= "Please provide a description for this product.\n"; }
if( name.length == 0 ) { MSG+= "Please provide a name for this product.\n"; }

if( MSG.length ) { alert(MSG); } else { document.theForm.submit(); }

} //checkit

function showDeetTypeForm(id) {
var caller = document.getElementById('detailtype_' + id);
var txted = document.getElementById('txted_' + id);
var fileed = document.getElementById('fileed_' + id);
var TE = "none";
var FE = "none";

switch( caller.value ) {
<?php
foreach( $qTypes[0] as $deet ) { //checker
	$tCode = $deet->child_concept_code;
	$tID = $deet->child_concept_id;
	if( $tCode == "PDIMAGE" || $tCode == "PDMOVIE" || $tCode == "PDDLDOC" || $tCode == "PLMOVIE" ) {
echo <<<zz
	 case "$tID":
		 FE = "block";
	 break;
		 
zz;
	}
} //checker
?>
default:
	TE = "block";

} // switch caller.value

txted.style.display = TE;
fileed.style.display = FE;

}//showDeetTypeForm
</script>
<!-- dts changes start -->
<?php } ?>
