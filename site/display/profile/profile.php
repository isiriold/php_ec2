<?php
if ($USERLOGGED != 1){
echo <<<xx
<h2 class="">ATTENTION: Please Log in to access your account infomation </h2>
xx;
}
else{
$Lmemberid = getKey( 'userid', $_SESSION['member']);
//var_dump( $Lmemberid );

$profTab = makeButton( $type="BUTTON", $display="General Info", 
		  $id="", $func="callAjax( 'profilecontent' , '?TASK=AJAXPG&MEMBERID=$Lmemberid' );", $class="" );
$profTab .= makeButton( $type="BUTTON", $display="Products", 
		  $id="", $func="callAjax( 'profilecontent' , '?TASK=AJAXPPROD&MEMBERID=$Lmemberid' );", $class="" );
$profTab .= makeButton( $type="BUTTON", $display="Articles", 
		  $id="", $func="callAjax( 'profilecontent' , '?TASK=AJAXPART&MEMBERID=$Lmemberid' );", $class="" );


echo <<<zz
<div id="profilewrapper" >

<div id="profiletabs" class="ht1">$profTab</div> <!-- profiletabs -->
<div id="profilecontent" class=" " >

</div> <!-- profilecontent -->

<script>callAjax( 'profilecontent' , '?TASK=AJAXPG&MEMBERID=$Lmemberid' )</script>
zz;

?>









</div> <!-- profilewrapper close -->


<script>

function set_specialty(comboid,formID) {

formID.elements["specialty"].value = comboid.options[comboid.selectedIndex].text;


}

function updateMember(div) {
var fname = document.getElementById('firstname').value;
var mname = document.getElementById('middlename').value;
var lname = document.getElementById('lastname').value;
var email = document.getElementById('email').value;
var pword = document.getElementById('pword').value;
var pwordconfirm = document.getElementById('pwordconfirm').value;
var login = document.getElementById("login").innerHTML;
var memberid = document.getElementById('memberid').value;
var active = document.getElementById('memberactive').value;
var specialty = document.getElementById('specialty').value;
var URL = "?TASK=AJAXPROUP&COMMIT=1";
      URL+= "&FNAME=" + fname;
      URL+= "&MNAME=" + mname;
      URL+= "&LNAME=" + lname;
      URL+= "&EMAIL=" + email;
      URL+= "&PWORD=" + pword;
      URL+= "&LOGIN=" + login;
      URL+= "&MEMBERID=" + memberid;
      URL+= "&ACTIVE=" + active;
      URL+= "&SPECIALTY="+ specialty;

//div = document.getElementById(div);

if( pword.length && pwordconfirm != pword ) {
	a = document.getElementById('r2msg');
	a.innerHTML = "<h4>Password and Confirmation do not match</h4>";
} else {
  callAjax( div, URL );
 }
	  
} //updateMember

function toggleInterest(id) {
var tag = document.getElementById('pro_' + id);
var mpid = document.getElementById('memprodid_' + id ).value;
var mid = document.getElementById('memberid_' + id ).value;
var pid = document.getElementById('productid_' + id ).value;
var act = document.getElementById('active_' + id );
var srt = document.getElementById('sort_' + id ).value;
var div = "pro_" + id ;
var URL = "?TASK=AJAXPPRODUP&COMMIT=1";

act.value = ( act.value == 1 ) ? 0 : 1; 

URL += "&MPID=" + mpid;
URL += "&MEMBERID=" + mid;
URL += "&PRODUCTID=" + pid;
URL += "&ACTIVE=" + act.value;
URL += "&SORT=" + srt;
URL += "&IDX=" + id;

callAjax( div, URL );

newClass = tag.getAttribute("class").split(' ');
newClass.pop();

if(act.value==1) {  
newClass[newClass.length] = "tagalive";
} else {
newClass[newClass.length] = "tagdead";
}
newClass = newClass.join(' ');
tag.setAttribute("class", newClass);



} //toggleInterest

</script>
<?php } ?>