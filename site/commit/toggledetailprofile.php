<?php
$Lpppid = getKey("pppid" ,$LOCALGET); 
$Lactive = getKey("active" ,$LOCALGET);
$IDX  = getKey("idx" ,$LOCALGET);
$Lprofileid = getKey("profileid" ,$LOCALGET);
$Lname  = getKey("name" ,$LOCALGET);
$Ldetailiid  = getKey("detailid" ,$LOCALGET);
$Lproductid  = getKey("productid" ,$LOCALGET);

$qPP = $conn->productpartprofileMGR( $Lpppid, $Lproductid, $Ldetailiid, $Lprofileid, $Lactive );

//echo $qPP;

if( isquery( $qPP ) ){ //if 3
$Lpppid = $qPP[0][0]->product_part_profile_id;
$theSQL = <<<zz
select * from DPM_T_PROFILE where profile_id = $Lprofileid
zz;
$qP = $conn->runQuery( $theSQL );
if( isquery( $qP ) ) { //if 2
$Lname = $qP[0][0]->profile_name;
} //if 2
 	 	
} // if 3

if( is_numeric($Lpppid)&& $Lpppid > 0 ) { 
	$URL = "?TASK=AJAXDPTAG&PPPID=$Lpppid&IDX=$IDX&PROFILEID=$Lprofileid&PRODUCTID=$Lproductid&NAME=$Lname&ACTIVE=$Lactive";
	//echo $URL;
	header("Location: ".$URL);
} else {
echo <<<zz
<div style="height:0px;width:0px"></div>
zz;
}

?>
