<div id="hormenudiv" class="mnBNR ds bgBase">
 
 <ul id="hormenu" class="mnUL">
	 <li class="fl1"><a href="?TASK=HOME"><img src="site/img/eremedy_logo.jpg" alt="Home" width="180" border="1" height="60" class="brdr1"></a></li>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 
<?php if( $USERLOGGED) { ?>
<i><b><font color = "#254117"> Logged in: </b></i></font>
<u><i><font color="#7E2217">
<?php
 echo $_SESSION['member']['fistname'].' '.$_SESSION['member']['lastname'];
?>	
</i></u>	</font>	
	
<li class="fr1"><a href="?TASK=LOGOUT&COMMIT=1" class="btnlnk1 clr3 ds1 btn1width logout">Logout</a></li>
<?php } else { ?>	
<li class="fr1"><a href="?TASK=SIGNUP" class="btnlnk2 clr3 ds1 btn1width signup">Sign-up</a></li>
<li class="fr1"><a href="?TASK=LOGIN" class="btnlnk2 clr3 ds1 btn1width login">Login</a></li>
<?php } ?>
 </ul>

  <div class="clear"></div>
 </div> <!-- hormenudiv -->
 
