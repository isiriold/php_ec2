<?php

function getKeyAll( $key ) {
$rtn = "";
$rtn = getKey($key, $GLOBALS["LOCALPOST"]);
if( strlen($rtn) == 0) {
	$rtn = getKey($key, $GLOBALS["LOCALGET"]);
}

return $rtn;
}

function getKey($key, &$arr )
{

if( is_array($arr) && array_key_exists( $key, $arr ) )
{
 return $arr[$key];
} 
return "";
}

function isSelected( $val, $test)
{
echo ($val == $test)? "SELECTED" : ""; 
}
function isQuery( &$var )
{
 $tmp = $var;
 if( is_array($tmp) == false ) return false;  
 if( count($tmp) == 0 ) return false;
 $tmp = $tmp[0];
 if( is_array($tmp) == false ) return false;  
 if( count($tmp) == 0 ) return false;
 $tmp = getKey( "0", $tmp );
 return is_object($tmp);
}
function paraformat( $val )
{
$paragraphs = explode("\n", $val );
$rtn = "";
for ($i = 0; $i < count ($paragraphs); $i++){
$rtn .= '<p>' . $paragraphs[$i] . '</p>';
}
return $rtn;
}



?>