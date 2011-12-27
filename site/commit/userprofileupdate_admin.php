<?php

$Lfname = getKey( "fname" , $LOCALGET );
$Lmname = getKey( "mname" , $LOCALGET );
$Llname = getKey( "lname" , $LOCALGET );
$Lemail = getKey( "email" , $LOCALGET );
$Lpword = getKey( "pword" , $LOCALGET );
$Llogin = getKey( "login" , $LOCALGET );
$Lmemberid = getKey( "memberid" , $LOCALGET );
$Lactive = getKey( "active" , $LOCALGET );
$Lprefix = getKey( "prefix" , $LOCALGET );
$Lspecialty = getKey( "specialty" , $LOCALGET );

function aff($affinity){
	switch($affinity){
		case "1001" : return "Low";
		break;
		case "1002" : return "Med";
		break;
		case "1003" : return "High";
		break;
		case "1004" : return "Unknown";
		break;
		default: return "Unknown";
		break;
	}
}
function therp($therp){
	switch($therp){
		case "1001" : return "Yes";
		break;
		case "1002" : return "No";
		break;
		case "1003" : return "Unknown";
		break;

		default: return "Unknown";
		break;
	}
}
function pala($pala){
	switch($pala){
		case "1001" : return "Yes";
		break;
		case "1002" : return "No";
		break;
		case "1003" : return "Unknown";
		break;

		default: return "Unknown";
		break;
	}
}

$Laffinity = aff(getkey( "affinity" , $LOCALGET ));
$Ltherapies = therp(getKey( "therapies" , $LOCALGET ));
$Lpalatech = pala(getKey( "palatech" , $LOCALGET ));

$LmTN = ( abs(strlen($Lmname)) )? 0:1 ;

$qMember = $conn->memberAdminMGR(
          $memberid = $Lmemberid,
          $login = $Llogin,
          $pword = $Lpword,
          $email = $Lemail,
          $prefixid = $Lprefix,
          $firstname = $Lfname,
          $middlename = $Lmname,
          $lastname = $Llname,
          $specialty = $Lspecialty,
          $active_flag = $Lactive,
		  $prefixTN = "0", $fistTN = "0", $middleTN = "$LmTN", $lastTN = "0",$special="0",
		  $Laffinity = $Laffinity, $Ltherapies = $Ltherapies, $Lpalatech = $Lpalatech
		  );

/*var_dump( $qMember );*/

	  
$qMember = $qMember[0][0];
$Lmemberid = $qMember->login;

$loadURL = "?TASK=AJAXPROFPG&MSG=UPDATE&MEMBER=$Lmemberid";

header("Location: $loadURL");
/*
echo <<<zz
<script>
callAjax( 'profilecontent' , "$loadURL" );
</script>
zz;
*/

?>