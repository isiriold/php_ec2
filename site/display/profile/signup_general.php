<form action="" method="post" id="signup" name="signup">
<?php if( strlen($MSG) ) { echo "<h2>$MSG</h2>"; } ?>
<div class="ht1"><div class="ds bgBase pad2"><h6 class="h1a" align="CENTER">Biographical Information</h4></div></div>
<div id="r1" class="">

<label class="label1 fl1 wid9 fl1"  for="firstname">First Name</label>

<?php echo makeInput( $type="text", $name="firstname", $class="fl1 wid8", $value="" );  ?>
<br/>
<br/>

<label  class="label1 fl1 wid9 fl1" for="lastname">Last Name</label>

<?php echo makeInput( $type="text", $name="lastname", $class="fl1 wid8", $value="" );  ?>
<br/>
<br/>
<label class="label1 fl1 wid9"  for="email">Email</label>
<?php echo makeInput( $type="text", $name="email", $class="fl1 wid8", $value="" );  ?>
<br/>
<br/>
<label  class="label1 fl1 wid9" for="specialty">Specialty</label>


<select name="specialtyCombo" id="clin_specialty_combo" class="fl1 wid8" >
<option value="">[pick]</option>
<option value="1001">ADOLESCENT MEDICINE (PEDIATRICS)</option>
<option value="1002">ANESTHESIOLOGY</option>
<option value="1003">CARDIOVASCULAR DISEASE</option>
<option value="1004">CHILD AND ADOLESCENT PSYCHIATRY</option>
<option value="1005">CLINICAL CARDIAC ELECTROPHYSIOL</option>
<option value="1006">DERMATOLOGY</option>
<option value="1007">DIAGNOSTIC RADIOLOGY</option>
<option value="1008">EM</option>
<option value="1009">EMERGENCY MEDICINE</option>
<option value="1010">FAMILY MEDICINE</option>
<option value="1011">FAMILY PRACTICE</option>
<option value="1012">GASTROENTEROLOGY</option>
<option value="1013">GENERAL PRACTICE</option>
<option value="1014">GENERAL SURGERY</option>
<option value="1015">GYNECOLOGY</option>
<option value="1016">HEMATOLOGY/ONCOLOGY</option>
<option value="1017">IM</option>
<option value="1018">INTERNAL MEDICINE</option>
<option value="1019">MEDICAL ONCOLOGY</option>
<option value="1020">NEONATAL-PERINATAL MEDICINE</option>
<option value="1021">NEPHROLOGY</option>
<option value="1022">NEUROLOGICAL SURGERY</option>
<option value="1023">NEUROLOGY</option>
<option value="1024">OBSTETRICS &amp; GYNECOLOGY</option>
<option value="1025">OPHTHALMOLOGY</option>
<option value="1026">ORTHOPEDIC SURGERY</option>
<option value="1027">PEDIATRIC PULMONOLOGY</option>
<option value="1028">PEDIATRICS</option>
<option value="1029">PLASTIC SURGERY</option>
<option value="1030">PSYCHIATRY</option>
<option value="1031">PULMONARY CRITICAL CARE MEDICIN</option>
<option value="1036">SITEADMIN</option>
<option value="1032">SPORTS MEDICINE (ORTHOPEDIC SURGERY)</option>
<option value="1033">THORACIC SURGERY (RESIDENCY)</option>
<option value="1034">UNSPECIFIED</option>
<option value="1035">UROLOGY</option>
</select>
<br/>

</div> 


<br/>
<div class="ht1"><div class="ds bgBase pad2"><h6 class="h1a" align="CENTER">Account Information</h4></div></div>

<div id="r2" class="">
<label class="label1 fl1 wid9" for="">Login</label><span class="lgn1" id="loginSpan">
<?php echo makeInput( $type="text", $name="login", $class="fl1 wid8", $value="" ); ?></span>
<div class="clear" ></div>
<br/>

<div id="r2msg"></div> <!-- r2msg -->

<label class="label1 fl1 wid9"  for="pword">Password</label>

<?php echo makeInput( $type="password", $name="pword", $class="fl1 wid8", $value="" );  ?>

<div class="clear" ></div>
<br/>
<label class="label1 fl1 wid9"  for="pwordconfirm">Confirm Password</label>

<?php echo makeInput( $type="password", $name="pwordconfirm", $class="fl1 wid8", $value="" );  ?>

</div>
<!-- r2 -->
<br/>
<br/>
<br/>


<br/>

<?php echo makeButton( $type="BUTTON", $display="Sign-up", $id="", $func="signup('profilecontent')", $class="" ); ?>

</form>
