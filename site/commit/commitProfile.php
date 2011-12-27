<?php

function getSpecialityName($prodkey=""){

	switch($prodkey)
	{
	case 1001: return "ADOLESCENT MEDICINE (PEDIATRICS)"; 
 break;
case 1002: return "ANESTHESIOLOGY"; 
 break;
case 1003: return "CARDIOVASCULAR DISEASE"; 
 break;
case 1004: return "CHILD AND ADOLESCENT PSYCHIATRY"; 
 break;
case 1005: return "CLINICAL CARDIAC ELECTROPHYSIOL"; 
 break;
case 1006: return "DERMATOLOGY"; 
 break;
case 1007: return "DIAGNOSTIC RADIOLOGY"; 
 break;
case 1008: return "EM"; 
 break;
case 1009: return "EMERGENCY MEDICINE"; 
 break;
case 1010: return "FAMILY MEDICINE"; 
 break;
case 1011: return "FAMILY PRACTICE"; 
 break;
case 1012: return "GASTROENTEROLOGY"; 
 break;
case 1013: return "GENERAL PRACTICE"; 
 break;
case 1014: return "GENERAL SURGERY"; 
 break;
case 1015: return "GYNECOLOGY"; 
 break;
case 1016: return "HEMATOLOGY/ONCOLOGY"; 
 break;
case 1017: return "IM"; 
 break;
case 1018: return "INTERNAL MEDICINE"; 
 break;
case 1019: return "MEDICAL ONCOLOGY"; 
 break;
case 1020: return "NEONATAL-PERINATAL MEDICINE"; 
 break;
case 1021: return "NEPHROLOGY"; 
 break;
case 1022: return "NEUROLOGICAL SURGERY"; 
 break;
case 1023: return "NEUROLOGY"; 
 break;
case 1024: return "OBSTETRICS &amp; GYNECOLOGY"; 
 break;
case 1025: return "OPHTHALMOLOGY"; 
 break;
case 1026: return "ORTHOPEDIC SURGERY"; 
 break;
case 1027: return "PEDIATRIC PULMONOLOGY"; 
 break;
case 1028: return "PEDIATRICS"; 
 break;
case 1029: return "PLASTIC SURGERY"; 
 break;
case 1030: return "PSYCHIATRY"; 
 break;
case 1031: return "PULMONARY CRITICAL CARE MEDICIN"; 
 break;
case 1036: return "SITEADMIN"; 
 break;
case 1032: return "SPORTS MEDICINE (ORTHOPEDIC SURGERY)"; 
 break;
case 1033: return "THORACIC SURGERY (RESIDENCY)"; 
 break;
case 1034: return "UNSPECIFIED"; 
 break;
case 1035: return "UROLOGY"; 
 break;
		case "": return "null";
		break;

		
		default: return "null";
		break;
	}

}
$Lspeciality = getSpecialityName(getKey( "specialty" , $LOCALGET ));
$Lfname = getKey( "fname" , $LOCALGET );
$Llname = getKey( "lname" , $LOCALGET );
$Lemail = getKey( "email" , $LOCALGET );
$Lpword = getKey( "pword" , $LOCALGET );
$Llogin = getKey( "login" , $LOCALGET );


$signupComplete = $conn->signUp(
						$login = $Llogin,
						$pword = $Lpword,
						$email = $Lemail,
						$fname = $Lfname,
						$lname = $Llname,
						$speciality = $Lspeciality
						);
						
$signupComplete = $signupComplete[0][0];

$Lmemberid = $signupComplete->member_id;

$loadURL = "?TASK=SIGNPG&MSG=SIGNUP&MEMBERID=$Lmemberid";

header("Location: $loadURL");
?>