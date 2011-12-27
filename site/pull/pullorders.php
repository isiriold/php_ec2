<?php

$Lmemberid = getKey( "memberid", $LOCALGET );

$shipDetails = $conn->pullShipments($Lmemberid);

?>