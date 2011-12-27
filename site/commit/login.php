<?php

$Luname = getKey("username", $GLOBALS["LOCALPOST"]);
$Lpword = getKey("pword", $GLOBALS["LOCALPOST"]);
$qLogin = $conn->loginGet( $Luname, $Lpword);

if( isQuery($qLogin) ) {
$qLogin = $qLogin[0];

$tmpProf = array( );
foreach( $qLogin as $prof ) { // profiles
	$tmpProf[] = array( "profileid"=> $prof->profile_id, "profilename"=> $prof->profile_name );
} // profiles


$qLogin = $qLogin[0];		

$_SESSION['member']= array();
$_SESSION['member']['userid'] = $qLogin->member_id ;	 
$_SESSION['member']['user'] = $qLogin->login ;	 
$_SESSION['member']['pword'] = $qLogin->pword ;	 
$_SESSION['member']['fistname'] = $qLogin->firstname ;
$_SESSION['member']['middlename'] = $qLogin->middlename;
$_SESSION['member']['lastname'] = $qLogin->lastname ;	
$_SESSION['member']['prefix'] = $qLogin->prefix_concept_display ;	
$_SESSION['member']['signup'] = $qLogin->signup_date;
$_SESSION['member']['email'] = $qLogin->email; 
$_SESSION['member']['suffix'] = "" ;
$_SESSION['member']['fullname'] = $qLogin->firstname . rtrim(" " . $qLogin->middlename ) . rtrim(" " . $qLogin->lastname );
$_SESSION['member']['titlename'] = $_SESSION['member']['Prefix'] . rtrim(" " . $_SESSION['member']['fullname'] ) . rtrim(" " . $_SESSION['member']['Suffix'] );
$_SESSION['member']['groups'] = array(); 
$_SESSION['member']['profiles'] = $tmpProf ;

if( $qLogin->member_id == 4 ) {
$_SESSION['member']['groups'][] = "ADMIN";
$_SESSION['member']['isadmin']=1;
} else {
$_SESSION['member']['isadmin']=0;
}

header("Location: ?TASK=HOME");

} else { 
// login failed, send back to login with message
header("Location: ?TASK=$CURTASK&MSG=LOGINFAIL");

}


?>


