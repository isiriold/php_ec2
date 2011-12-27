<?php

if ($USERLOGGED != 1)
{
echo <<<xx
<h2 class="">ATTENTION: Please Log in to access your questions </h2>
xx;
}
else
{
#$Lmemberid = getKey( 'userid', $_SESSION['member']);
//var_dump( $Lmemberid );

echo <<<xx
<div id="askContainer" class="pad3 brdr4" >

<div>


	<script>
callAjax( 'askContainer' , '?TASK=ASKPG&MEMBERID=$Lmemberid' )
	function updateMember(div) {
	a = document.getElementById('msg');
	a.innerHTML = "";
var topic = document.getElementById('askTopicName').value;
var question = document.getElementById('askQuestion').value;
//var memberid = document.getElementsByName('memberid')[0].value;
var URL = "?TASK=ASK&COMMIT=1";
      URL+= "&TOPIC=" + topic;
      URL+= "&QUESTION=" + question;
//	  URL+= "&MEMBERID=" + memberid;

//div = document.getElementById(div);
	
if( topic == 0) {
	a.innerHTML = "<h4>Please select a topic!</h4>";
}else if(question === "" ){
	a.innerHTML = "<h4>Please ask your question!</h4>";
}else if(question.length < 10 ){
	a.innerHTML = "<h4>Please ask a complete question!</h4>";
} else {
  callAjax( div, URL );
 }
	  
} //updateMember
</script>

xx;

#echo makeHiddenInput( $name="memberid", $value="$Lmemberid" );
#echo makeButton( $type="BUTTON", $display="Ask", $id="", $func="updateMember('askContainer')", $class="ask1" ) ;
}
?>