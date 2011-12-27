<?php
$product_area_id =getKey("prodareaid" ,$LOCALGET) ;
$product_id =getKey("productid" ,$LOCALGET) ;
$product_area_concept_id =getKey("areaid" ,$LOCALGET) ;
$active =getKey("active" ,$LOCALGET) ;

$qPA = $conn->productareaMGR( $product_area_id, $product_id, $product_area_concept_id, $active );


$name = "Unknown";
if( isquery( $qPA ) ){ //if 3
$theSQL = <<<zz
select * from DAD_T_CONCEPT where concept_id = $product_area_concept_id
zz;
$qP = $conn->runQuery( $theSQL );
// echo $theSQL;
if( isquery( $qP ) ) { //if 2

$name = $qP[0][0]->concept_display;

}//if 2
 	 	
} // if 3


$idx = getKey("idx" ,$LOCALGET);
$active = ($active)? 0:1;
$productid = $product_id;
$prodareaid = $product_area_id;
$areaid = $product_area_concept_id;

if( is_numeric($prodareaid)&& $prodareaid > 0 ) { 
	$URL = "?TASK=AJAXPATAG&ACTIVE=$active&IDX=$idx&PRODUCTID=$productid";
	$URL.= "&NAME=$name&PRODAREAID=$prodareaid&AREAID=$areaid";
	//echo $URL;
	header("Location: ".$URL);
} else {
echo <<<zz
<div style="height:0px;width:0px"></div>
zz;
}

?>
