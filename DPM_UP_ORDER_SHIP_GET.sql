DROP PROCEDURE DPM_UP_ORDER_SHIP_GET
DELIMITER $$

CREATE PROCEDURE DPM_UP_ORDER_SHIP_GET(IN p_member_id bigint unsigned)
begin
 
select
product_name as ProductName,
shipment_date as shipDate,
ship_to_address as shipAddress,
quantity as qty
from dpm_maindb_new.dpm_t_order_shipment
where member_id = p_member_id

order by shipDate desc
limit 3;

END$$
DELIMITER ;