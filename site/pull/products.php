<?php
$member_id = getKey( 'userid', $_SESSION['member']);
$product_id = getKeyAll( 'productid' );
$company_id = 1; 
$product_name = null;  
$product_desc	= null;  
$product_code = null;   
$product_active_flag = null;
$product_detail_id = null; 
$detail_group_concept_id = null; 
$detail_group_concept_code = null; 
$detail_group_active_flag = null; 
$detail_type_concept_id = null; 
$detail_type_concept_code = null; 
$detail_type_active_flag = null; 
$detail_name = null; 
$detail_description = null;
$detail_value= null; 
$product_detail_active_flag= null; 


$qProd = $conn->proddetailGet(
$member_id ,
$product_id ,
$company_id , 
$product_name ,  
$product_desc	,  
$product_code ,   
$product_active_flag ,
$product_detail_id , 
$detail_group_concept_id , 
$detail_group_concept_code , 
$detail_group_active_flag , 
$detail_type_concept_id , 
$detail_type_concept_code , 
$detail_type_active_flag , 
$detail_name , 
$detail_description ,
$detail_value, 
$product_detail_active_flag
);


?>