DROP PROCEDURE DPM_UP_V_PRODUCT_PART_GET
DELIMITER $$

CREATE PROCEDURE DPM_UP_V_PRODUCT_PART_GET (IN p_product_id bigint unsigned,IN p_product_detail_id bigint unsigned)
BEGIN


select *
from    DPM_V_PRODUCT_PART_PROFILE
where   product_id = coalesce( p_product_id, product_id)
and     product_detail_id = coalesce( p_product_detail_id, product_detail_id)
order by
    product_id, 
    detail_group_concept_display,
    product_detail_sort,
    detail_name,
	detail_description,
    profile_name
    ;
	
END$$
DELIMITER ;