
<ul>
<li><a href="?TASK=PRODUCTS">Products</a></li>
<li><a href="?TASK=ADMINPRODLIST">Admin Products</a></li>
<li><a href="?TASK=PROFILE">My Profile</a></li>
</ul>


<?php if( $_SESSION['group_name'] == 'Administrator') { ?>
<ul>
<li>Admin Nav</li>
<li><a href="?TASK=ADMINCONTENT">CONTENT</a></li>
</ul>
<?php } ?>