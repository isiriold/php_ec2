
<?php
$MSG = getKey("msg", $GLOBALS["LOCALGET"]);

switch( $MSG ) {
		case "LOGINFAIL":
		$MSG = "Unknown Username/Password Combination.";
		break;
		case "":
		$MSG = "";
		break;
		default:
		$MSG = "";
		break;
} 

?>

<form action="" method="post" class="ajax_form" name="theForm" id="theForm">

<?php if( strlen($MSG) ) { echo "<h2>$MSG</h2>"; } ?>

<div class="row">
	<p>
		&nbsp;
	</p>

	 <label for="username" >Username </label>
	 &nbsp;
	 <input name="username" value="" id="username" class="inputtext input_middle required" size="40" type="text">
</div>

<p> </p>

<div class="clear"></div>
 
<div class="row">
	<label for="pword">Password</label>
	&nbsp;&nbsp;
	<input name="pword" value="" id="pword" class="inputtext input_middle required" size="40" type="password">
</div>

<p> </p>

<br></br>

<div class="clear"></div>

                                        
<div class="row">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="reset-link"> <a href="#" onclick="document.theForm.reset();return false">RESET ALL FIELDS </a></span>
<?php
echo makeButton( $type="SUBMIT", $display="Login", $id="", $func="document.theForm.submit()", $class="fl1 btnlnk" );

?>
	
</div>                               
                                        
<input type="hidden" value="1" name="commit" id="commit"></input>

</form>
