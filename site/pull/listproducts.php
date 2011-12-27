<?php
$Lmemberid = getKey( 'userid', $_SESSION['member']);

$qMemProd = $conn->memberproductGET( $member_id = $Lmemberid , $active = 1);

?>