<?php

$shipDetails = $shipDetails[0];
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
			<h4 class="h1a" >Order samples</h4>
		</div>
	</div>
	<div id="msg"></div> 
	
	<div class="mrgn1">
		 <div class="fl1 wid6"><label for="orderProdName">Product Name:</label></div>
		 <div class="fl1">
			<select id="orderProdName" class="txtsel"  >
				<option value="0">[select a product]</option>
				<option value="1">Goutol</option>
				<option value="2">Hipitor</option>
				<option value="3">Mylorin</option>
			</select>
		</div>
		<div class="clear"></div>
	</div>
	<br/>
	<br/>
	
	<div class="ht6 mrgn1">
		<div class="fl1 wid6"><label for="orderShipAddr">Ship to Address:</label></div>
		<div class="fl1">
			<textarea id="orderShipAddr" class="txt3 ordr1"></textarea>
		</div>
		<div class="clear"></div>
	</div>
	<br/>
	<br/>

xx;
#echo makeHiddenInput( $name="memberid", $value="$Lmemberid" );
echo makeButton( $type="BUTTON", $display="Order", $id="", $func="updateMember('ordersContainer')", $class="ordr2" ) ;


	
echo <<<xx
	<br/>
	<br/>
	<br/>
	<div class="ht1">
		<div class="brdr3 pad2 wid7">
			<h4 class="h1a" >Recent Shipments</h4>
		</div>
	</div>
	
	<table id="shipGrid" class="bgcolor1">
		<thead class="bgBase1">
			<tr><td>Product</td><td>Quantity</td><td>Ship Date</td><td>Ship to Address</td></tr>
		</thead>
		<tbody>
			

xx;

foreach ($shipDetails as $Details){
echo "<tr><td>". $Details->ProductName ."</td><td>". $Details->qty ."</td><td>". $Details->shipDate ."</td><td>". $Details->shipAddress ."</td></tr>";
}

echo <<<xx

			
		</tbody>
	</table>
xx;


?>
