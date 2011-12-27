DROP PROCEDURE DPM_UP_PRODUCT_DETAIL_GET
DELIMITER $$

create procedure DPM_UP_PRODUCT_DETAIL_GET( IN p_product_detail_id bigint unsigned,IN p_product_id bigint unsigned,IN p_detail_group_concept_id bigint unsigned,IN p_detail_type_concept_id bigint unsigned,IN p_detail_name varchar(255),IN p_detail_description varchar(65535),IN p_detail_value text,IN p_active_flag tinyint,IN p_sort int unsigned )
										
begin

select * from `DPM_T_PRODUCT_DETAIL` where 1=1
and coalesce( product_detail_id, p_product_detail_id, -1) = coalesce( p_product_detail_id, product_detail_id, -1) 
and coalesce( product_id, p_product_id, -1) = coalesce( p_product_id, product_id, -1) 
and coalesce( detail_group_concept_id, p_detail_group_concept_id, -1) = coalesce( p_detail_group_concept_id, detail_group_concept_id, -1) 
and coalesce( detail_type_concept_id, p_detail_type_concept_id, -1) = coalesce( p_detail_type_concept_id, detail_type_concept_id, -1) 
and coalesce( detail_name, p_detail_name, -1) = coalesce( p_detail_name, detail_name, -1) 
and coalesce( detail_description, p_detail_description, -1) = coalesce( p_detail_description, detail_description, -1) 
and coalesce( detail_value, p_detail_value, -1) = coalesce( p_detail_value, detail_value, -1) 
and coalesce( active_flag, p_active_flag, -1) = coalesce( p_active_flag, active_flag, -1) 
and coalesce( sort, p_sort, -1) = coalesce( p_sort, sort, -1);

END$$
DELIMITER ;