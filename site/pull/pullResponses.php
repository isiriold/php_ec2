<?php

$Lmemberid = getKey( "memberid", $LOCALGET );

$responses = $conn->pullResponses($Lmemberid);

?>