<?php

$qMem = $qMem[0][0];
$Lfirstname = $qMem->firstname ;
$Llastname = $qMem->lastname ;
$Lmiddlename = $qMem->middlename ;
$Lpword = $qMem->pword ;
$Llogin = $qMem->login ;
$Lmemberid = $qMem->member_id ;
$Lspecialty = $qMem->specialty;
$Lsignup = $qMem->signup_date ;
$Lemail = $qMem->email ;
$Lactive = $qMem->active_flag ;




?>

<form action="" method="post" id="memprof" name="memprof">
<?php 
if( strlen($MSG) ) { echo "<h2>$MSG</h2>"; }

echo makeHiddenInput( $name="memberid", $value="$Lmemberid" );
echo makeHiddenInput($name="memberactive", $value="$Lactive" );  

?>



<br/>
<br/>
<div class="ht1"><div class="ds bgBase pad2"><h6 class="h1a" align="CENTER">Account Information</h4></div></div>

<div id="r1" class="">
<label class="label1" for="">Login</label>&nbsp;&nbsp;&nbsp;&nbsp;<span class="lgn1" id="login"><?php echo $Llogin; ?></span>
&nbsp;&nbsp;
<br/>
<br/>
<label class="label1"  for="email">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="text", $name="email", $class="", $value="$Lemail" );  ?>
<br/>
<br/>
<label class="label1"  for="">Sign up</label>
&nbsp;&nbsp;&nbsp;&nbsp;
<span class=""><?php 
$sgnup = new DateTime($Lsignup);
echo date_format($sgnup, "d/m/Y"); ?>
</span>

</div> <!-- r1 -->


<div id="r6" class="">&nbsp;</div> <!-- r6 -->

<div class="ht1"><div class="ds bgBase pad2"><h6 class="h1a" align="CENTER">Change Password</h4></div></div>
<div id="r2" class="">
<br/>
<div id="r2msg"></div> <!-- r2msg -->
<label class="label1"  for="pword">Password</label>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="password", $name="pword", $class="", $value="" );  ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label class="label1"  for="pwordconfirm">Confirm Password</label>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="password", $name="pwordconfirm", $class="", $value="" );  ?>
</div> <!-- r2 -->

<div id="r6" class="">&nbsp;</div> <!-- r6 -->

<br/>

<div class="ht1"><div class="ds bgBase pad2"><h6 class="h1a" align="CENTER">Biographical Information</h4></div></div>
<div id="r3" class="">
<br/>
<label class="label1"  for="firstname">First Name</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="text", $name="firstname", $class="", $value="$Lfirstname" );  ?>
<br/>
<br/>
<label class="label1"  for="middlename">Middle Name</label>
&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="text", $name="middlename", $class="", $value="$Lmiddlename" );  ?>
<br/>
<br/>
<label  class="label1" for="lastname">Last Name</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="text", $name="lastname", $class="", $value="$Llastname" );  ?>
<br/>
<br/>
<label  class="label1" for="specialty">Specialty</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="text", $name="specialty", $class="", $value="$Lspecialty" );  ?>




<select name="specialtyCombo" id="clin_specialty_combo"   onchange="set_specialty(this,memprof)" >
			<option value="">Medical Specialty...</option>
			<option value="2">Allergy and Immunology</option><br />
			<option value="3">Anesthesiology</option><br />

</select>



</div> <!-- r3 -->

<div id="r6" class="">&nbsp;</div> <!-- r6 -->

<br/>
<br/>


<br/>

<?php echo makeButton( $type="BUTTON", $display="Save", $id="", $func="updateMember('profilecontent')", $class="" ); ?>

</form>
