DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DPM_UP_MEMBER_MGR`( p_member_id  int unsigned,
p_login  varchar(31), 
p_pword  varchar(255), 
p_email  varchar(255), 
p_prefix_concept_id  int unsigned, 
p_firstname  varchar(255),
p_middlename  varchar(255),
p_lastname  varchar(255),
p_specialty varchar(255), 
p_active_flag  tinyint,
p_prefix_concept_id_TN tinyint,
p_firstname_TN tinyint, 
p_middlename_TN tinyint,
p_lastname_TN tinyint, 
p_specialty_TN tinyint,
p_affinity varchar(255),
p_therapies varchar(255),
p_palatech varchar(255))
begin

DECLARE vCheck int;

SELECT count(*) INTO vCheck FROM DPM_T_MEMBER WHERE member_id = p_member_id;

IF vCheck = 0 THEN /*insert*/
   IF ISNULL(p_member_id) THEN
   	  set p_member_id = getTablekey('DPM_T_MEMBER');
   END IF;
    
   insert into DPM_T_MEMBER ( member_id, login, pword, email, prefix_concept_id, firstname, middlename, lastname, specialty,active_flag,behavior_affinity,behavior_therapies,behavior_palatech )
   values ( coalesce( p_member_id , null ),coalesce( p_login , null ),coalesce( p_pword , null ),coalesce( p_email , null ),coalesce( p_prefix_concept_id , null ),coalesce( p_firstname , null ),coalesce( p_middlename , null ),coalesce( p_lastname , null ),coalesce(p_specialty,null),coalesce( p_active_flag , null ),p_affinity , p_therapies , p_palatech );

ELSE /*update*/
	update DPM_T_MEMBER
	set 
login =  coalesce( p_login, login ),
pword =  coalesce( p_pword, pword ),
email =  coalesce( p_email, email ),
prefix_concept_id =  case when p_prefix_concept_id_TN = 1 then null else coalesce( p_prefix_concept_id, prefix_concept_id ) end,
firstname =  case when p_firstname_TN = 1 then null else coalesce( p_firstname, firstname ) end,
middlename =  case when p_middlename_TN = 1 then null else coalesce( p_middlename, middlename ) end,
specialty = case when p_specialty_TN = 1 then null else coalesce (p_specialty, specialty) end,
lastname =  case when p_lastname_TN = 1 then null else coalesce( p_lastname, lastname ) end,
active_flag =  coalesce( p_active_flag, active_flag )
	where member_id = p_member_id;
END IF;


select p_member_id as member_id;

END$$
DELIMITER ;