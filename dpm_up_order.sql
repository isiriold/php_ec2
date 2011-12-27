DROP PROCEDURE DPM_UP_ORDER
DELIMITER $$

CREATE PROCEDURE DPM_UP_ORDER (IN p_member_id bigint unsigned, IN p_product_name varchar(65535), IN p_ship_to_address varchar(65535))
begin

insert into DPM_T_ORDER
(order_id, login, product_name, order_date, ship_to_address)
values
(null, (SELECT login FROM dpm_t_member WHERE member_id = p_member_id), p_product_name, CURDATE(), p_ship_to_address);

select p_member_id as member_id;

END$$
DELIMITER ;