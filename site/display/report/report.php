

<div class="bgAlt"> <!-- hit open -->

<div class="fl1 wid3 padl2">date</div>
<div class="fl1 wid1 padl2">ip</div>
<div class="fl1 wid4 padl2">login</div>
<div class="fl1 wid3 padl2">browser</div>
<div class="fl1 wid2 padl2">server</div>

<div class="fl1 wid3 padl2">task</div>
<div class="clear"></div>

</div> <!-- hit close -->

<?php

function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
   
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }
   
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
   
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
   
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
   
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
} 



if( isQuery( $qRpt ) ) { //isquery 1
$rptCtr = 0;
foreach( $qRpt[0] as $cur ) { // foreach 1
$rptCtr++;

$date = new DateTime($cur->TRACKING_TIME);
$date = $date->format('Y-m-d H:i:s');
$ip = $cur->REMOTE_ADDR;
$log = $cur->login;
$browser = getBrowser( $cur->HTTP_USER_AGENT );
$browser = $browser['name'];
$srvr = $cur->HTTP_HOST;
$task = $cur->QUERY_STRING;

$divClass = ( $rptCtr % 2 == 0 ) ? "bgWhite" : "";

echo <<<zzz
<div class="$divClass"> <!-- hit open -->

<div class="fl1 wid3 padl2">$date&nbsp;</div>
<div class="fl1 wid1 padl2">$ip&nbsp;</div>
<div class="fl1 wid4 padl2">$log&nbsp;</div>
<div class="fl1 wid3 padl2">$browser&nbsp;</div>
<div class="fl1 wid2 padl2">$srvr&nbsp;</div>
<div class="fl1 wid3 padl2">$task&nbsp;</div>
<div class="clear"></div>

</div> <!-- hit close -->

zzz;

}// foreach 1

}//isquery 1


?>