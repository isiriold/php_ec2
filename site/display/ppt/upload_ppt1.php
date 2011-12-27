<?php

if ($USERLOGGED != 1)
{
echo <<<xx
<h2 class="">ATTENTION: You need to be an admin to access this.</h2>
xx;
}
else
{
?>

<form id="theForm" name="theForm" action="?TASK=<?php echo $CURTASK; ?>&commit=1" method="post" class="ajax_form  pad3" enctype="multipart/form-data" >

<label for="file">Filename:</label>
<input type="file" name="file" id="file" />

<input type="submit" name="submit" value="Submit" class="btn"/>

<?php
}
?>
</form>
