<?php
if ($USERLOGGED != 1)
{
echo <<<xx
<h2 class="">ATTENTION: Please Log in to access your orders </h2>
xx;
}
else
{
#$Lmemberid = getKey( 'userid', $_SESSION['member']);
//var_dump( $Lmemberid );

echo <<<xx
<div id="ordersContainer" class="pad3 brdr4" >

<div>


	<script>
callAjax( 'ordersContainer' , '?TASK=ORDERSPG&MEMBERID=$Lmemberid' )
	function updateMember(div) {
	a = document.getElementById('msg');
	a.innerHTML = "";
var prod = document.getElementById('orderProdName').value;
var shipadd = document.getElementById('orderShipAddr').value;
//var memberid = document.getElementsByName('memberid')[0].value;
var URL = "?TASK=ORDERS&COMMIT=1";
      URL+= "&PROD=" + prod;
      URL+= "&SHIPADDR=" + shipadd;
//	  URL+= "&MEMBERID=" + memberid;

//div = document.getElementById(div);
	
if( prod == 0) {
	a.innerHTML = "<h4>Please select a product!</h4>";
}else if(shipadd === "" ){
	a.innerHTML = "<h4>Please provide your shipping details!</h4>";
} else if(shipadd.length < 6){
	a.innerHTML = "<h4>Please provide complete shipping details!</h4>";
}else {
  callAjax( div, URL );
 }
	  
} //updateMember
</script>

xx;

#echo makeHiddenInput( $name="memberid", $value="$Lmemberid" );
#echo makeButton( $type="BUTTON", $display="Order", $id="", $func="updateMember('ordersContainer')", $class="ordr2" ) ;
}
?>