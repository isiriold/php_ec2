<?php

echo <<<zz
<div id="profilewrapper" >
<div id="profilecontent" class=" " >
</div> <!-- profilecontent -->
<script>callAjax( 'profilecontent' , '?TASK=SIGNPG' )</script>
zz;

?>



</div> <!-- profilewrapper close -->


<script>


function signup(div) {
var fname = document.getElementById('firstname').value;
var lname = document.getElementById('lastname').value;
var email = document.getElementById('email').value;
var pword = document.getElementById('pword').value;
var pwordconfirm = document.getElementById('pwordconfirm').value;
var login = document.getElementById("login").value;
var specialty = document.getElementById('clin_specialty_combo').value;
var URL = "?TASK=SIGNUP&COMMIT=1";
      URL+= "&FNAME=" + fname;
      URL+= "&LNAME=" + lname;
      URL+= "&EMAIL=" + email;
      URL+= "&PWORD=" + pword;
      URL+= "&LOGIN=" + login;
      URL+= "&SPECIALTY="+ specialty;

//div = document.getElementById(div);

if( pword.length && pwordconfirm != pword ) {
	a = document.getElementById('r2msg');
	a.innerHTML = "<h4>Password and Confirmation do not match</h4>";
} else {
  callAjax( div, URL );
 }
	  
} //updateMember


</script>
