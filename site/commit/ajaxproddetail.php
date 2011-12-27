<?php

$idx = strToLower(getKey( "idx",$LOCALPOST ));
if( strlen($idx) == 0 ) { $idx = strToLower(getKey( "idx",$LOCALGET ));}

$Lproduct_detail_id= getKey( "productdetailid_$idx", $LOCALPOST)  ;
$Lproduct_id=getKey( "productid_$idx", $LOCALPOST) ;
$Ldetail_group_concept_id=getKey( "detailband_$idx", $LOCALPOST) ;
$Ldetail_type_concept_id=getKey( "detailtype_$idx", $LOCALPOST) ;
$Ldetail_name=getKey( "detailtitle_$idx", $LOCALPOST) ;
$Ldetail_description=getKey( "detaildescription_$idx", $LOCALPOST) ;
$Ldetail_value=getKey( "content_$idx", $LOCALPOST) ;
$Lactive_flag=getKey( "active_$idx", $LOCALPOST) ;
$Lsort=getKey( "sort_$idx", $LOCALPOST);
$LurlRef = getKey( "refurl_$idx",$LOCALPOST );

$idx = strToUpper($idx);
$upfile = "detailfile_$idx"; 
$UPFILE = getKey($upfile , $_FILES);

if( strlen( $LurlRef ) > 10 ) {
$Ldetail_value = $LurlRef;
}

if( is_array($UPFILE) && array_key_exists('name', $UPFILE ) && strlen($UPFILE['name']) ) { //file upload
	$target_path = $uploadpath . basename( $UPFILE['name']); 
	if(move_uploaded_file($UPFILE['tmp_name'], $target_path)) {
    	echo "The file ".  basename( $UPFILE['name']). " has been uploaded";
	} else{
      echo "There was an error uploading the file, please try again!";
	}
	$Ldetail_value = $target_path;
} //file upload

$qPD = $conn->productdetailMGR( 
	$product_detail_id=$Lproduct_detail_id ,
	$product_id=$Lproduct_id ,
	$detail_group_concept_id=$Ldetail_group_concept_id ,
	$detail_type_concept_id=$Ldetail_type_concept_id ,
	$detail_name=$Ldetail_name ,
	$detail_description = $Ldetail_description,
	$detail_value=$Ldetail_value ,
	$active_flag=$Lactive_flag ,
	$sort=$Lsort  );

$RETURNTASK= getKey("returntask", $LOCALGET );
if( strlen($RETURNTASK) == 0) { $RETURNTASK = "ADMINPRODUCT"; }
/*

var_dump( $LOCALPOST );
*/
header("Location: ?TASK=$RETURNTASK&MSG=UPDATE&PRODUCTID=$Lproduct_id");
?>