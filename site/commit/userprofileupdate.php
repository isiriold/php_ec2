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
$LmTN = ( abs(strlen($Lmname)) )? 0:1 ;

$qMember = $conn->memberMGR(
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
		  $prefixTN = "0", $fistTN = "0", $middleTN = "$LmTN", $lastTN = "0",$special="0");

/*var_dump( $qMember );*/

	  
$qMember = $qMember[0][0];
$Lmemberid = $qMember->member_id;

$loadURL = "?TASK=AJAXPG&MSG=UPDATE&MEMBERID=$Lmemberid";

header("Location: $loadURL");
/*
echo <<<zz
<script>
callAjax( 'profilecontent' , "$loadURL" );
</script>
zz;
*/

?>