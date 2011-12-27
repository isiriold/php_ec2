<form action="?TASK=<?php echo $CURTASK; ?>" method="post" class="ajax_form" enctype="multipart/form-data" >

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

if( isQuery( $qProduct) ) {
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

$TProfile = "";
if( isQuery( $qProfs ) ) { //if $qProfs

foreach( $qProfs[0] as $q1 ) { //foreach $qProfs
$Lval = $q1->profile_id ;
$Ldsp = $q1->profile_name ;
$TProfile .= <<<zz
<option value="$Lval">$Ldsp</option>
zz;
} // foreach $qProfs

}//if $qProfs

?>
                        


<div id="r_productname">
<label for="productname">Name:</label> 
<?php echo  makeInput( $type="text", $name="productname", $class="", $value="$Lproductname"); ?>
</div>

<div id="r_productdesc">
<label for="productdesc">Description:</label> 
<?php echo  makeInput( $type="textarea", $name="productdesc", $class="", $value="$Lproductdesc");?>
</div>

<div id="r_productactive">
	 <div class="fl1">
	 <label for="productactive">Active:</label> 
	 <?php echo makeInput( $type="select", $name="productactive", $class="", $value="$Lproductactive", $options=$ActiveOpts); ?>
	 </div>
	 <div class="fl1">
	 <label for="productactive">Sort:</label> 
	 <?php echo makeInput( $type="text", $name="productsort", $class="", $value="$Lproductsort", $options=$Lproductsort); ?>
	 </div>
	 <div class="fl1">
	 <label for="productactive">Code:</label> 
	 <?php echo makeInput( $type="text", $name="productcode", $class="", $value="$Lproductcode", $options=$Lproductcode); ?>
	 </div>
	 <div class="clear"></div>
</div>

<div id="r_logo" style="vertical-align:top;">
	 <div class="fl1">
	 	  <label for="productlogo">Logo:</label>
<?php echo <<<zz
<img src="$Lproductlogo" class="" id="productlogo" width="150" />
zz;
?>		  	 
	 </div>
<div class="fl1"><?php echo makeFile("newlogo"); ?></div>
<div class="clear"></div>
</div>


<input type="hidden" value="<?php echo $Lcompanyid; ?>" name="companyid" id="companyid"></input>
<input type="hidden" value="<?php echo $Lproductid; ?>" name="productid" id="productid"></input>
<input type="hidden" value="1" name="commit" id="commit"></input>
<input type="submit" value="Save" class=""></input>



<div class="detailmain">
	 	<div class="fl1 dband">Band</div>
	 	<div class="fl1 dtitle">Type</div>
	 	<div class="fl1 dtitle">Title</div>
	 	<div class="fl1 dgroups">Content</div>
	 	 <div class="clear"></div>
</div>
<?php
$detail = "";
$theHTML = "";
$curCLOSE = "";
$groupIdx = 0;

foreach( $qProdDetail[0] as $deet ) { //foreach 1
if( $detail != $deet->product_detail_id ) { //if 1
	$detail = $deet->product_detail_id;
	$theHTML .= $curCLOSE;
	$theHTML .= makeProductDetailOpen( $idx = $detail, $band = $deet->detail_group_concept_desc, $type = $deet->detail_type_concept_display, $title = $deet->detail_name, $TPoptions = $TProfile );
	$curCLOSE = makeProductDetailClose( $idx = "$detail", $content = $deet->detail_value );
} //if 1


$idx = $groupIdx; 
$name = $deet->profile_name; 
$profileid = $deet->profile_id; 
$pppid = $deet->product_part_profile_id;
$detailid = $detail;
$active = $deet->product_part_profile_active_flag ;
$tagClass = ($active == 1)? "tagalive":"tagdead"; // this has to happen before toggling the active
$active = ($active == 1)? 0: 1 ;
$productid = $deet->product_id;
$tagName = "tag_" . $idx;
$tagURL = "?TASK=TOGGLEDP&COMMIT=1&PPPID=$pppid&PROFILEID=$profileid&DETAILID=$detailid&PRODUCTID=$productid&NAME=$name&ACTIVE=$active&IDX=$tagName";

$theHTML .= buildTag( $tagName, $tagClass, $tagURL, $name); 

if( is_numeric($deet->profile_id) ) { $groupIdx++; }

}//foreach 1

$theHTML .= $curCLOSE;
$theHTML.= makeHiddenInput( $name="pploop", $value=$groupIdx) ;


echo $theHTML;
?>
<div id="tempdiv"></div>
</form>

<script>
String.prototype.trim = function() {
	return this.replace(/^\s+|\s+$/g,"");
}
String.prototype.ltrim = function() {
	return this.replace(/^\s+/,"");
}
String.prototype.rtrim = function() {
	return this.replace(/\s+$/,"");
}



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

  openTag = "<div class=\"fl tag\" id=\"" + tagName + "\">";
  closeTag = "</div>";
  div.innerHTML+= openTag + closeTag;  
		callAjax(tagName, url);
	  }
	 
	  //alert( url );
} //newTag


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

callAjax( "tag_" + newID , "http://localhost/DPM/index.html");



//callrtn = 
//alert( callrtn );
//tempdiv = document.getElementById(tempdiv );
//callrtn = tempdiv.innerHTML;

/*
if( callrtn.trim().length ) {
	div.innerHTML+= openTag + callrtn + closeTag; 
	pploop.value = parseInt(newID )+1;
}
*/


} // newTag

</script>

