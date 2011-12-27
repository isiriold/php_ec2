<?php

$con = mysql_connect($dbserver, $dbuser, $dbpass);
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db($dbname , $con);
  
$inactive =  getKey("inactive",  $LOCALPOST) ;
if($inactive == '1')
{
   $presentation_url_id =  getKey("presentation_url_id",  $LOCALPOST) ;
   if($presentation_url_id != '')
   {
     $sql= "update dpm_t_presentation_urls set active_flag=0 where presentation_url_id=$presentation_url_id";
     mysql_query($sql,$con);
   }  
}
else
{
    
    $domain =  getKey("domain",  $LOCALPOST) ;
    $token =  getKey("token",  $LOCALPOST);
    $file_name =  getKey("file_name",  $LOCALPOST);
    $final_url = $domain . '&s=' .$token;
    if($file_name != '')
    {
       $final_url .=  '&file=' .  $file_name ;
    }
    $sql= "INSERT INTO dpm_t_presentation_urls (presentation_url,presention_url_created_at, active_flag) 
    VALUES ('$final_url', now(),'1')";
    mysql_query($sql,$con); 
    
    echo "<input type='hidden' id='presentation_url_id' name='presentation_url_id' value = '";
    echo mysql_insert_id();
    echo "'>";
}
mysql_close($con);
?>




