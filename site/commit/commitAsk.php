<?php

function getTopicName($prodkey=""){

	switch($prodkey)
	{
		case 1: return "General";
		break;
		
		case 2: return "Goutol-Safety";
		break;
		
		case 3: return "Hipitor-Safety";
		break;
		
		case 4: return "Goutol-General";
		break;
		
		case 5: return "Hipitor-General";
		break;
		
		default: return "null";
		break;
	}

}
$Ltopic = getTopicName(getKey( "topic" , $LOCALGET ));
$Lquestion = getKey( "question" , $LOCALGET );
$Lmemberid = getKey( 'userid', $_SESSION['member']);

$conn->askQuestion(
					$memberid = $Lmemberid,
					$question = $Lquestion,
					$topic = $Ltopic);
						

$loadURL = "?TASK=ASKPG&MSG=ASK";

header("Location: $loadURL");
?>