<?php
$detail = "";
$theHTML = "";
$curCLOSE = "";
$groupIdx = 0;

 $Lformfix= getKey( "book", $LOCALGET)  ;
 $formfix = ( $Lformfix == "something")? true : false;
// echo  $formfix;

$idx = getKey( "idx", $LOCALGET );
$buildEmpty = getKey( "newitem", $LOCALGET );
$buildEmpty = ( $buildEmpty == 1 ) ? $buildEmpty : 0;

/* adding this to allow for an "emergency" lookup */
if( is_numeric($idx) && $buildEmpty != 1 && !isQuery($qProdDetail) ) {
$qProdDetail =$conn->admin_productdetailGET(null, $idx );
}


$theSQL = <<<zz
SELECT * FROM DPM_T_PROFILE ORDER BY profile_name
zz;
$qProfs = $conn->runQuery($theSQL);
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

$qBands = $conn->conceptrelateGET( $concept_relate_id = null, 
        $parent_concept_code = 'PRODGROUP', 
        $concept_relate_active_flag = null, 
        $parent_active_flag = null, 
        $child_active_flag = null  );

$qTypes = $conn->conceptrelateGET( $concept_relate_id = null, 
        $parent_concept_code = "PRODDETAILTYPE", 
        $concept_relate_active_flag = null, 
        $parent_active_flag = null, 
        $child_active_flag = null  );


if( isquery($qProdDetail) && $buildEmpty != 1 ) { // if isquery $qProdDetail or buildEmpty

foreach( $qProdDetail[0] as $deet ) { //foreach 1

if( $detail != $deet->product_detail_id ) { //if 1
	$detail = $deet->product_detail_id;
	$theHTML .= $curCLOSE;
	$theHTML .= makeProductDetailOpen( $idx = $detail, 
			 $band = $deet->detail_group_concept_display, 
			 $bandid= $deet->detail_group_concept_id, 
			 $type = $deet->detail_type_concept_display, 
			 $typeid = $deet->detail_type_concept_id, 
			 $typecode = $deet->detail_type_concept_code,
			 $title = $deet->detail_name,
			 $description = $deet->detail_description,
			 $content = $deet->detail_value, 
			 $BandOptions = $qBands, 
			 $TypeOptions = $qTypes, 
			 $TPoptions = $TProfile, 
			 $active=$deet->product_detail_active_flag , 
			 $sort=$deet->product_detail_sort, 
			 $productid= $deet->product_id , 
			 $curtask="AJAXPRODDETAIL",
			 $formFix=$formfix			 );
	$curCLOSE = makeProductDetailClose( $idx = "$detail", $content = "", $formFix=$formfix);
} //if 1

//$idx = $deet->product_detail_id;
$idx = $deet->product_part_profile_id; 
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


}//foreach 1

$theHTML .= $curCLOSE;


} elseif ( $buildEmpty == 1 ) { // elseif isquery $qProdDetail or buildEmpty
$productid = getKey("productid",$LOCALGET);
	$theHTML .= makeProductDetailOpen( $idx = 'NEW', 
			 $band = "", 
			 $bandid= "", 
			 $type = "", 
			 $typeid = "", 
			 $typecode = "",
			 $title = "", 
			 $description = "",
			 $content = "", 
			 $BandOptions = $qBands, 
			 $TypeOptions = $qTypes, 
			 $TPoptions = $TProfile, 
			 $active=1, 
			 $sort=100, 
			 $productid = 
			 $productid , 
			 $curtask=$CURTASK
			 );
	$theHTML.= makeProductDetailClose( $idx = 'NEW', $content = "" );

} // if isquery $qProdDetail or buildEmpty
# dts changes end
echo $theHTML;

?>