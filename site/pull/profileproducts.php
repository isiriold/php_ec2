<?php
$Lmemberid = getKey( 'userid', $_SESSION['member']);

$qMemProd = $conn->productmemberGET( $member_id = $Lmemberid );

?>