<?php 
/*
    * Superglobals — Superglobals are built-in variables that are always available in all scopes
    * $GLOBALS — References all variables available in global scope
    * $_SERVER — Server and execution environment information
    * $_GET — HTTP GET variables
    * $_POST — HTTP POST variables
    * $_FILES — HTTP File Upload variables
    * $_REQUEST — HTTP Request variables
    * $_SESSION — Session variables
    * $_ENV — Environment variables
    * $_COOKIE — HTTP Cookies
    * $php_errormsg — The previous error message
    * $HTTP_RAW_POST_DATA — Raw POST data
    * $http_response_header — HTTP response headers
    * $argc — The number of arguments passed to script
    * $argv — Array of arguments passed to script
*/

session_start();

require_once "site/config.php";
require_once "engine/functions.php";


$LOCALGET = array_change_key_case($_GET);
$LOCALPOST = array_change_key_case($_POST);
$LOCALGROUPS = getKey("groups", $_SESSION['member']);

require_once "site/class/mainclass.php";
require_once "site/class/logonclass.php"; 
require_once "site/taskmanager.php";
require_once "site/funcs.php";

$conn = new SQL ( $dbserver , $dbuser , $dbpass , $dbname , true);
$conn->openConn( $conn);
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }

$USERLOGGED = isLogin();
$CURTASK = currentTask();
$CURCOMMIT = commitORdisplay();

// build log function
if( is_numeric( $_SESSION['member']['userid'])) {
require_once "tracker.php";
}


if( $CURCOMMIT == 1) {
 foreach( $ENG["commit"] as $pg ) {  if( strlen( rtrim($pg) ) ) { include $pg ; }  }
} else {
 // do all data pulls here
$LPTitle = getKey("pagetitle", $ENG);
$LSTitle = getKey("sitetitle", $ENG);
//echo $USERLOGGED;
$Lmemberid = getKey( 'userid', $_SESSION['member']);
$qProdNav = $conn->memberproductGET( $member_id = $Lmemberid , $active = 1);
 
 
foreach( $ENG["pull"] as $pg ) {  if( strlen( rtrim($pg) ) ) { include $pg ; }  }
 //determine display template
 if( isset( $ENG["ajaxdisplay"] ) ) {
 include "site/template/ajax.php";
 } else {
  include "site/template/bastian.php";
 }
}



?>
