<?php 
/******************************************
KARY, SET $url TO THE LOCATION OF THE FORUMS LOGIN
******************************************/
$url = 'http://localhost/phorum-5.2.17/login.php';


//set POST variables
$username= $_SESSION['member']['user']; 
$password=$_SESSION['member']['pword'];
$fields = array( "username"=>$username,"password"=>$password,"redir"=>"http://localhost/phorum-5.2.17/list.php?2"  );
$fields_string="";
//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string,'&');

//open connection
$ch = curl_init();
//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
//execute post
$result = curl_exec($ch);
//close connection
curl_close($ch);


?>

