<?php

$qMem = $qMem[0][0];
if($qMem){
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
$Laffinity = $qMem->behavior_affinity ;
$Ltherapies = $qMem->behavior_therapies ;
$Lpalatech = $qMem->behavior_palatech ;
?>

<form action="" method="post" id="memprof" name="memprof">
<?php 
if( strlen($MSG) ) { echo "<h2>$MSG</h2>"; }

echo makeHiddenInput( $name="memberid", $value="$Lmemberid" );
echo makeHiddenInput($name="memberactive", $value="$Lactive" );  

?>



<br/>
<br/>
<div class="ht1"><div class="ds bgBase pad2"><h6 class="h1a" >Account Information</h4></div></div>

<div id="r1" class="">
<label class="label1 fl1 wid6" for="">Login</label>&nbsp;&nbsp;&nbsp;&nbsp;<span class="lgn1" id="login"><?php echo $Llogin; ?></span>
&nbsp;&nbsp;
<br/>
<br/>
<label class="label1 fl1 wid6"  for="email">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="text", $name="email", $class="fl1", $value="$Lemail" );  ?>
<br/>
<br/>
<label class="label1 fl1 wid6"  for="">Sign up</label>
&nbsp;&nbsp;&nbsp;&nbsp;
<span class=""><?php 
$sgnup = new DateTime($Lsignup);
echo date_format($sgnup, "d/m/Y"); ?>
</span>

</div> <!-- r1 -->


<div id="r6" class="">&nbsp;</div> <!-- r6 -->

<div class="ht1"><div class="ds bgBase pad2"><h6 class="h1a" >Change Password</h4></div></div>
<div id="r2" class="">
<br/>
<div id="r2msg"></div> <!-- r2msg -->
<label class="label1 fl1 wid6"  for="pword">Password</label>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="password", $name="pword", $class="fl1", $value="" );  ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label class="label1 fl1 wid3 mrgn2"  for="pwordconfirm">Confirm Password</label>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="password", $name="pwordconfirm", $class="fl1 mrgn2", $value="" );  ?>
</div> <!-- r2 -->

<div id="r6" class="">&nbsp;</div> <!-- r6 -->

<br/>

<div class="ht1"><div class="ds bgBase pad2"><h6 class="h1a" >Biographical Information</h4></div></div>
<div id="r3" class="">
<br/>
<label class="label1 fl1 wid6"  for="firstname">First Name</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="text", $name="firstname", $class="fl1", $value="$Lfirstname" );  ?>
<br/>
<br/>
<label class="label1 fl1 wid6"  for="middlename">Middle Name</label>
&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="text", $name="middlename", $class="fl1", $value="$Lmiddlename" );  ?>
<br/>
<br/>
<label  class="label1 fl1 wid6" for="lastname">Last Name</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="text", $name="lastname", $class="fl1", $value="$Llastname" );  ?>
<br/>
<br/>
<label  class="label1 fl1 wid6" for="specialty">Specialty</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="text", $name="specialty", $class="fl1", $value="$Lspecialty", $options="", $func="disabled=\"disabled\" readonly=\"readonly\"" );  ?>


<select name="specialtyCombo" id="clin_specialty_combo" class="fl1 mrgn2"  onchange="set_specialty(this,memprof)">
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

<!-- <input value="10911004251060420709" name="productdetailid_10911004251060420709" id="productdetailid_10911004251060420709" type="hidden">
  <a href="javascript:newTag('10911004251060420709'); //" class="btnlnk ds clr2 " title="" id="" name="">Add</a>
-->



</div> <!-- r3 -->

<div id="r9" class="">&nbsp;</div> <!-- r6 -->

<br/>
<div id="r4" class="">
<div class="ht1"><div class="ds bgBase pad2"><h6 class="h1a">Behavior</h4></div></div>
<div >
<label  class="label1 fl1 wid6" for="affinity">Affinity to Company</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="text", $name="affinity", $class="fl1", $value="$Laffinity", $options="", $func="disabled=\"disabled\" readonly=\"readonly\"" );  ?>

<select name="specialtyCombo" id="clin_affinity_combo" class="fl1 mrgn2"  onchange="set_affinity(this,memprof)">
<option value="">[pick]</option>
<option value="1001">Low</option>
<option value="1002">Med</option>
<option value="1003">High</option>
<option value="1004">Unknown</option>
</select></div>
<br/>
<br/>
<div >
<label  class="label1 fl1 wid6" for="therapies">Open to new therapies</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="text", $name="therapies", $class="fl1", $value="$Ltherapies", $options="", $func="disabled=\"disabled\" readonly=\"readonly\"" );  ?>

<select name="specialtyCombo" id="clin_therapies_combo" class="fl1 mrgn2"  onchange="set_therapies(this,memprof)">
<option value="">[pick]</option>
<option value="1001">Yes</option>
<option value="1002">No</option>
<option value="1003">Unknown</option>
</select></div>
<br/>
<br/>
<div >
<label  class="label1 fl1 wid6" for="palatech">Prescribes from pala-tech</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo makeInput( $type="text", $name="palatech", $class="fl1", $value="$Lpalatech", $options="", $func="disabled=\"disabled\" readonly=\"readonly\"" );  ?>

<select name="specialtyCombo" id="clin_palatech_combo" class="fl1 mrgn2"  onchange="set_palatech(this,memprof)">
<option value="">[pick]</option>
<option value="1001">Yes</option>
<option value="1002">No</option>
<option value="1003">Unknown</option>
</select></div>
<br/>
<br/>
</div>
<?php echo makeButton( $type="BUTTON", $display="Save", $id="", $func="updateMember('profilecontent')", $class="" ); ?>

</form>
<?php } else {echo "No such name! try again.";}?>
