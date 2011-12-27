DROP PROCEDURE DPM_UP_PRODUCT_DETAIL_MGR
DELIMITER $$

CREATE PROCEDURE DPM_UP_PRODUCT_DETAIL_MGR (IN p_product_detail_id bigint unsigned,IN p_product_id bigint unsigned,IN p_detail_group_concept_id bigint unsigned,IN p_detail_type_concept_id bigint unsigned,IN p_detail_name varchar(65535),IN p_detail_description varchar(65535),IN p_detail_value text,IN p_active_flag tinyint,IN p_sort int unsigned)
begin

DECLARE vCheck int;
SELECT count(*) INTO vCheck FROM DPM_T_PRODUCT_DETAIL WHERE product_detail_id = p_product_detail_id;

IF vCheck = 0 THEN /*insert*/
   IF ISNULL(p_product_detail_id) THEN
   	  set p_product_detail_id = getTablekey('DPM_T_PRODUCT_DETAIL');
   END IF;
    
   insert into DPM_T_PRODUCT_DETAIL ( product_detail_id, product_id, detail_group_concept_id, detail_type_concept_id, detail_name, detail_description, detail_value, active_flag, sort )
   values ( coalesce( p_product_detail_id , null ),coalesce( p_product_id , null ),coalesce( p_detail_group_concept_id , null ),coalesce( p_detail_type_concept_id , null ),coalesce( p_detail_name , null ),coalesce( p_detail_description , null ),coalesce( p_detail_value , null ),coalesce( p_active_flag , null ),coalesce( p_sort , null ) );

ELSE /*update*/
	update DPM_T_PRODUCT_DETAIL
	set 
product_id =  coalesce( p_product_id, product_id ),
detail_group_concept_id =  coalesce( p_detail_group_concept_id, detail_group_concept_id ),
detail_type_concept_id =  coalesce( p_detail_type_concept_id, detail_type_concept_id ),
detail_name =  coalesce( p_detail_name, detail_name ),
detail_description = coalesce( p_detail_description, detail_description ),
detail_value =  coalesce( p_detail_value, detail_value ),
active_flag =  coalesce( p_active_flag, active_flag ),
sort =  coalesce( p_sort, sort )
	where product_detail_id = p_product_detail_id;
END IF;


select p_product_detail_id as product_detail_id;

END$$
DELIMITER ;