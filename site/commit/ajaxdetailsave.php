<?php

 $Lpdid= getKey( "productdetailid", $LOCALGET)  ;
 $Lproduct_id=getKey( "productid", $LOCALGET) ;
 $Ldetail_group_concept_id=getKey( "detailband", $LOCALGET) ;
 $Ldetail_type_concept_id=getKey( "detailtype", $LOCALGET) ;
 $Ldetail_name=getKey( "detailtitle", $LOCALGET) ;
 $Ldetail_value=getKey( "content", $LOCALGET) ;
 $Lactive_flag=getKey( "active", $LOCALGET) ;
 $Lsort=getKey( "sort", $LOCALGET);
 $Ldd=getKey( "detaildescription", $LOCALGET);
$qPD = $conn->productdetailMGR( 
	$product_detail_id=$Lpdid ,
	$product_id=$Lproduct_id ,
	$detail_group_concept_id=$Ldetail_group_concept_id ,
	$detail_type_concept_id=$Ldetail_type_concept_id ,
	$detail_name=$Ldetail_name ,
	$detail_description=$Ldetail_description, 
	$detail_value=$Ldetail_value ,
	$active_flag=$Lactive_flag ,
	$sort=$Lsort  );
$_formFix ="nothing";
if( isQuery($qPD) ) { //isQuery($qPD
$Lpdid = $qPD[0][0]->product_detail_id;
$_formFix ="something";
header("Location: ?TASK=AJAXPRODDETAIL&IDX=$Lpdid&PRODUCTID=$Lproduct_id&NEWITEM=0&BOOK=$_formFix");

}//isQuery($qPD

	//var_dump( $Lpdid );
	
?>