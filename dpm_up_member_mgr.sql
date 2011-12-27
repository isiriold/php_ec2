DROP PROCEDURE DPM_UP_MEMBER_MGR
/

CREATE PROCEDURE DPM_UP_MEMBER_MGR (IN p_member_id int unsigned,IN p_login varchar(65535),IN p_pword varchar(65535),IN p_email varchar(65535),IN p_prefix_concept_id int unsigned,IN p_firstname varchar(65535),IN p_middlename varchar(65535),IN p_lastname varchar(65535),IN p_specialty varchar(65535),IN p_active_flag tinyint,IN p_prefix_concept_id_TN tinyint,IN p_firstname_TN tinyint,IN p_middlename_TN tinyint,IN p_lastname_TN tinyint,IN p_specialty_TN tinyint)
begin

DECLARE vCheck int;

SELECT count(*) INTO vCheck FROM DPM_T_MEMBER WHERE member_id = p_member_id;

IF vCheck = 0 THEN /*insert*/
   IF ISNULL(p_member_id) THEN
   	  set p_member_id = getTablekey('DPM_T_MEMBER');
   END IF;
    
   insert into DPM_T_MEMBER ( member_id, login, pword, email, prefix_concept_id, firstname, middlename, lastname, specialty,active_flag )
   values ( coalesce( p_member_id , null ),coalesce( p_login , null ),coalesce( p_pword , null ),coalesce( p_email , null ),coalesce( p_prefix_concept_id , null ),coalesce( p_firstname , null ),coalesce( p_middlename , null ),coalesce( p_lastname , null ),coalesce(p_specialty,null),coalesce( p_active_flag , null ) );

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

END
/
