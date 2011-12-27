<?php
$searchID = makeInput( $type="text", $name="searchID", $class="fl1 mrgn3", $value="", $options="", $func="placeholder=\"Enter ID\"" );
$searchBtn = makeButton( $type="button", $display="Search", $id="", $func="search('profileSearchWrapper')", $class="fl1 mrgn3" );

echo <<<zz
<div id="profilewrapper" >
	<div class="ht1">
		 <div class="ds bg1 pad2">
		 	 <h4 class="h1a">Search for Profiles</h4>
		 </div>
	 <div id="r2msg" class="mrgn4"></div> <!-- r2msg -->
	</div>

<div id="profilecontent" class="" >
<div id="profileSearchContent" class="" >
	<fieldset>
	<legend >
		Search
	</legend>
	<label for="searchID" class="fl1 mrgn3" >Enter user name to search:</label>
	$searchID
	$searchBtn
	</fieldset>
</div>
</div>
zz;

?>
<script>
function search(div) {
var searchProf = "";
searchProf = document.getElementById('searchID').value;
var URL = "?TASK=ADMINPROFLIST";
      URL+= "&SEARCH=" + searchProf;

if( searchProf.length < 1 || searchProf == "" ) {
	a = document.getElementById('r2msg');
	a.innerHTML = "<h4>Please enter in the search field!</h4>";
} else {
  window.location = URL;
 }
	  
} //search
</script>