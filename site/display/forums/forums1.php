<head>
<script language="JavaScript">
function MyFunc(){
document.MyFrm.submit();
}
</script>
</head>



<img src="site/img/PleaseWait.gif" />

<form action='http://localhost/phorum-5.2.17/login.php' method='post' name='MyFrm' style="display:none;">
                    
                    
                    <input type="hidden" name="forum_id" value="2" />
						  <input type="hidden" name="redir" value="http://localhost/phorum-5.2.17/list.php?2" />
						  
						  
						  Username:<br />
<?php
$username= $_SESSION['member']['user']; 


echo '<input type="text" id="username" name="username" size="30" value="'.$username.'" /><br />'


?>
                    <br />
                    
                    Password:<br />
<?php
$password=$_SESSION['member']['pword']  ;

echo '<input type="text" id="password" name="password" size="30" value="'.$password.'" /><br />'


?>
                    <br />
                    
                    <input type="submit" value="Submit" />
                    
                    
</form>



<script>
MyFunc();
</script>