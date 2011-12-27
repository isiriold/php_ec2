<?php

$product_id = getKeyAll( 'productid' );
$company_id = 1; 


$qProduct = $conn->admin_productGET($product_id );
$qProdDetail =$conn->admin_productdetailGET($product_id, null );

$qProdArea = $conn->product_area_admin_get($product_id );
?>