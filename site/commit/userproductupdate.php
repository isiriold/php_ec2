<?php
$Lmpid = getKey( "mpid", $LOCALGET );
$Lmemberid = getKey( "memberid", $LOCALGET );
$Lproductid = getKey( "productid", $LOCALGET );
$Lactive = getKey( "active", $LOCALGET );
$Lsort = getKey( "sort", $LOCALGET );
$Lidx = getKey( "idx", $LOCALGET );

if( !is_numeric($Lsort) ) { $Lsort = 1000; }

$qMPID = $conn->memberproductMGR($Lmpid , $Lmemberid , $Lproductid , $Lactive , $Lsort);
//echo $qMPID;

if( isQuery( $qMPID ) ) { //if 1
$qMPID = $qMPID[0][0];
$Lmpid = $qMPID->member_product_id;
//$Lmemberid = $qMPID->member_id;
//$Lproductid = $qMPID->product_id;
//$Lactive = $qMPID->active_flag;
//$Lsort = $qMPID->sort;
} //if 1


echo makeMemProd( $idx="$Lidx", $memprodid="$Lmpid", $memberid="$Lmemberid", $productid="$Lproductid", $active="$Lactive", $sort="$Lsort");

?>
