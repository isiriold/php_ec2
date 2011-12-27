<?php


#print_r($responses );
$responses = $responses[0];
$previous = -1;
$current = 0;
$resultHtml = "";

$closeDiv = <<<xx
				</div>
				<hr />
xx;
echo <<<xx
	<div class="ht1">
		<div class="brdr3 pad2 wid7">
			<h4 class="h1a" >Recent responses</h4>
		</div>
	</div>
	

	<div id="respContainer">
xx;

foreach ($responses as $resp){

	$current = $resp->question_id;
	if ($previous != $current){
		
		if (strlen($resultHtml)){
			$resultHtml .= $closeDiv;
		}			
		$resultHtml .= <<<xx

		<div class="question">
			<span class="name">$resp->question_login_id </span><span class="date"> $resp->question_date </span><p> $resp->question_text </p>
		</div>
		<div class="response">
			<span class="name">$resp->puser_last_name,$resp->puser_first_name </span><span class="date"> $resp->response_date </span><p>  $resp->response_text  </p>

xx;
		$previous = $current;
	}
	else{
		$resultHtml .= <<<xx
		<span class="name">$resp->puser_last_name,$resp->puser_first_name </span><span class="date"> $resp->response_date </span><p>  $resp->response_text  </p>

xx;
	}
	
	
	
}
echo $resultHtml ;

/*
////////////////////////////////////////////////////////
// this is Table version, uncomment to see the difference
////////////////////////////////////////////////////////

$closeTable = <<<xx
	
		</tbody>
	</table>
	
xx;
echo <<<xx
	<div class="ht1">
		<div class="brdr3 pad2 wid7">
			<h4 class="h1a" >Recent responses</h4>
		</div>
	</div>
	

	<div id="respTableContainer">
xx;

foreach ($responses as $resp){

	$current = $resp->question_id;
	if ($previous != $current){
		
		if (strlen($resultHtml)){
			$resultHtml .= $closeTable;
		}			
		$resultHtml .= <<<xx
<table class="bgcolor1">
		<thead class="bgBase1">
			<tr><td class="wid15pc"> $resp->question_date </td><td class="wid15pc"> $resp->question_login_id </td><td> $resp->question_text </td></tr>
		</thead>
		<tbody>
			<tr><td class="wid15pc"> $resp->response_date </td><td class="wid15pc"> $resp->puser_last_name,$resp->puser_first_name </td><td> $resp->response_text </td></tr>
xx;
		$previous = $current;
	}
	else{
		$resultHtml .= <<<xx
		<tr><td  class="wid15pc"> $resp->response_date </td><td class="wid15pc"> $resp->puser_last_name,$resp->puser_first_name </td><td> $resp->response_text </td></tr>
xx;
	}
	
	
	
}
echo $resultHtml ."</div>";
*/


?>