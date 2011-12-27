DELIMITER $$

create PROCEDURE `dpm_maindb`.`DPM_UP_MEMBER_GET` (
    p_member_id bigint unsigned,
    p_login varchar(31) ,
    p_prefix_concept_id bigint unsigned,
    p_prefix_concept_code  varchar(31) ,
    p_firstname varchar(255) ,
    p_lastname varchar(255) ,
    p_member_active_flag tinyint,
    p_prefix_active_flag tinyint 
)
BEGIN

select 
m.member_id ,
m.login ,
m.pword ,
m.email ,
m.prefix_concept_id ,
m.prefix_concept_code,
m.prefix_concept_display,
m.prefix_concept_desc,
m.firstname ,
m.middlename ,
m.lastname ,
m.member_active_flag,
m.prefix_active_flag

from DPM_V_MEMBER as m

where 1=1
and m.member_id             =       coalesce(p_member_id , m.member_id) 
and m.`login`                 =       coalesce(p_login , m.`login`) 
and m.prefix_concept_id     =       coalesce(p_prefix_concept_id , m.prefix_concept_id) 
and m.prefix_concept_code   =       coalesce(p_prefix_concept_code , m.prefix_concept_code) 
and m.firstname             like    coalesce(p_firstname , m.firstname) 
and m.lastname              like    coalesce(p_lastname , m.lastname) 
and m.member_active_flag    =       coalesce(p_member_active_flag , m.member_active_flag)
and m.prefix_active_flag    =       coalesce(p_prefix_active_flag , m.prefix_active_flag)
 
order by
    m.lastname,
    m.firstname,
    m.login



;

END
$$