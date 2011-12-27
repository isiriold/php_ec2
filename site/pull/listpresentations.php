<?php
$Lmemberid = getKey( 'userid', $_SESSION['member']);


$con = mysql_connect($dbserver, $dbuser, $dbpass);
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

    mysql_select_db($dbname , $con);
    $sql= "select * from dpm_t_presentation_urls where active_flag=1;";

    $qMemProd = mysql_query($sql, $con); 
    mysql_close($con);
    
    
    

?>
