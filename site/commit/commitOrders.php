<?php

function getProductName($prodkey=""){

	switch($prodkey)
	{
		case 1: return "Goutol";
		break;
		
		case 2: return "Hipitor";
		break;
		
		case 3: return "Mylorin";
		break;
		
		default: return "null";
		break;
	}

}
$Lprod = getProductName(getKey( "prod" , $LOCALGET ));
$Lshipaddr = getKey( "shipaddr" , $LOCALGET );
$Lmemberid = getKey( 'userid', $_SESSION['member']);

$orderComplete = $conn->makeOrder(
						$memberid = $Lmemberid,
						$prod = $Lprod,
						$shipaddr = $Lshipaddr);
						
$orderComplete = $orderComplete[0][0];

$Lmemberid = $orderComplete->member_id;

$loadURL = "?TASK=ORDERSPG&MSG=ORDERS&MEMBERID=$Lmemberid";

header("Location: $loadURL");
?>
