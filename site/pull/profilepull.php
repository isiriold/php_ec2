<?php
$Lmemberid = getKey( "memberid", $LOCALGET );

$theSQL = <<<zzz
SELECT
`member_id`, `login`, `pword`, `email`, `prefix_concept_id`, `firstname`, `middlename`, `lastname`, `active_flag`, `specialty`,`signup_date`
FROM `DPM_T_MEMBER`
WHERE member_id = $Lmemberid
;
zzz;

$qMem = $conn->runQuery( $theSQL );
?>