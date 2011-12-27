<?php
$Lmember = getKey( "member", $LOCALGET );

$theSQL = <<<zzz
SELECT
`member_id`, `login`, `pword`, `email`, `prefix_concept_id`, `firstname`, `middlename`, `lastname`, `active_flag`, `specialty`,`signup_date`,`behavior_affinity`,`behavior_therapies`,`behavior_palatech`
FROM `DPM_T_MEMBER`
WHERE login = '$Lmember'
;
zzz;

$qMem = $conn->runQuery( $theSQL );
?>