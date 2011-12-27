DROP PROCEDURE DPM_UP_V_PRODUCT_GET
DELIMITER $$

CREATE PROCEDURE DPM_UP_V_PRODUCT_GET (IN p_product_id bigint unsigned,IN p_company_id bigint unsigned,IN p_product_name varchar(65535),IN p_product_desc text,IN p_product_code varchar(65535),IN p_product_active_flag tinyint,IN p_product_detail_id bigint unsigned,IN p_detail_group_concept_id bigint unsigned,IN p_detail_group_concept_code varchar(65535),IN p_detail_group_active_flag tinyint,IN p_detail_type_concept_id bigint unsigned,IN p_detail_type_concept_code varchar(65535),IN p_detail_type_active_flag tinyint,IN p_detail_name varchar(65535),IN p_detail_description varchar(65535),IN p_detail_value text,IN p_product_detail_active_flag tinyint)
begin

select * from DPM_V_PRODUCT where 1=1
/* product columns */
and product_id= coalesce( p_product_id, product_id) 
and company_id= coalesce( p_company_id, company_id) 
and product_name LIKE coalesce( p_product_name, product_name) 
and product_desc LIKE coalesce(p_product_desc, product_desc ) 
and product_code= coalesce( p_product_code, product_code)  
and product_active_flag = coalesce( p_product_active_flag ,product_active_flag )

/* product detail columns -- a row may or may not exist */ 
and product_detail_id = coalesce(p_product_detail_id ,product_detail_id ) 
and detail_group_concept_id = coalesce(p_detail_group_concept_id ,detail_group_concept_id ) 
and detail_group_concept_code = coalesce(p_detail_group_concept_code ,detail_group_concept_code ) 
and detail_group_active_flag = coalesce(p_detail_group_active_flag ,detail_group_active_flag )
and detail_type_concept_id = coalesce(p_detail_type_concept_id ,detail_type_concept_id )
and detail_type_concept_code = coalesce(p_detail_type_concept_code ,detail_type_concept_code ) 
and detail_type_active_flag = coalesce(p_detail_type_active_flag ,detail_type_active_flag )
and detail_name = coalesce(p_detail_name ,detail_name )
and detail_description = coalesce(p_detail_description ,detail_description )
and detail_value = coalesce(p_detail_value ,detail_value ) 
and product_detail_active_flag = coalesce(p_product_detail_active_flag , product_detail_active_flag)

order by company_id, product_sort, product_name, product_id, 
detail_group_concept_code, product_detail_sort, detail_name 

;


END$$
DELIMITER ;
