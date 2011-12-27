<?php

#$shipDetails = $shipDetails[0];
//print_r($shipDetails );
//$ProductName = $shipDetails[1]->ProductName ;
//var_dump($ProductName );
//foreach ($shipDetails as $Details){
//echo $Details->ProductName."<br />";}
//$shipDate = $shipDetails->shipDate ;
//$shipAddress = $shipDetails->shipAddress ;
//$qty = $shipDetails->qty ;

#$Lmemberid = getKey( 'userid', $_SESSION['member']);
//var_dump( $Lmemberid );
if( strlen($MSG) ) { echo "<h2>$MSG</h2>"; }
echo <<<xx

	<div class="ht1">
		<div class="brdr3 pad2 wid7">
			<h4 class="h1a" >Ask your question</h4>
		</div>
	</div>
	<div id="msg"></div> 
	
	<div class="mrgn1">
		 <div class="fl1 wid6"><label for="askTopicName">Topic:</label></div>
		 <div class="fl1">
			<select id="askTopicName" class="txtsel"  >
				<option value="0">[select a topic]</option>
				<option value="1">General</option>
				<option value="2">Goutol-Safety</option>
				<option value="3">Hipitor-Safety</option>
				<option value="4">Goutol-General</option>
				<option value="5">Hipitor-General</option>
			</select>
		</div>
		<div class="clear"></div>
	</div>
	<br/>
	<br/>
	
	<div class="ht6 mrgn1">
		<div class="fl1 wid6"><label for="askQuestion">Your question:</label></div>
		<div class="fl1">
			<textarea id="askQuestion" class="txt3 ordr1"></textarea>
		</div>
		<div class="clear"></div>
	</div>
<br/>
	<br/> 

xx;
#echo makeHiddenInput( $name="memberid", $value="$Lmemberid" );
echo makeButton( $type="button", $display="Ask", $id="", $func="updateMember('askContainer')", $class="ask1" )."<br/>";
echo makeButton( $type="button", $display="View all questions and responses", $id="", $func="callAjax( 'askContainer' , '?TASK=GETRESPONSEPG&MEMBERID=$Lmemberid' );", $class="viewallbtn" );


?>